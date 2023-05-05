<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $guarded = ["block_icon"];


    public function getBlockIconAttribute()
    {
        $avatar = $this->icon;

        if ($avatar == "default.png") {
            $storagePath = "assets/dist/storage/customize/blocks/";
            $this->icon = $storagePath . $avatar;
        }

        return url($this->icon);
    }
}
