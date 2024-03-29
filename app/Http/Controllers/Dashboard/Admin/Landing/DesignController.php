<?php

namespace App\Http\Controllers\Dashboard\Admin\Landing;

use App\Http\Controllers\Controller;
use App\Traits\UploadFiles;
use App\Models\{
    Block,
    Partner,
    Front\Design
};
use App\Http\Requests\Customize\{
    HeroRequest,
    LandingPageRequest,
    PricingRequest,
    StoryRequest,
    TestimonialRequest,
};

class DesignController extends Controller
{
    use UploadFiles;

    protected $landingPage;

    public function __construct()
    {
        $this->middleware('permission:access_landing_page', ['only' => 'landing_page_show']);
        $this->middleware('permission:update_landing_page', ['only' => 'landing_page_update']);
        $this->middleware('permission:access_hero', ['only' => 'hero_show']);
        $this->middleware('permission:update_hero', ['only' => 'hero_update']);
        $this->middleware('permission:access_pricing', ['only' => 'price_show']);
        $this->middleware('permission:update_pricing', ['only' => 'price_update']);
        $this->middleware('permission:access_testimonial', ['only' => 'testimonial_show']);
        $this->middleware('permission:update_testimonial', ['only' => 'testimonial_update']);
        $this->middleware('permission:access_story', ['only' => 'story_show']);
        $this->middleware('permission:update_story', ['only' => 'story_update']);

        $landingPage = Design::findOrFail(1);
        $this->landingPage = $landingPage;
    }

    // landing page show
    public function landing_page_show()
    {
        $lp = $this->landingPage;
        $partners = Partner::pluck('title', "id")->toArray();

        return view('admin.pages.customize.sections.landing-page', compact("lp", "partners"));
    }

    // landing page update
    public function landing_page_update(LandingPageRequest $request)
    {
        $lp = $this->landingPage;

        $data = $request->all();
        $data['partners'] = $data['partners'] ?? [];
        $lp->fill($data)->save();

        return redirect_with_flash("msgSuccess", "Landing page updated successfully", "customize/landing-page");
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

        $this->update_hero_image($lp);

        return redirect_with_flash("msgSuccess", "Hero section updated successfully", "customize/hero");
    }


    // update hero image
    public function update_hero_image($hero)
    {
        if (request()->hasFile("hero_image")) {

            $photo = request()->file('hero_image');
            $storagePath = "assets/dist/storage/customize/hero";
            $oldFile = $hero->hero_image;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 640,
                "height" => 430,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $hero->fill(['hero_image' => $fileInformation['file_path']])->save();
        }
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

        $data = $request->except(['testimonial_avatar']);
        $lp->fill($data)->save();

        $this->update_testimonial_image($lp);

        return redirect_with_flash("msgSuccess", "Testimonial section updated successfully", "customize/testimonial");
    }

    // update testimonial image
    public function update_testimonial_image($testimonial)
    {
        if (request()->hasFile("testimonial_avatar")) {

            $photo = request()->file('testimonial_avatar');
            $storagePath = "assets/dist/storage/customize/testimonial";
            $oldFile = $testimonial->testimonial_avatar;
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
            $testimonial->fill(['testimonial_avatar' => $fileInformation['file_path']])->save();
        }
    }

    // story show section
    public function story_show()
    {
        $lp = $this->landingPage;
        $story_blocks = Block::pluck('title', "id")->toArray();

        return view("admin.pages.customize.sections.story", compact('lp', 'story_blocks'));
    }

    // story update section
    public function story_update(StoryRequest $request)
    {
        $lp = $this->landingPage;

        $data = $request->except(['story_browser_image', 'story_phone_image']);
        $data['story_blocks'] = $data['story_blocks'] ?? [];
        $lp->fill($data)->save();

        $this->update_story_images($lp);

        return redirect_with_flash("msgSuccess", "story section updated successfully", "customize/story");
    }

    // update story images
    public function update_story_images($story)
    {
        // story browser image
        if (request()->hasFile("story_browser_image")) {

            $photo = request()->file('story_browser_image');
            $storagePath = "assets/dist/storage/customize/story/";
            $oldFile = $story->story_browser_image;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 1618,
                "height" => 1010,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $story->fill(['story_browser_image' => $fileInformation['file_path']])->save();
        }

        // story phone image
        if (request()->hasFile("story_phone_image")) {

            $photo = request()->file('story_phone_image');
            $storagePath = "assets/dist/storage/customize/story/";
            $oldFile = $story->story_phone_image;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 407,
                "height" => 867,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $story->fill(['story_phone_image' => $fileInformation['file_path']])->save();
        }
    }
}
