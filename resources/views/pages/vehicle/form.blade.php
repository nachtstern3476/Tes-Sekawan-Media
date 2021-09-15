@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h5 m-0 text-gray-800 font-weight-bold">{{ $title }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ $action }}" method="POST" class="row">
                @if (!$isCreate)
                    @method('PUT')
                @endif
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Nama Kendaraan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Mitsubishi Fighter Fuso FN 6x4..." value="{{ $isCreate ? '' : $item->name}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="brand" class="form-label">Merek Kendaraan</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Mitsubishi" value="{{ $isCreate ? '' : $item->brand}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Tipe Kendaraan</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Truk Fuso" value="{{ $isCreate ? '' : $item->type}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="plate_number" class="form-label">Plat Nomor</label>
                    <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="s1248sn" style="text-transform: uppercase" value="{{ $isCreate ? '' : $item->plate_number}}" required>
                </div>
                <div class="col-md-6">
                    <label for="owner" class="form-label">Pemilik Kendaraan</label>
                    <input type="text" class="form-control" id="owner" name="owner" placeholder="PT Tambang Jaya" value="{{ $isCreate ? '' : $item->owner}}" required>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-{{ $isCreate ? 'primary' : 'warning' }}" type="submit">{{ $isCreate ? 'Tambah' : 'Edit' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection