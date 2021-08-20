<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class DashboardController extends Controller
{


    public function index(Request $request){



        $orders_count = Order::count();
        $products_count = Product::count();
        $cusromers_count = Customer::count();
        $admins_count = User::whereRoleIs('admin')->count();


        $sales_data = Order::select(
            DB::raw('YEAR(created_at) AS year'),
            DB::raw('month(created_at) AS month'),
            DB::raw('SUM(total_price) AS total_price ')

        )->groupBy('month')->get();

        return view('dashboard.dashboard' , compact('sales_data','orders_count','products_count','cusromers_count','admins_count'));
    }
}
