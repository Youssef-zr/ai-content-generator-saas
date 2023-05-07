<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;
    protected $guarded = ["testimonial_img","story_browser_image_link","story_phone_image_link"];
    protected $casts = [
        'partners' => "array",
        'story_blocks' => "array",
    ];

    public function getTestimonialImgAttribute()
    {
        $avatar = $this->testimonial_avatar;

        if ($avatar == "default.png") {
            $storagePath = "assets/dist/storage/customize/testimonial/";
            $this->testimonial_avatar = $storagePath . $avatar;
        }

        return url($this->testimonial_avatar);
    }

    public function getStoryBrowserImageLinkAttribute()
    {
        $browserImage = $this->story_browser_image;

        if ($browserImage == "default.png") {
            $storagePath = "assets/dist/storage/customize/story/";
            $this->story_browser_image = $storagePath . $browserImage;
        }

        return url($this->story_browser_image);
    }

    public function getStoryPhoneImageLinkAttribute()
    {
        $phoneImage = $this->story_phone_image;

        if ($phoneImage == "default.png") {
            $storagePath = "assets/dist/storage/customize/story/";
            $this->story_phone_image = $storagePath . $phoneImage;
        }

        return url($this->story_phone_image);
    }
}
