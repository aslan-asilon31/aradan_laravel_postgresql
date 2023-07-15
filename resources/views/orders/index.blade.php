@extends('adminlte::page')

@section('title', 'Order')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')


<div class="col-lg-12">
    <div class="row">
        <div class="col-md-12">
            {{-- success order  --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Waiting for Payment</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Win 95+</td>
                        <td>
                            <a href=""> <u>Detail</u> </a> | 
                            <a href=""> <u>Print</u> </a> |
                            <a href=""> <u>Delete</u> </a>
                        </td>
                    </tr>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<div class="col-lg-12 d-flex">

        <div class="col-md-6">
            {{-- success order  --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Success Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Win 95+</td>
                        <td>
                            <a href=""> <u>Detail</u> </a> | 
                            <a href=""> <u>Print</u> </a> |
                            <a href=""> <u>Delete</u> </a>
                        </td>
                    </tr>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    
        <div class="col-md-6">
            {{-- failed order  --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Failed Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Win 95+</td>
                        <td>
                            <a href=""> <u>Detail</u> </a> |
                            <a href=""> <u>Delete</u> </a> 
                        </td>
                    </tr>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop