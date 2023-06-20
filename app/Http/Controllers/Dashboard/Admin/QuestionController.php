<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access_question')->only('index');
        $this->middleware('permission:create_question')->only(['create', 'store']);
        $this->middleware('permission:update_question')->only(['edit', 'update']);
        $this->middleware('permission:read_question')->only('show');
        $this->middleware('permission:delete_question')->only(['delete', 'delete-all']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy("id", "desc")->get();
        return view("admin.pages.questions.index", compact("questions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.questions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->all());
        return redirect_with_flash("msgSuccess", "Question created successfully", "questions");
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view("admin.pages.questions.show", compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view("admin.pages.questions.update", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $question->fill($request->all())->save();
        return redirect_with_flash("msgSuccess", "Question updated successfully", "questions");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect_with_flash("msgSuccess", "Question removed successfully", "questions");
    }

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $question_ids = json_decode(request()->ids, true);

        if (count($question_ids) > 0) {
            $questions = Question::whereIn("id", $question_ids);
            $questions->delete();

            return redirect_with_flash("msgSuccess", "Questions removed successfully", "questions");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "questions");
    }
}
