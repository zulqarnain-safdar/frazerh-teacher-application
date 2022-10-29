<?php

namespace App\Http\Controllers;

use Auth;
use Stripe;
use Session;
use Exception;
use Stripe\Plan;
use App\Models\User;
use App\Models\Subcription;
use App\Models\SubscriptionItem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Doctrine\Inflector\Rules\Substitutions;
use Laravel\Cashier\Database\Factories\SubscriptionFactory;

class AdminSubscriptionController extends Controller
{
    public function all_subscriptions(Request $request)
    {
        if ($request->ajax()) {
            $data = Subcription::with('user')->get();
           // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($document) {
                    return date('d-m-Y H:i:s', strtotime($document->created_at));
                })
                ->editColumn('trial_ends_at', function ($document) {
                    if($document->trial_ends_at == null)
                    {
                        return '';
                    }
                    return date('d-m-Y H:i:s', strtotime($document->trial_ends_at));
                })
                
                // ->addColumn('email', function ($model){
                //     if(!empty($model->user_id)){
                //         $user = User::find($model->user_id);
                //         $email = $user->email;
                //         return $email;
                //     }
                //     else{
                //         return "";
                //     }
                // })
                ->editColumn('stripe_status', function ($model){
                    if($model->stripe_status == 'cancelled')
                    {
                        $label = '<span class="badge badge-danger">'. $model->stripe_status.'</span>';

                    }
                    if($model->stripe_status == 'Payment Failed')
                    {
                        $label = '<span class="badge badge-danger">'. $model->stripe_status.'</span>';

                    }
                    else
                    {
                        $label = '<span class="badge badge-success">'. $model->stripe_status.'</span>';

                    }
                    
                    return $label;
                })
                ->editColumn('updated_at', function ($document) {
                    return date('d-m-Y H:i:s', strtotime($document->updated_at));
                })
                ->addColumn('actions', function ($row) use($request) {
                    $dropdown = '<div class="dropdown"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action</a><div class="dropdown-menu">';

                    $dropdown = $dropdown . "<a href='" . route('cancel-subscription',$row->id) . "' class='dropdown-item has-icon'><i class='fa fa-user'></i>Cancel Subscription</a>";
                   

                    $dropdown = $dropdown . "</div></div>";        
                            
                    return $dropdown;
                })
                ->rawColumns(['actions','stripe_status'])
                ->make(true);
        }

        return view('admin.subscription.index');
    }
    
    

    public function cancel_subscription($id)
    {
        $subscription = Subcription::find($id);
        $stripe = array(
        "secret_key"      => "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" /*  Actual secret key redacted */,
        "publishable_key" => "pk_live_51KQdZbErepg3X4jNMYKnPCJy3OQ5otfSSoe5H31dTi6QQICMh5WgC9Q02Ij6mCfYLxCUo1NvCUiplbvcBNIqr7EO00Bfg1ln8B" /* Actual publishable_key redacted */
        );
        
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        $subscribe_subscription = \Stripe\Subscription::retrieve($subscription->stripe_id);
        
        if($subscribe_subscription->cancel())
        {
            $user = User::find($subscription->user_id);
            $user->account_type = 'Unpaid';
            $user->save();
            $subscription->delete();
        }

        notify()->success("Subscription Cancelled Successfully  !");

        return redirect()->route('all-subscriptions');
    }
}
