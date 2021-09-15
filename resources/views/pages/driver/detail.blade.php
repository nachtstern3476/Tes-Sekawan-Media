@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h5 m-0 text-gray-800 font-weight-bold">Detail Pengemudi</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col order-md-first order-last">
                    <h3 class="h4">{{ $item->name }}</h3>
                    <hr class="sidebar-divider">
                    <div class="row row-cols-1 row-cols-md-2 justify-content-between">
                        <p class="col-md-6">Jenis Kelamin : {{ $item->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}</p>
                        <p class="col-md-6">Tanggal Lahir : {{ date('d-m-Y', strtotime($item->birthdate)) }}</p>
                        <p class="col-md-6">No Telfon : {{ $item->phone }}</p>
                        <div class="col-md-6">
                            <label for="address">Alamat : </label> 
                            <address id="address">{{ $item->address }}</address>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 align-self-center">
                    <figure>
                        <img src="{{ asset($item->photo) }}" alt="foto {{ $item->name }}" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection