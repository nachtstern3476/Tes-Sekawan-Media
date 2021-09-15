@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h5 m-0 text-gray-800 font-weight-bold">{{ $title }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="row">
                @if (!$isCreate)
                    @method('PUT')
                @endif
                @csrf

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Pengemudi</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengemudi..." value="{{ $isCreate ? '' : $item->name}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="birthdate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $isCreate ? '' :  date('Y-m-d', strtotime($item->birthdate))}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <option value="L" {{ !$isCreate && $item->gender == 'L' ? 'selected' : '' }}>Laki Laki</option>
                        <option value="P" {{ !$isCreate && $item->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">No Telfon</label>
                    <input type="text" class="form-control" pattern="[0-9]*" id="phone" name="phone" placeholder="085857510028" value="{{ $isCreate ? '' : $item->phone}}" required>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Alamat Pengemudi</label>
                    <textarea name="address" id="address" rows="5" class="form-control">{{ $isCreate ? '' : $item->address}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="photo" class="form-label">Foto Pengemudi</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .png" value="{{ $isCreate ? '' : $item->photo}}" {{ $isCreate ? 'required' : ''}}>
                    @if (!$isCreate)
                        <small class="text-danger form-text">*Tidak perlu diisi apabila tidak ingin mengubah foto</small>
                    @endif
                    <div class="mt-3">
                        <button class="btn btn-block btn-{{ $isCreate ? 'primary' : 'warning' }}" type="submit">{{ $isCreate ? 'Tambah' : 'Edit' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection