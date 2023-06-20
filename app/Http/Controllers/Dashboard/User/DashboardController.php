<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Prompt;

class DashboardController extends Controller
{
    public function home()
    {
        $prompts = Prompt::with([
            "category"=> fn ($q) => $q->select(['id','title'])
        ])->orderBy('category_id',"desc")->get();

        return view("frontend.pages.index",compact('prompts'));
    }
}
