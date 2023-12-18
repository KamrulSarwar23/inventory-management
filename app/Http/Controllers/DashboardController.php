<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSale = Order::sum('total');
        $totalPurchase = Purchase::sum('total_amount');
   
        return view('dashboard.index', compact('totalSale', 'totalPurchase'));
    }
    
}
