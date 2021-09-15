<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'items' => Order::where('spt_orders.status', '!=', 'ditolak')
                            ->where('spt_orders.status', '!=', 'selesai')
                            ->join('spt_drivers', 'spt_orders.driver_id', '=', 'spt_drivers._id')
                            ->join('spt_vehicles', 'spt_orders.vehicle_id', '=', 'spt_vehicles._id')
                            ->orderBy('spt_orders.created_at', 'DESC')
                            ->get(['spt_drivers.name AS driver_name', 'spt_vehicles.plate_number', 
                            'spt_vehicles.type', 
                            'spt_vehicles.name', 
                            'spt_vehicles._id AS vehicle_id', 
                            'spt_orders.status',
                            'spt_orders._id']),
        ];

        return view('pages/order/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Pemesanan Baru',
            'driver' => Driver::all(),
            'vehicle' => Vehicle::where('status', '=', 0)->get(),
            'approval' => User::where('level', '=', '2')->get()
        ];

        return view('pages/order/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'driver_id' => $request->nameDriver,
            'vehicle_id' => $request->nameVehicle,
            'user_approval_id' => $request->name,
            'user_input_id' => auth()->user()->_id,
            'message' => $request->message,
        ];
        Vehicle::where('_id', '=', $request->nameVehicle)->update(['status'=>1]);
        Order::create($data);
        activity()->log(auth()->user()->name." membuat pesanan baru");
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Pesanan Baru.',
        ];
        return redirect('admin/orders')->with('status', $message);
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
            'driver' => Driver::find($order->driver_id),
            'vehicle' => Vehicle::find($order->vehicle_id),
            'approval' => User::find($order->user_approval_id)->get('name')->first(),
            'order' => $order->_id,
            'status' => $order->status,
            'message' => $order->message
        ];

        return view('pages/order/detail', $data);
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
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Melakukan Approval.',
        ];

        if ($request->vehicle_id) {
            Vehicle::where('_id', '=', $request->vehicle_id)->update(['status'=>0]);
            Order::where('_id', '=', $id)->update(['status'=>'selesai']);

            activity()->log(auth()->user()->name." menyelesaikan pesanan");
            $message = [
                'status' => 'success',
                'message' => 'Berhasil menyelesaikan pesanan, Sekarang kendaraan bisa dipakai lagi.',
            ];
        }

        if ($request->approval == 'approve') {
            activity()->log(auth()->user()->name." menyetujui pesanan");
            Order::where('_id', '=', $id)->update(['status'=>'disetujui']);
        }else{
            activity()->log(auth()->user()->name." menolak pesanan");
            Order::where('_id', '=', $id)->update(['status'=>'ditolak']);
        }


        return redirect('admin/orders')->with('status', $message);
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
