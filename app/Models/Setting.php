<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $guarded = ["siteLogo","siteFavicon"];


    public function engine()
    {
        return $this->hasOne(Engine::class, 'id', 'engine_id');
    }

    public function tone()
    {
        return $this->hasOne(Tone::class, 'id', 'tone_id');
    }

    public function languge()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

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
