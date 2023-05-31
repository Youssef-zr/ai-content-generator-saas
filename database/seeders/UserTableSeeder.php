<?php

namespace Database\Seeders;

use App\Models\Front\Settings;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "yn-neinaa@hotmail.com";
        $admin->password = Hash::make('123456');
        $admin->save();

        $admin->addRole(1);

        // -------------------------------------------------------------------

        $user = new User();
        $user->name = "user";
        $user->email = "user@app.com";
        $user->password = Hash::make('123456');
        $user->save();

        $user->addRole(2);

        $enLang = Language::where('language', "english")->first()->id;
        Settings::create([
            'user_id' => $user->id,
            "language_id" => $enLang,
        ]);
    }
}
