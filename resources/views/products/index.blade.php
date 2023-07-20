@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-tools">
            {{-- @can('product-create') --}}
            <a href="{{ route('product.create') }}" class="create btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create Product</a>
            {{-- @endcan --}}
            <div class="btn-group">
                <button type="button" class="btn btn-lg btn-secondary" data-toggle="tooltip" title="Upload File" onclick="openFileUploader()">
                    <i class="fas fa-upload"></i>
                </button>
                <input type="file" id="fileUploader" style="display: none;">
            </div>
                <a href="/product-pdf"  type="button" class="btn btn-lg btn-danger" style="" data-toggle="tooltip" title="Export PDF" >
                    <i class="fas fa-file-pdf" ></i>
                </a>
                <a href="/product-excel" type="button" class="btn btn-lg btn-warning"  data-toggle="tooltip" title="Export Excel">
                    <i class="fas fa-file-excel" style="color:white;"></i>
                </a>
                <a href="/product-csv" type="button" class="btn btn-lg btn-info" data-toggle="tooltip" title="Export csv" >
                    <i class="fas fa-file-csv"></i>
                </a>
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
                        <th>Rating</th>
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
                {data: 'rating', name: 'rating'},
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
