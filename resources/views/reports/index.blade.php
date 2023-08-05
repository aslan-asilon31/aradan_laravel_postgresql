@extends('adminlte::page')

@section('title', 'Report')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <h1>Report</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-tools">
            <div class="dropdown btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="orderFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter Reports
                </button>
                <div class="dropdown-menu" aria-labelledby="orderFilterDropdown">
                    <a class="dropdown-item filter-option" href="#" data-filter="today">Report Today</a>
                    <a class="dropdown-item filter-option" href="#" data-filter="this_week">Report This Week</a>
                    <a class="dropdown-item filter-option" href="#" data-filter="this_month">Report This Month</a>
                </div>
            </div>
            <div class="btn-group">
                <input type="file" id="fileUploader" style="display: none;">
            </div>
            <button type="button" class="btn btn-lg btn-danger" style="" data-toggle="tooltip" title="Export PDF" onclick="exportData('pdf')">
                <i class="fas fa-file-pdf" ></i>
            </button>
            <button type="button" class="btn btn-lg btn-warning"  data-toggle="tooltip" title="Export Excel" onclick="exportData('excel')">
                <i class="fas fa-file-excel" style="color:white;"></i>
            </button>
            <button type="button" class="btn btn-lg btn-info" data-toggle="tooltip" title="Export CSV" onclick="exportData('csv')">
                <i class="fas fa-file-csv"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>User name</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                        <th>Snap Token</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

 <!-- left modal -->
 <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
    <div class="modal-dialog" role="document">
        <form method="post" action="" id="sales-import" enctype="multipart/form-data">
            <div class="modal-content ">
                <!-- <input type="hidden" name="email_e" value="admin@filmscafe.in"> -->
                <div class="modal-header">
                <h2 class="modal-title">Input Data user:</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body get_quote_view_modal_body">
                            @csrf

                            @if (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form-group">
                            {{-- 
                                @csrf
                                <input type="file" name="file"
                                      class="form-control">
                                <br> --}}
                                <label for="">File (.xls, .xlsx)</label>
                                <input type="file" class="form-control file" name="file">
                                <p class="text-danger">{{ $errors->first('file') }}</p>

                                <a href="" class="btn btn-info" ><i class="fas fa-download"></i>Download Template Excel</a>
                            </div>

                            <div class="">
                                <p style="font-size:17px;font-weight:bold">Langkah-langkah import data user</p>

                                <ol>
                                <li>Klik tombol <b> Browse</b> dan pilih file excel yang akan di import, <br> perhatikan limit pada saat import data excel maksimal 20.000 baris data </li>
                                <br>
                                <li>Klik tombol <b> Download Template Excel </b>untuk mendownload template excel,<br> template ini digunakan untuk menginput data user secara manual </li>
                                <br>
                                <li>Pada Kolom <b> Tanggal di Template Excel </b>dengan Format <b> Text </b>  </li>
                                <br>
                                {{-- <li>Milk</li> --}}
                                </ol> 
                            </div>
        
                            <span id="data_reference_import"></span>
                            <input id="reference_import" type="hidden" name="reference_import" value="">
                            <input id="type_input" type="hidden" name="type_input" value="import">
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</a>
                            <button id="" type="submit" class="btn bg-lime btn-flat"><i class="fas fa-upload"></i> Import</button>
                        </div>

            </div><!-- modal-content -->
        </form>
    </div><!-- modal-dialog -->
</div>
<!-- End Left modal -->


@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>




{{-- Filter Report per day, week, month : --}}
<script type="text/javascript">

    // Set the CSRF token globally for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('reports') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user_id', name: 'user_id'},
                {data: 'user_name', name: 'user_name'},
                {data: 'product_id', name: 'product_id'},
                {data: 'product_name', name: 'product_name'},
                {data: 'payment_status', name: 'payment_status'},
                {data: 'qty', name: 'qty'},
                {data: 'total_price', name: 'total_price'},
                {data: 'snap_token', name: 'snap_token'},
                {data: 'created_at', name: 'created_at'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

        // Handle the filter option selection
        $('.filter-option').on('click', function () {
            var filterValue = $(this).data('filter');

            // Make an AJAX request to the filter endpoint
            $.ajax({
                type: "POST",
                url: "{{ url('reports/filter') }}",
                data: { filter: filterValue },
                dataType: "json",
                beforeSend: function (xhr) {
                    // Include the CSRF token in the request headers
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                },
                success: function (data) {
                    // Clear the existing DataTable data and reload with the filtered data
                    table.clear().draw();
                    table.rows.add(data.data).draw();
                }
            });
        });
    });
</script>
{{-- End Filter Report per day, week, month : --}}

@stop
