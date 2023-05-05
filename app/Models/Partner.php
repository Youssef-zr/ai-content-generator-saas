<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $guarded = ["partner_logo"];


    public function getPartnerLogoAttribute()
    {
        $avatar = $this->logo;

        if ($avatar == "default.png") {
            $storagePath = "assets/dist/storage/customize/partners/";
            $this->logo = $storagePath . $avatar;
        }

        return url($this->logo);
    }
}
