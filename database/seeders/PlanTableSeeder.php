<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                "title" => "Free",
                "description" => "Get started with basic features, no credit card required.",
                "price_monthly" => "0",
                "price_yearly" => "0",
                "type" => "free",
                "word_limit" => "1500",
                "image_limit" => "500",
                "pp_monthly_plan" => "",
                "pp_yearly_plan" => "",
            ],
            [
                "title" => "Pro",
                "description" => "Unlock advanced features and priority support.",
                "price_monthly" => "10",
                "price_yearly" => "108",
                "type" => "paid",
                "word_limit" => "5000",
                "image_limit" => "1000",
                "pp_monthly_plan" => "P-91H563139D769654RMPOWJQQ",
                "pp_yearly_plan" => "P-37U95393T2635261PMPOWOKQ",
            ],
            [
                "title" => "Business",
                "description" => "Access premium tools and team collaboration options.",
                "price_monthly" => "20",
                "price_yearly" => "216",
                "type" => "paid",
                "word_limit" => "10000",
                "image_limit" => "200",
                "pp_monthly_plan" => "P-3XC304917S424213CMPOWPGY",
                "pp_yearly_plan" => "P-85174520P94563258MPOWPUY",
            ],
            [
                "title" => "Enterprise",
                "description" => "Customizable solutions for large projects and dedicated support.",
                "price_monthly" => "50",
                "price_yearly" => "540",
                "type" => "paid",
                "word_limit" => "500000",
                "image_limit" => "4000",
                "pp_monthly_plan" => "P-90W42065MA850360TMPOWP4Y",
                "pp_yearly_plan" => "P-18V52260RW302494HMPOWQDY",
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
