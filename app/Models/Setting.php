<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $guarded = ["siteLogo","siteFavicon"];


    public function getSiteLogoAttribute()
    {
        $image = $this->logo;

        if ($image == "default.png") {
            $storagePath = "assets/dist/storage/settings/";
            $this->logo = $storagePath . $image;
        }

        return url($this->logo);
    }

    public function getSiteFaviconAttribute()
    {
        $image = $this->favicon;

        if ($image == "default.png") {
            $storagePath = "assets/dist/storage/settings/";
            $this->favicon = $storagePath . $image;
        }

        return url($this->favicon);
    }
}
