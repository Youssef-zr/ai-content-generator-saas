<?php
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
