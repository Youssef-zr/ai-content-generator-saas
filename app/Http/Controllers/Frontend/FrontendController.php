<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Prompt;

class FrontendController extends Controller
{
    public function home()
    {
        $prompts = Prompt::with([
            "category"=> fn ($q) => $q->select(['id','title'])
        ])->orderBy('category_id',"desc")->get();

        return view("frontend.pages.index",compact('prompts'));
    }
}
