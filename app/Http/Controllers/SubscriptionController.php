<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Stripe;
use Session;
use Exception;
use Stripe\Plan;
use App\Models\User;
use App\Models\Subscription;
use App\Models\SubscriptionItem;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Doctrine\Inflector\Rules\Substitutions;
use Laravel\Cashier\Database\Factories\SubscriptionFactory;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        $plan_type = auth()->user()->subscribe_plan;
        
        return view('frontend.subscription.index',compact('intent','plan_type'));
    }

    public function create_subscription(Request $request, Plan $plan)
    {
        
        auth()->user()->newSubscription('default', $request->plan)->create($request->payment_method);
        
        $user = Auth::user();
        $user->account_type = 'Paid';
        $user->plan_status = 'Active';
        $user->save();

        //update ranking score
        $profile = Auth::user()->profile;
        $profile->ranking_score = 10;
        $profile->save();
       

        return redirect('/premium-dashboard');


    }
}
