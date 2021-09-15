@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">List Pemesanan</h1>
        @if (auth()->user()->level == 1)
            <a href="/admin/orders/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pesanan Baru</span>
            </a>
        @endif
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
                            <td><span class="btn btn-disabled btn-{{
                                $item->status == 'pending' ? 'warning' : 'success'
                            }}">{{ ucfirst($item->status) }}</span></td>
                            <td>
                                <a href="/admin/orders/{{$item->_id}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if ($item->status == 'disetujui' && auth()->user()->level == 1)
                                    <form action="/admin/orders/{{$item->_id}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        
                                        <input type="hidden" name="vehicle_id" value="{{ $item->vehicle_id }}">
                                        <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-check"></i></button>
                                    </form>
                                @endif
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