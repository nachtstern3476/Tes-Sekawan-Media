<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\ActivityLog;

class LogController extends Controller
{
    public function index()
    {
        $data = [
            'activity' => ActivityLog::orderBy('created_at', 'DESC')->get(),
        ];

        return view('pages/log/index', $data);
    }
}
