<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'items' => Vehicle::all(),
        ];
        return view('pages/vehicle/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = [
            'title' => 'Tambah Kendaraan Baru',
            'isCreate' => true,
            'action' => '/admin/vehicles'
        ];

        return view('pages/vehicle/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        Vehicle::create(array_slice($request->all(), 1));
        activity()->log(auth()->user()->name." enambahkan kendaraan baru");
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Kendaraan Baru.',
        ];
        return redirect('admin/vehicles')->with('status', $message);
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
        $data = [
            'title' => 'Edit Data Kendaraan',
            'item' => Vehicle::find($id),
            'isCreate' => false,
            'action' => "/admin/vehicles/{$id}"
        ];
        return view('pages/vehicle/form', $data);
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
        Vehicle::where('_id', $id)->update(array_slice($request->all(), 2));
        activity()->log(auth()->user()->name." merubah data kendaraan");
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Mengedit Kendaraan.',
        ];
        return redirect('admin/vehicles')->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::where('_id', $id)->delete();
        activity()->log(auth()->user()->name." menghapus data kendaraan");
        
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Menghapus Kendaraan.',
        ];
        return redirect('admin/vehicles')->with('status', $message);
    }
}
