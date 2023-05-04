<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'site_title' => 'Bouharous',
            'slogan' => 'bouharous best sass site',
            'email' => 'yn-neinaa@hotmail.com',
            'adress' => 'mimousas kenitra',
            'phone' => '+212762927783',
            'version' => '1.0.0',
            'openai_api_key' => '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',
            'default_max_tokens' => 3000,
            'engine_id' => 7,
            'language_id' => 2,
            'pp_client' => 'AVLcMFTw6a_8zCEvIJmXAwKSgYJe566b17H1L_zGN6O3Ton2lsyu0ERsv5opRvsNynz_Mktl2JojMsRu',
            'pp_secret' => 'EC4JhBSBDj2WGxHO9tkz-tIKRRzISZ1FFjOaKpjGHS6flNInuywUK2zsWuEDAXnzNz0J1CvAH1nm5kpw',
            'pp_env' => 'sandbox',
        ];

        Setting::create($setting);
    }
}
