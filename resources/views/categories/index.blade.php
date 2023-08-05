@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')


<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
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
          <td>X</td>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop