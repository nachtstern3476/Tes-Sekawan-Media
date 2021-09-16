<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::select('_id', 'created_at')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $ordermCount = [];
        $orderArr='';

        foreach ($orders as $key => $value) {
            $ordermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($ordermcount[$i])){
                $orderArr .= $ordermcount[$i].',';
            }else{
                $orderArr .= '0,';
            }
        }        

        $data = [
            'order_per_month' => $orderArr,
            'vehicle_count' => Vehicle::all()->count(),
            'vehicle_avaible' => Vehicle::where('status', '=', 0)->count(),
            'driver' => Driver::all()->count(),
            'pending_request' => Order::where('status', '=', 'pending')->count()
        ];

        return view('pages/index', $data);
    }
    
    public function export() 
    {
        return Excel::download(new OrderExport, 'sispekta_.xlsx');
    }
}
