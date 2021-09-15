<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Driver;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'items' => Driver::all(),
        ];
        return view('pages/driver/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Pengemudi Baru',
            'isCreate' => true,
            'action' => '/admin/drivers'
        ];

        return view('pages/driver/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->photo->extension();
		$filename = time()."_"."photo".".".$extension;
        $request->photo->storeAs('/public', $filename);
        $url = Storage::url($filename);

        Driver::create(array_merge(array_slice($request->all(), 1),['photo'=>$url]));


        activity()->log(auth()->user()->name." menambahkan pengemudi baru");
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Pengemudi Baru.',
        ];
        return redirect('admin/drivers')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'item' => Driver::find($id),
        ];

        return view('pages/driver/detail', $data);
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
            'title' => 'Edit Data Pengemudi',
            'item' => Driver::find($id),
            'isCreate' => false,
            'action' => "/admin/drivers/{$id}"
        ];
        return view('pages/driver/form', $data);
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

        $data = array_slice($request->all(), 2);

        if($request->photo){
            $oldFilename = Driver::find($id);
            if (file_exists(public_path($oldFilename->photo))) {
                unlink(public_path($oldFilename->photo));
            }

            $extension = $request->photo->extension();
            $filename = time()."_"."photo".".".$extension;
            $request->photo->storeAs('/public', $filename);
            $url = Storage::url($filename);

            $data = array_merge(array_slice($request->all(), 2), ['photo'=>$url]);
            activity()->log(auth()->user()->name." mengedit foto pengemudi");
        }

        activity()->log(auth()->user()->name." mengedit data pengemudi");
        Driver::where('_id', $id)->update($data);
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Mengedit Data Pengemudi.',
        ];
        return redirect('admin/drivers')->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        activity()->log(auth()->user()->name." menghapus data pengemudi");
        Driver::where('_id', $id)->delete();
        $message = [
            'status' => 'success',
            'message' => 'Berhasil Menghapus Data Pengemudi.',
        ];

        return redirect('admin/drivers')->with('status', $message);
    }
}
