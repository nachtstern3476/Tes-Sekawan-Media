@extends('theme.index')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h5 m-0 text-gray-800 font-weight-bold">User Activity Logs</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Created Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activity as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
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
            $('#dataTable').DataTable({"sDom": 'tp',"lengthChange": false,"pageLength":5})
            $('input').css('text-transform', 'uppercase')
        });
    </script>
@endsection