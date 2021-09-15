@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h5 m-0 text-gray-800 font-weight-bold">Riwayat Pemesanan</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nameDriver" class="form-label">Nama Pengemudi</label>
                        <input type="text" class="form-control" value="{{ $driver->name }}" disabled>
                    </div>
                    <div class="form-row justify-content-between">
                        <div class="form-group col-5">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $driver->gender == "L" ? "Laki Laki" : "Perempuan" }}" disabled>
                        </div>
                        <div class="form-group col-7">
                            <label for="phone" class="form-label">No Telfon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $driver->phone }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Alamat Pengemudi</label>
                        <textarea name="address" id="address" cols="15" rows="5" class="form-control" disabled>{{ $driver->address }}</textarea>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <figure>
                        <img src="{{ $driver->photo }}" alt="foto pengemudi" class="img-fluid">
                    </figure>
                </div>
            </div>

            <hr class="sidebar-divider">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nameVehicle" class="form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" value="{{ $vehicle->name }}" disabled>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-7">
                            <label for="brand" class="form-label">Merek Kendaraan</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{ $vehicle->brand }}" disabled>
                        </div>
                        <div class="form-group col-5">
                            <label for="type" class="form-label">Tipe Kendaraan</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ $vehicle->type }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plat" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" value="{{ $vehicle->plate_number }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="owner" class="form-label">Pemilik Kendaraan</label>
                        <input type="text" class="form-control" value="{{ $vehicle->owner }}" disabled>
                    </div>
                </div>
            </div>

            <hr class="sidebar-divider">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Pimpinan</label>
                        <input type="text" class="form-control" value="{{ $approval->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Tujuan Pemesanan</label>
                        <textarea name="message" id="message" cols="15" rows="5" class="form-control" disabled>{{ $message }}</textarea>
                    </div>
                    <div class="form-row justify-content-between">
                        <div class="form-group col col-md-4 col-lg-4">
                            <label for="name" class="form-label">Status Pemesanan</label>
                            <button class="btn btn-block btn-{{ 
                                $status == 'ditolak' ? 'danger' : ( $status == 'pending' ? 'warning' : 'success')
                            }}" disabled>{{ ucfirst($status) }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection