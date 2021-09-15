@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">List Kendaraan</h1>
        <a href="/admin/vehicles/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Kendaraan Baru</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kendaraan</th>
                            <th>Tipe Kendaraan</th>
                            <th>Plat Nomor</th>
                            <th>Pemilik</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->plate_number }}</td>
                            <td>{{ $item->owner }}</td>
                            <td>{{ $item->status == 1 ? 'Dipakai' : 'Tidak Dipakai' }}</td>
                            <td>
                                <a href="/admin/vehicles/{{$item->_id}}/edit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/admin/vehicles/{{$item->_id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})
            $('input').css('text-transform', 'uppercase')
        });
    </script>
    @if (session('status'))
        <script>
            let header = '{{ucfirst(session('status')['status'])}}'
            let status = '{{session('status')['status']}}'
            let message = '{{session('status')['message']}}'
            Swal.fire(header, message, status)
        </script>
    @endif
@endsection