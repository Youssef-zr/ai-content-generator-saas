<?php

namespace App\Models;

use App\Models\Front\Settings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Cashier\Billable;

class User extends Authenticatable  implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ["image_path"];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImagePathAttribute()
    {
        $avatar = $this->image;

        if ($avatar == "default.png") {
            $storagePath = "assets/dist/storage/users/";
            $this->image = $storagePath . $avatar;
        }

        return url($this->image);
    }

    // get user settings
    public function settings()
    {
        return $this->hasOne(Settings::class, 'user_id', 'id');
    }
}
