<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    Role,
    User
};


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = "youssef";
        $admin->email = "yn-neinaa@hotmail.com";
        $admin->password = Hash::make('123456');

        $admin->save();

        $adminRole = Role::where('name', "=", "admin")->select("id")->first();
        $admin->addRole($adminRole);
    }
}
