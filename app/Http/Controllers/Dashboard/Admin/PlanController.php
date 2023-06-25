<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Exception;
use Stripe\Plan as StripePlan;
use Stripe\Stripe;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access_plan')->only('index');
        $this->middleware('permission:create_plan')->only(['create', 'store']);
        $this->middleware('permission:update_plan')->only(['edit', 'update']);
        $this->middleware('permission:read_plan')->only(['edit', 'show']);
        $this->middleware('permission:delete_plan')->only(['delete', 'delete-all']);

        // set stripe api key
        Stripe::setApiKey(config("services.stripe.secret"));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::orderBy("id", "desc")->get();
        return view('admin.pages.plans.index', compact("plans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.plans.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        $data = $request->all();

        try {
            $dbPlan = Plan::create($data);

            // check if paid product to store in stripe db
            if ($data['type'] == "paid") {
                $plan = StripePlan::create([
                    "amount" => ($data['price'] * 100),
                    "currency" => $data['currency'],
                    "interval" => $data['billing_interval'],
                    "product" => [
                        "name" => $data['name']
                    ]
                ]);

                $dbPlan->fill([
                    'stripe_plan_id' => $plan->id,
                    'stripe_product_id' => $plan->product,
                ])->save();
            }
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }

        return redirect_with_flash("msgSuccess", "Plan created successfully", "subscriptions/plans");
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        return view('admin.pages.plans.show', compact("plan"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        return view("admin.pages.plans.update", compact("plan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanRequest $request, Plan $plan)
    {
        $plan->fill($request->all())->save();

        return redirect_with_flash("msgSuccess", "Plan updated successfully", "subscriptions/plans");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        // remove product from plans table
        $plan->delete();

        return redirect_with_flash("msgSuccess", "Plan deleted successfully", "subscriptions/plans");
    }

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $plans_ids = json_decode(request()->ids, true);

        if (count($plans_ids) > 0) {
            $plans = Plan::whereIn("id", $plans_ids);
            $plans->delete();

            return redirect_with_flash("msgSuccess", "Plans removed successfully", "subscriptions/plans");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "subscriptions/plans");
    }
}
