<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
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
        $data = [
            'order_per_month' => json_encode(['asdf'=>12,'asde'=>21,'asd'=>4]),
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
