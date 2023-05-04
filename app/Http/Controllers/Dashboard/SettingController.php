<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\LanguageRequest;
use App\Http\Requests\Settings\BrandRequest;
use App\Http\Requests\Settings\OpenAiRequest;
use App\Http\Requests\Settings\PaypalRequest;
use App\Models\Engine;
use App\Models\Language;
use App\Models\Setting;
use App\Traits\UploadFiles;

class SettingController extends Controller
{
    use UploadFiles;

    // show brand information
    public function brand_show($id)
    {
        $setting = Setting::findOrFail($id);
        return view("admin.pages.settings.brand", compact('setting'));
    }

    // update brand information
    public function brand_update(BrandRequest $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $data = $request->except(['logo', "favicon"]);
        $setting->fill($data)->save();

        $this->update_images($setting);

        return back()->with('msgSuccess', 'Brand updated successfully');
    }

    // show third party information
    public function third_party_show($id)
    {
        $setting = Setting::findOrFail($id);
        $engines = Engine::pluck('value', "id")->toArray();

        return view("admin.pages.settings.third-party", compact('setting', "engines"));
    }

    // update third party information
    public function update_open_ai_key(OpenAiRequest $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->fill($request->all())->save();

        return back()->with('msgSuccess', 'open ai settings updated successfully');
    }

    // update paypal settings information
    public function update_paypal_settings(PaypalRequest $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->fill($request->all())->save();

        return back()->with('msgSuccess', 'Open ai settings updated successfully');
    }

    // show content information
    public function content_show($id)
    {
        $setting = Setting::findOrFail($id);
        $languages = Language::pluck('language', "id")->toArray();

        return view("admin.pages.settings.content", compact('setting', "languages"));
    }

    // update content default language
    public function content_update(LanguageRequest $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->fill($request->all())->save();

        return back()->with('msgSuccess', 'Content language updated successfully');
    }

    // update logo and favicon
    public function update_images($setting)
    {

        if (request()->hasFile("logo")) {

            $photo = request()->file('logo');
            $storagePath = "assets/dist/storage/settings";
            $oldFile = $setting->logo;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 240,
                "height" => 72,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $setting->fill(['logo' => $fileInformation['file_path']])->save();
        }

        if (request()->hasFile("favicon")) {

            $photo = request()->file('favicon');
            $storagePath = "assets/dist/storage/settings";
            $oldFile = $setting->favicon;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 48,
                "height" => 48,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $setting->fill(['favicon' => $fileInformation['file_path']])->save();
        }
    }
}
