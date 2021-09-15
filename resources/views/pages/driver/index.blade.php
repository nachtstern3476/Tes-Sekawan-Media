@extends('theme.index')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">List Pengemudi</h1>
        <a href="/admin/drivers/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Pengemudi  Baru</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pengemudi</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telfon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a href="/admin/drivers/{{$item->_id}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="/admin/drivers/{{$item->_id}}/edit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/admin/drivers/{{$item->_id}}" method="POST">
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
@endsection