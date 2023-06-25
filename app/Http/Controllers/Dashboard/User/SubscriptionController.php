<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
    // user subscription
    public function subscription()
    {
        $user = auth()->user();
        $plans = Plan::where("type", "paid")->get();
        $intent = $user->createSetupIntent();
        $userPlan = $user->subscriptions->first()->plan;

        return view('user.pages.user.subscription.subscription', compact("plans", "intent","user","userPlan"));
    }

    // new subscription payment
    public function processSubscription(Request $request)
    {

        $user = Auth::user();

        $paymentMethod = $request->input('payment_method');

        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        $plan = $request->input('plan_id');

        try {
            if ($user->subscribed('default')) {
                $user->subscription()->swap($plan);
            } else {
                $user->newSubscription('default', $plan)->create($paymentMethod, [
                    'email' => $user->email
                ]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['msgDanger' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect_with_flash("msgSuccess", "Subscription Created Successfully", "/", "false");
    }

    // subscription invoices list
    public function userInvoices()
    {
        // $subscriptions = Subscription::where('user_id', auth()->id())->orderBy('id',"desc")->get();

        $invoices = auth()->user()->invoices();

        return view('user.pages.user.subscription.payments', compact("invoices"));
    }

    // print user invoice
    public function printInvoice(Request $request, $invoiceId)
    {
        $invoice_name = "invoice_" . time();
        $siteSetting = Setting::first();
        $plan = Subscription::where('user_id', auth()->id())->first()->plan;

        return $request->user()->downloadInvoice($invoiceId, [
            'vendor' => $siteSetting->site_title,
            'product' => "Subscription Plan: ".$plan->name,
            'location' => $siteSetting->adress,
            'phone' => $siteSetting->phone,
            'email' => $siteSetting->email,
            'url' => url('/'),
        ], $invoice_name);
    }
}
