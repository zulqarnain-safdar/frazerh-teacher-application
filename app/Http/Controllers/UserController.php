<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subcription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Exports\UsersExport;
use Carbon\Carbon;
use session;
use Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('profile')->where('user_type', 'teacher');

            if (isset($request->user_email)) {

                if ($request->user_email == "All") {
                    $query->where('user_type', '!=', 'admin');
                } else {
                    $query->where('email', $request->user_email);
                }
            } else {
            }
            if (isset($request->account_type)) {
                if ($request->account_type == "All") {
                    $query->whereIn('account_type', ['Free', '14 days trial', 'Unpaid', 'Paid']);
                } else {
                    $query->where('account_type', $request->input('account_type'));
                }
            }


            $data = $query->get();

            // dd($data);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($document) {
                    return date('d-m-Y H:i:s', strtotime($document->created_at));
                })

                ->editColumn('status', function ($model) {
                    if ($model->status == 'Active') {
                        $label = '<span class="badge badge-success">' . $model->status . '</span>';
                    } else {
                        $label = '<span class="badge badge-danger">' . $model->status . '</span>';
                    }

                    return $label;
                })
                ->editColumn('account_type', function ($model) {
                    if ($model->account_type == 'Unpaid') {
                        $label = '<span class="badge badge-danger">Unpaid</span>';
                    } else {
                        $label = '<span class="badge badge-success">' . $model->account_type . '</span>';
                    }

                    return $label;
                })

                ->editColumn('notes', function ($model) {
                    $label = '<input type="text" value="' . $model->notes . '" data-user-id="' . $model->id . '"class="textbox form-control" />';

                    return $label;
                })
                ->editColumn('check', function ($model) {
                    $label = '<input type="checkbox" class="users_checkbox" value="' . $model->id . '"/>';

                    return $label;
                })

                ->editColumn('updated_at', function ($document) {
                    return date('d-m-Y H:i:s', strtotime($document->updated_at));
                })

                ->rawColumns(['status', 'account_type', 'notes', 'check'])
                ->make(true);
        }

        $userlist = User::where('user_type', '!=', 'admin')->get();
        return view('admin.users.index', compact('userlist'));
    }



    public function change_status($id)
    {
        $user = User::find($id);

        if ($user->status == 'Active') {
            $user->status = 'Inactive';
            $user->save();
            notify()->success("User inactive Successfully  !");
        } else {
            $user->status = 'Active';
            $user->save();

            notify()->success("user active Successfully  !");
        }


        return redirect()->route('user.index');
    }

    public function change_account(Request $request)
    {
        $ids = $request->ids;
        
        $users = User::whereIn('id', $ids)->get();

       
        foreach ($users as $user) {
            // dd($user);
            $end_date = Carbon::now()->addDays(14)->format('Y-m-d');
            
            $user->trial_ends_at = $end_date;
           

            $user->account_type = '14 days trial';

            $user->save();

            $subscription = Subcription::where('user_id', $user->id)->first();
            // dd($subscription);
            if($subscription != null)
            {
                $subscription->trial_ends_at = $end_date;
                $subscription->stripe_status = 'trialing';
                $subscription->save();
            }
        }


        notify()->success("Account Status changed successfully !");

        return redirect()->route('users.index');
    }
    public function change_account_to_free_paid(Request $request)
    {
        $ids = $request->ids;
        
        $users = User::whereIn('id', $ids)->get();
        
        foreach ($users as $user) {
            
            $user->account_type = 'Paid';
            $user->save();

            $subscription = Subcription::where('user_id', $user->id)->first();
            // dd($subscription);
            if ($subscription != null) {
                $subscription->stripe_status = 'active';
                $subscription->trial_ends_at = null;
                $subscription->save();
            }


        }


        notify()->success("Account Status changed successfully !");

        return redirect()->route('user.index');
    }

    public function exportExcelCSV()
    {
        return Excel::download(new UsersExport, 'users_file.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->ids;
      
        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            if ($user->subscribed('default')) {
                $subscription = Subscription::where('user_id', $user->id)->first();
                $stripe = array(
                    "secret_key"      => "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" /*  Actual secret key redacted */,
                    "publishable_key" => "pk_live_51KQdZbErepg3X4jNMYKnPCJy3OQ5otfSSoe5H31dTi6QQICMh5WgC9Q02Ij6mCfYLxCUo1NvCUiplbvcBNIqr7EO00Bfg1ln8B" /* Actual publishable_key redacted */
                );

                \Stripe\Stripe::setApiKey($stripe['secret_key']);
                $subscribe_subscription = \Stripe\Subscription::retrieve($subscription->stripe_id);
                $subscribe_subscription->cancel();
            }
            $user->delete();
        }


        return back()->with('success', 'User Deleted Successfully!!');
    }

   
}
