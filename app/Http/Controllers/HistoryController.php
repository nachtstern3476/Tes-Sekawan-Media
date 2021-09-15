<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'items' => Order::join('spt_drivers', 'spt_orders.driver_id', '=', 'spt_drivers._id')
                            ->join('spt_vehicles', 'spt_orders.vehicle_id', '=', 'spt_vehicles._id')
                            ->where('spt_orders.status', '=', 'ditolak')
                            ->orWhere('spt_orders.status', '=', 'selesai')
                            ->get(['spt_drivers.name AS driver_name', 'spt_vehicles.plate_number', 
                            'spt_vehicles.type', 
                            'spt_vehicles.name', 
                            'spt_orders.status',
                            'spt_orders._id']),
        ];

        return view('pages/history/index', $data);
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
        $order = Order::find($id);
        $data = [
            'driver' => Driver::withTrashed()->find($order->driver_id),
            'vehicle' => Vehicle::withTrashed()->find($order->vehicle_id),
            'approval' => User::find($order->user_approval_id)->get('name')->first(),
            'status' => $order->status,
            'message' => $order->message
        ];

        return view('pages/history/detail', $data);
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
    public function destroy($id)
    {
        //
    }
}
