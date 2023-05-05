<?php

namespace App\Http\Controllers\Dashboard\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customize\HeroRequest;
use App\Http\Requests\Customize\PricingRequest;
use App\Http\Requests\Customize\TestimonialRequest;
use App\Models\Front\Design;
use App\Traits\UploadFiles;

class DesignController extends Controller
{
    use UploadFiles;

    protected $landingPage;

    public function __construct()
    {
        $landingPage = Design::findOrFail(1);
        $this->landingPage = $landingPage;
    }

    // show hero section
    public function hero_show()
    {
        $lp = $this->landingPage;
        return view("admin.pages.customize.sections.hero", compact('lp'));
    }

    // update hero section
    public function hero_update(HeroRequest $request)
    {
        $lp = $this->landingPage;
        $lp->fill($request->all())->save();

        return redirect_with_flash("msgSuccess", "Hero section updated successfully", "customize/hero");
    }

    // show pricing section
    public function price_show()
    {
        $lp = $this->landingPage;
        return view("admin.pages.customize.sections.pricing", compact('lp'));
    }

    // update pricing section
    public function price_update(PricingRequest $request)
    {
        $lp = $this->landingPage;
        $lp->fill($request->all())->save();

        return redirect_with_flash("msgSuccess", "Pricing section updated successfully", "customize/pricing");
    }

    // testimonial show section
    public function testimonial_show()
    {
        $lp = $this->landingPage;
        return view("admin.pages.customize.sections.testimonial", compact('lp'));
    }

    // testimonial update section
    public function testimonial_update(TestimonialRequest $request)
    {
        $lp = $this->landingPage;

        $data= $request->except(['testimonial_avatar']);
        $lp->fill($data)->save();

        $this->update_testimonial_image($lp);

        return redirect_with_flash("msgSuccess", "Testimonial section updated successfully", "customize/testimonial");
    }

    // update testimonial image
    public function update_testimonial_image($design)
    {
        if (request()->hasFile("testimonial_avatar")) {

            $photo = request()->file('testimonial_avatar');
            $storagePath = "assets/dist/storage/customize/testimonial";
            $oldFile = $design->testimonial_avatar;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 100,
                "height" => 100,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $design->fill(['testimonial_avatar' => $fileInformation['file_path']])->save();
        }
    }
}
