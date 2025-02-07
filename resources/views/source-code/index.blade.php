@extends('layout.main')
@push('css')
<!-- CSS Libraries Datatables -->
<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

@endpush
@section('content')



<div class="card">
    <div class="card-header">
        <h4>Basic DataTables</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@push('js')
<!-- JS Libraies Datatables -->
<script src="assets/modules/datatables/datatables.min.js"></script>
<script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
@endpush
