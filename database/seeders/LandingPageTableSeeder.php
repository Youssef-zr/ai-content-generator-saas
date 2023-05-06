<?php

namespace Database\Seeders;

use App\Models\Front\Design;
use Illuminate\Database\Seeder;

class LandingPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "hero_title" => "Write Better, Write Faster with Genie",
            "hero_subtitle" => "Unlock endless creativity and make your writing dreams a reality with our cutting-edge AI technology. Say goodbye to writer's block and hello to endless inspiration.",
            "hero_cta" => "Get started",
            "hero_promotion" => "Start free trial. * No credit card required.",
            "partners" => "HubSpot,Layar,MailChimp,Forbes,Fitbit",
            "story_title" => "What we do?",
            "story_subtitle" => "AI-powered productivity tool for all your creative needs.",
            "story_blocks" => [1,2,3],
            "story_promotion" => "It is fast and easy. Generate your first and ongoing content with Genie.",
            "pricing_title" => "Flexible and transparent pricing",
            "pricing_subtitle" => "Whatever your status, our offers evolve according to your needs.",
            "pricing_promotion" => "Save up to 10%",
            "testimonial_name" => "Christina",
            "testimonial_title" => "Product Manager | Mailchimp",
            "testimonial_review" => "Genie has truly been a game-changer for our business. Their advanced technology and seamless integration have made it easier for us to accomplish our daily tasks.",
        ];

        Design::create($data);
    }
}
