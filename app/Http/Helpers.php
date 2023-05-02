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
