<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromptRequest;
use App\Models\{
    Category,
    Engine,
    Prompt,
    Question,
    Tone,
};

class PromptController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access_prompt')->only('index');
        $this->middleware('permission:create_prompt')->only(['create', 'store']);
        $this->middleware('permission:update_prompt')->only(['edit', 'update']);
        $this->middleware('permission:delete_prompt')->only(['delete', 'delete-all']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user()->hasPermission('read_prompt'));
        $prompts = Prompt::with("category")->orderBy("id", "desc")->get();
        return view('admin.pages.prompts.index', compact("prompts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $engines = $this->tableData("engines");
        $categories = $this->tableData('categories');
        $tones = $this->tableData('tones');
        $questions = $this->tableData('questions');

        return view('admin.pages.prompts.create', compact("engines", "categories", "tones", "questions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromptRequest $request)
    {
        $data = $request->all();
        $data['questions'] = $this->filter_empty_question($data['questions']);

        Prompt::create($data);
        return redirect_with_flash("msgSuccess", "Prompt updated successfully", "prompts");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prompt $prompt)
    {
        $engines = $this->tableData("engines");
        $categories = $this->tableData('categories');
        $tones = $this->tableData('tones');
        $questions = $this->tableData('questions');

        return view('admin.pages.prompts.update', compact("prompt", "engines", "categories", "tones", "questions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromptRequest $request, Prompt $prompt)
    {
        $data = $request->all();
        $data['questions'] = $this->filter_empty_question($data['questions']);

        $prompt->fill($data)->save();
        return redirect_with_flash("msgSuccess", "Prompt created successfully", "prompts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prompt $prompt)
    {
        $prompt->delete();
        return redirect_with_flash("msgSuccess", "Prompt deleted successfully", "prompts");
    }

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $prompts_ids = json_decode(request()->ids, true);

        if (count($prompts_ids) > 0) {
            $prompts = Prompt::whereIn("id", $prompts_ids);
            $prompts->delete();

            return redirect_with_flash("msgSuccess", "Prompts removed successfully", "prompts");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "prompts");
    }

    // global data
    public function tableData($table_name)
    {
        $tabledata = [];
        if ($table_name == "engines") {
            $tabledata = Engine::orderBy("id", "desc")->pluck("value", "id")->toArray();
        } else if ($table_name == "categories") {
            $tabledata = Category::pluck("title", "id")->toArray();
        } else if ($table_name == "tones") {
            $tabledata = Tone::pluck("tone", "id")->toArray();
        } else if ($table_name == "questions") {
            $tabledata = Question::pluck("question", "id")->toArray();
        }

        return $tabledata;
    }

    public function filter_empty_question($array)
    {
        $questions = collect($array);

        $filtredQuestions = $questions->filter(function ($value, $key) {
            return  $value != null;
        })->toArray();

        return $filtredQuestions;
    }
}
