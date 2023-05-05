<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;
    protected $guarded = ["testimonial_img"];
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
}
