<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            "HubSpot",
            "Layar",
            "MailChimp",
            "Forbes",
            "Fitbit",
        ];

        foreach ($partners as $partner) {
            Partner::create(['title' => $partner]);
        }
    }
}
