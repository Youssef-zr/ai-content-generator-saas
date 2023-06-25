<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
    // user subscription
    public function subscription()
    {
        $plans = Plan::where("type", "paid")->get();
        $intent = auth()->user()->createSetupIntent();

        return view('user.pages.user.subscription.subscription', compact("plans", "intent"));
    }

    // new subscription payment
    public function subscription_payment(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');

        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('plan_id');

        try {
            $user->newSubscription('default', $plan)->create($paymentMethod, [
                'email' => $user->email
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['msgDanger' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect_with_flash("msgSuccess", "Subscription Created Successfully", "/", "false");
    }

    // subscriptions payments list
    public function userSubscriptions()
    {
        $subscriptions = Subscription::where('user_id', auth()->id())->orderBy('id',"desc")->get();
        // dd($subscriptions);

        return view('user.pages.user.subscription.payments', compact("subscriptions"));
    }
}
