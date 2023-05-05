<?php

use Illuminate\Support\Str;

// the request shurthund of admin resource
if (!function_exists('adminUrl')) {
    function adminUrl($url = null)
    {
        if (env('APP_ENV') == "production") {
            return secure_url('/dashboard/' . $url);
        } else {
            return url('/dashboard/' . $url);
        }
    }
}

// redirect with flash msg
if (!function_exists('redirect_with_flash')) {
    function redirect_with_flash($alerType, $msg, $redirectTo, $admin = "")
    {
        request()->session()->flash($alerType, $msg);
        $url = $admin == "" ? adminUrl($redirectTo) : url($redirectTo);
        return redirect($url);
    }
}

// Question Type
if (!function_exists('question_type')) {
    function question_type()
    {
        return [
            'single_line' => "Single Line",
            'multi_line' => "Multi Line"
        ];
    }
}

// Question Is Required
if (!function_exists('question_is_required')) {
    function question_is_required()
    {
        return [
            'required' => "Required",
            'optional' => "Optional"
        ];
    }
}

// Prompt type
if (!function_exists('prompt_type_list')) {
    function prompt_type_list()
    {
        return [
            'text' => "Text",
            'image' => "Image"
        ];
    }
}

// plan type list
if (!function_exists('plans_type')) {
    function plans_type()
    {
        return [
            'free' => "Free",
            'paid' => "Paid"
        ];
    }
}

// paypal env list list
if (!function_exists('paypal_env_list')) {
    function paypal_env_list()
    {
        return [
            'sandbox' => "Sandox",
            'production' => "Production"
        ];
    }
}

// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------

// active sidebar link
if (!function_exists('activeSideLink')) {
    function activeSideLink($path)
    {
        return request()->segment(2) == $path ? "active" : "";
    }
}

if (!function_exists('setActive')) {
    function setActive($path, $active = 'text-primary')
    {
        $currentUrl = request()->server("REQUEST_URI");

        $contains = Str::contains($currentUrl, $path);
        return $contains ? $active : "";
    }
}

if (!function_exists("active_menu")) {
    function active_menu($link)
    {
        if (preg_match("/" . $link . "/i", request()->segment(2))) {
            return ["menu-open", "active"];
        } else {
            return ["", ""];
        }
    }
}
//this function for active dashboard link in the navigation bar its a link not has a item
if (!function_exists("active_dashboard_item")) {
    function active_dashboard_item($link)
    {
        if (preg_match('/' . $link . '/i', request()->segment(2)) && request()->segment(3) == "") {
            return ["active"];
        } else {
            return [""];
        }
    }
}
