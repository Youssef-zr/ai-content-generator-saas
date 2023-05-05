<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\UploadFiles;
use App\Models\{
    Engine,
    Language,
    Setting,
};
use App\Http\Requests\Settings\{
    LanguageRequest,
    BrandRequest,
    OpenAiRequest,
    PaypalRequest,
};

class SettingController extends Controller
{
    use UploadFiles;

    protected $settingModel;

    public function __construct()
    {
        $setting = Setting::findOrFail(1);
        $this->settingModel = $setting;
    }

    // show brand information
    public function brand_show()
    {
        $setting = $this->settingModel;
        return view("admin.pages.settings.brand", compact('setting'));
    }

    // update brand information
    public function brand_update(BrandRequest $request)
    {
        $setting = $this->settingModel;

        $data = $request->except(['logo', "favicon"]);
        $setting->fill($data)->save();

        $this->update_images($setting);

        return back()->with('msgSuccess', 'Brand updated successfully');
    }

    // show third party information
    public function third_party_show()
    {
        $setting = $this->settingModel;
        $engines = Engine::pluck('value', "id")->toArray();

        return view("admin.pages.settings.third-party", compact('setting', "engines"));
    }

    // update third party information
    public function update_open_ai_key(OpenAiRequest $request,)
    {
        $setting = $this->settingModel;
        $setting->fill($request->all())->save();

        return back()->with('msgSuccess', 'Open ai settings updated successfully');
    }

    // update paypal settings information
    public function update_paypal_settings(PaypalRequest $request,)
    {
        $setting = $this->settingModel;
        $setting->fill($request->all())->save();

        return back()->with('msgSuccess', 'Paypal settings updated successfully');
    }

    // show content information
    public function content_show()
    {
        $setting = $this->settingModel;
        $languages = Language::pluck('language', "id")->toArray();

        return view("admin.pages.settings.content", compact('setting', "languages"));
    }

    // update content default language
    public function content_update(LanguageRequest $request,)
    {
        $setting = $this->settingModel;
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
