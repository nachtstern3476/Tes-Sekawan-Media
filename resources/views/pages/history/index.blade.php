@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">List Riwayat Pemesanan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pengemudi</th>
                            <th>Nama Kendaraan</th>
                            <th>Tipe Kendaraan</th>
                            <th>Plat Nomor</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->driver_name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->plate_number }}</td>
                            <td><span class="btn btn-disabled btn-{{ $item->status == 'ditolak' ? 'danger' : 'success' }}">{{ ucfirst($item->status) }}</span></td>
                            <td>
                                <a href="/admin/histories/{{$item->_id}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
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
@endsection