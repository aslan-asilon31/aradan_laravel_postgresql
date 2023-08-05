@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-tools d-flex justify-content-between">
            <div>
                <a href="{{ route('product.create') }}" class="create btn btn-primary "><i class="fa fa-plus"></i> Create Product</a>
                <a class="btn btn-success btn-import-sales" type="button" id="btn-import" data-toggle="modal" data-target="#information_modal">
                    <i class="fas fa-upload"></i> Import Data product
                </a>
                <a href="/product-pdf" type="button" class="btn  btn-danger" data-toggle="tooltip" title="Export PDF">
                    <i class="fas fa-file-pdf"></i>
                </a>
                <a href="/product-excel" type="button" class="btn  btn-warning" data-toggle="tooltip" title="Export Excel">
                    <i class="fas fa-file-excel" style="color:white;"></i>
                </a>
                <a href="/product-csv" type="button" class="btn  btn-info" data-toggle="tooltip" title="Export csv">
                    <i class="fas fa-file-csv"></i>
                </a>
            </div>
        </div>
        
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Discount</th>
                        <th>Status</th>
                        {{-- <th>Rating</th> --}}
                        <th>Slug</th>
                        <th>Description</th>
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
                    <h2 class="modal-title">Import Data Product:</h2>
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
<script type="text/javascript">
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('products') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'category_id', name: 'category_id'},
                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta){
                        return '<img src="{{ asset('/storage/products') }}/' + data + '" alt="Product Image" height="50px">';
                        // return '<img src="{{ Storage::url('') }}' + data + '" alt="Product Image" height="50px">';
                    }
                },
                {data: 'price', name: 'price'},
                {data: 'stock', name: 'stock'},
                {data: 'discount', name: 'discount'},
                {data: 'status', name: 'status'},
                // {data: 'rating', name: 'rating'},
                {data: 'slug', name: 'slug'},
                {data: 'description', name: 'description'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    });
</script>
@stop
