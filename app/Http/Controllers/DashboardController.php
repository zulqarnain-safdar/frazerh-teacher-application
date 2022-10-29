<?php

namespace App\Http\Controllers;

use App\Models\Subcription;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $registered_users = User::where('user_type', '!=', 'admin')->count();
        $free_users = User::where('account_type', '!=', 'Free')->count();
        $paid_users = User::where('account_type', '!=', 'Paid')->count();
        $monthly_income = 0;
        // dd(Carbon::now()->month);
        $subcriptions = Subcription::whereMonth('created_at', '=', Carbon::now()->month)->get();
        
        foreach($subcriptions as $sub)
        {
           
            if($sub->user->subscribe_plan == 'Monthly')
            {
                $monthly_income = $monthly_income + 3.50;
            }
            if($sub->user->subscribe_plan == 'Yearly')
            {
                $monthly_income = $monthly_income + 8.50;
            }
        }
        
        return view('admin.dashboard.dashboard', compact('registered_users', 'free_users', 'paid_users', 'monthly_income'));
    }
}
