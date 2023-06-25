<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Stripe\Plan as StripePlan;
use Stripe\Stripe;
use Stripe\StripeClient;

class PlanTableSeeder extends Seeder
{
    protected $stripeClient;

    public function __construct()
    {
        $this->stripeClient = new StripeClient(config('services.stripe.secret'));
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // set stripe secret key
        Stripe::setApiKey(config("services.stripe.secret"));

        $plans = [
            [ // Free plan
                [],
                [
                    "stripe_plan_id" => "",
                    "name" => "Free",
                    "description" => "Get started with basic features, no credit card required.",
                    "billing_interval" => "month",
                    "currency" => "USD",
                    "price" => "0",
                    "type" => 'free',
                    "word_limit" => '1000',
                    "image_limit" => '20',
                ]
            ],
            [ // pro plan
                [
                    "amount" => 1000, // 10 dollar
                    "currency" => "USD",
                    "interval" => 'month',
                    "product" => [
                        "name" => "Pro",
                    ]
                ],
                [
                    "stripe_plan_id" => "",
                    "name" => "Pro",
                    "description" => "Unlock advanced features and priority support.",
                    "billing_interval" => "month",
                    "currency" => "USD",
                    "price" => "10",
                    "type" => 'paid',
                    "word_limit" => '5000',
                    "image_limit" => '100',
                ]
            ],
            [ // Business plan
                [
                    "amount" => 2000, // 20 dollar
                    "currency" => "USD",
                    "interval" => 'month',
                    "product" => [
                        "name" => "Business",
                    ]
                ],
                [
                    "stripe_plan_id" => "",
                    "name" => "Business",
                    "description" => "Access premium tools and team collaboration options.",
                    "billing_interval" => "month",
                    "currency" => "USD",
                    "price" => "20",
                    "type" => 'paid',
                    "word_limit" => '10000',
                    "image_limit" => '200',
                ]
            ],
            [ // Entreprise plan
                [
                    "amount" => 5000, // 50 dollar
                    "currency" => "USD",
                    "interval" => 'month',
                    "product" => [
                        "name" => "Enterprise",
                    ]
                ],
                [
                    "stripe_plan_id" => "",
                    "name" => "Enterprise",
                    "description" => "Customizable solutions for large projects and dedicated support.",
                    "billing_interval" => "month",
                    "currency" => "USD",
                    "price" => "50",
                    "type" => 'paid',
                    "word_limit" => '70000',
                    "image_limit" => '400',
                ]
            ],
        ];


        foreach ($plans as $plan) {

            $stripeData = $plan[0];
            $stripePlan = [];
            if ($stripeData != []) {
                $stripePlan = StripePlan::create($stripeData);
            }

            $dbPlanData = $plan[1];
            $newDbPlan = Plan::create($dbPlanData);

            if ($stripePlan != []) {
                $newDbPlan->fill([
                    'stripe_plan_id' => $stripePlan->id,
                    'stripe_product_id' => $stripePlan->product,
                ])->save();
            }
        }
    }
}
