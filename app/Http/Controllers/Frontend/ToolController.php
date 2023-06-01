<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\Settings;
use Illuminate\Support\Arr;
use App\Models\{
    Content,
    Language,
    Prompt,
    Setting,
    Tone,
};

class ToolController extends Controller
{
    public function history()
    {
        $contents = Content::where("user_id", auth()->id())
            ->with(['prompt' => fn ($q) => $q->select(['id', 'title'])])
            ->orderBy("id", "desc")->get();

        return view("frontend.pages.tools.history", compact("contents"));
    }

    public function show_prompt_view(Request $request)
    {
        $prompt = Prompt::where('category_id', $request->category)
            ->where("id", $request->prompt)
            ->with('category')->first();

        if ($prompt == null) {
            return abort(404);
        }

        return $this->checkPromptType($prompt);
    }

    public function checkPromptType($prompt)
    {
        $prompt_questions = $prompt->questions($prompt->questions);

        if ($prompt->type == "image") {
            return view('frontend.pages.tools.images.create', compact("prompt", "prompt_questions"));
        } else {

            $tones = Tone::pluck('tone', "id")->toArray();
            $langs = Language::pluck('language', "id")->toArray();
            $userSetting = Settings::where("user_id", auth()->user()->id)
                ->first();

            return view("frontend.pages.tools.contents.create", compact("prompt", "prompt_questions", "tones", "langs", "userSetting"));
        }
    }

    // ----------- store content text --------------------
    public function filter_question_arr()
    {
        $questions = Arr::except(request()->all(), ['content_id', 'prompt_id', 'tone_id', 'language_id']);
        return $questions;
    }

    public function process_data()
    {
        $data = request()->all();

        $settings = Setting::with(['engine'])->first();
        $prompt = Prompt::where("id", $data['prompt_id'])->with(['engine'])->first();

        $tone = Tone::find($data['tone_id'])->tone;
        $language = Language::find($data['language_id'])->language;

        $engine = $prompt->engine->value ?? $settings->engine->value;
        $max_tokens = ($prompt->max_tokens != null and $prompt->max_tokens > 0) ? $prompt->max_tokens : $settings->default_max_tokens;

        $processed_data = (object)[
            "prompt" => $prompt->prompt,
            "tone" => $tone,
            "language" => $language,
            "engine" => $engine,
            "max_tokens" => $max_tokens,
        ];

        return $processed_data;
    }

    public function openai_prompt_props()
    {
        $processed_data = $this->process_data();
        $questions = $this->filter_question_arr();

        // prompt parameters
        $prompParms = [];
        array_push($prompParms, ...array_values($questions));
        array_push($prompParms, $processed_data->tone, $processed_data->language);

        // open ai params
        $openAiProps = [
            'model' => strval($processed_data->engine),
            "max_tokens" => intval($processed_data->max_tokens),
            "prompt" => sprintf($processed_data->prompt . ",content language:%s", ...array_values($prompParms)),
        ];

        return $openAiProps;
    }


    public function store_content_text()
    {
        $promptProps = $this->openai_prompt_props();

        $content = "";
        $client = \OpenAI::client(config('openai.api_key'));

        if (!in_array($promptProps['model'], ['gpt-3.5-turbo'])) {

            $result = $client->completions()->create($promptProps);
            $content = $result['choices'][0]['text'];
        } else {

            $result = $client->chat()->create([
                'model' => $promptProps['model'],
                'messages' => [['role' => 'user', 'content' => $promptProps['prompt']]],
            ]);
            $content = $result['choices'][0]['message']['content'];
        }

        // store content generated
        $this->create_or_update_content($content);

        return response()->json(["content" => $content], 200);
    }

    public function create_or_update_content($content)
    {
        $inputs = request()->all();

        $category_id = Prompt::find($inputs['prompt_id'])->category_id;
        $questions = $this->filter_question_arr();

        $data = [
            'prompt_id' => $inputs['prompt_id'],
            "user_id" => auth()->id(),
            "data" => [
                'category_id' => $category_id,
                'tone_id' => $inputs['tone_id'],
                'language_id' => $inputs['language_id'],
                "questions" => $questions,
                "content" => $content,
            ],
            "type" => "text",
        ];

        if (isset($inputs['content_id'])) {
            $content = Content::where('id', $inputs['content_id'])->first();
            $content->fill($data)->save();
        } else {
            Content::create($data);
        }
    }

    // edit content text
    public function edit_content_text($id)
    {
        $content = Content::where('user_id', auth()->id())->findOrFail($id);

        $prompt = $content->prompt;
        $prompt_questions = $prompt->questions($prompt->questions);

        $tones = Tone::pluck('tone', "id")->toArray();
        $langs = Language::pluck('language', "id")->toArray();
        $userSetting = Settings::where("user_id", auth()->user()->id)
            ->first();

        return view("frontend.pages.tools.contents.edit", compact('content', "prompt", "prompt_questions", "tones", "langs", "userSetting"));
    }
    // -----------------------------------------------------------------------------

    // ----------- store and edit image --------------------
    public function process_data_image()
    {
        $prompt = Prompt::where("id", request()->prompt_id)->first();

        // questions prompt params
        $questions = $this->filter_question_arr();

        // open ai image params
        $openAiPrompt = sprintf($prompt->prompt, ...array_values($questions));

        return $openAiPrompt;
    }

    public function store_content_image()
    {
        $client = \OpenAI::client(config('openai.api_key'));
        $response = $client->images()->create([
            'prompt' => $this->process_data_image(),
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        $image = $response->data[0]['url'];

        $inputs = request()->all();
        $data = [
            "prompt_id" => $inputs["prompt_id"],
            'user_id' => auth()->id(),
            "type" => "image",
            "data" => [
                "url" => $image,
                "questions" => $this->filter_question_arr()
            ]
        ];

        if (isset($inputs['content_id']) and $inputs["content_id"] != "") {
            $content = Content::where('id', $inputs['content_id'])->first();
            $content->fill($data)->save();
        } else {
            Content::create($data);
        }

        return response()->json([$image], 200);
    }

    public function edit_image($content_id)
    {
        $content = Content::where('user_id', auth()->id())->findOrFail($content_id);

        $prompt = $content->prompt;
        $prompt_questions = $prompt->questions($prompt->questions);

        return view('frontend.pages.tools.images.create', compact("content", "prompt", "prompt_questions"));
    }

    // ------------------------------------------------------------------

    // delete content
    public function delete_content($id)
    {
        $content = Content::where('user_id', auth()->id())->findOrFail($id);
        $content->delete();

        return redirect_with_flash("msgSuccess", "Row removed successfully", "history", "false");
    }

    // delete all contents
    public function delete_all()
    {
        $content_ids = json_decode(request()->ids, true);

        if (count($content_ids) > 0) {
            $content = Content::whereIn("id", $content_ids);
            $content->delete();

            return redirect_with_flash("msgSuccess", "Contents removed successfully", "history", "false");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "history", "false");
    }
}
