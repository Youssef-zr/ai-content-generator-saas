<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;

class FrontendController extends Controller
{
    public function home()
    {
        return view("frontend.pages.index");
    }
}
