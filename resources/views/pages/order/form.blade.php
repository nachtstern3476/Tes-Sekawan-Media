@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h5 m-0 text-gray-800 font-weight-bold">{{ $title }}</h1>
        </div>
        <div class="card-body">
            <form action="/admin/orders" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameDriver" class="form-label">Nama Pengemudi</label>
                            <select name="nameDriver" id="nameDriver" class="custom-select" style="width: 100%" required>
                                <option value="">- Pilih Pengemudi -</option>
                                @foreach ($driver as $item)
                                    <option value="{{ $item->_id  }}" 
                                    data-address="{{ $item->address }}" 
                                    data-phone="{{ $item->phone }}"
                                    data-gender="{{ $item->gender }}">{{ $item->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control" required disabled>
                                <option value="">- Pilih -</option>
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">No Telfon</label>
                            <input type="text" class="form-control" id="phone" name="phone" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameVehicle" class="form-label">Nama Kendaraan</label>
                            <select name="nameVehicle" id="nameVehicle" class="custom-select" style="width: 100%" required>
                                <option value="">- Pilih Kendaraan -</option>
                                @foreach ($vehicle as $item)
                                    <option value="{{ $item->_id  }}"  
                                    data-brand="{{ $item->brand }}"
                                    data-type="{{ $item->type }}">{{ $item->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand" class="form-label">Merek Kendaraan</label>
                            <input type="text" class="form-control" id="brand" name="brand" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Tipe Kendaraan</label>
                            <input type="text" class="form-control" id="type" name="type" required disabled>
                        </div>
                    </div>
                </div>

                <hr class="sidebar-divider">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Pimpinan</label>
                            <select name="name" id="name" class="custom-select" style="width: 100%" required>
                                <option value="">- Pilih Pimpinan -</option>
                                @foreach ($approval as $item)
                                    <option value="{{ $item->_id  }}">{{ $item->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Tujuan Pemesanan</label>
                            <textarea name="message" id="message" cols="15" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script>
        $(`select[name="nameDriver"]`).change(function(){
            let data = $(this).find(':selected')
            $('#phone').val(data.attr('data-phone'))
            $('#gender').val(data.attr('data-gender'))
        })
        $(`select[name="nameVehicle"]`).change(function(){
            let data = $(this).find(':selected')
            $('#brand').val(data.attr('data-brand'))
            $('#type').val(data.attr('data-type'))
        })
    </script>
@endsection