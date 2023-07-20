@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')

<h2>Developers Rating</h2>
<table>
  <thead>
    <tr>
      <th>Avatar</th>
      <th>Group</th>
      <th>Name</th>
      <th>Points</th>
      <th>Control</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td><img src="https://placehold.co/60" alt="placehold"></td>
      <td>ninja</td>
      <td>ahmed mohamed</td>
      <td>120</td>
      <td>
        <button class="button_one">view</button>
        <button class="button_two">delete</button>
      </td>
    </tr>

    <tr>
      <td><img src="https://placehold.co/60" alt="placehold"></td>
      <td rowspan="2">shades</td>
      <td>shady nabile</td>
      <td>180</td>
      <td>
        <button class="button_one">view</button>
        <button class="button_two">delete</button>
      </td>
    </tr>

    <tr>
      <td><img src="https://placehold.co/60" alt="placehold"></td>
      <td>eman mohamed</td>
      <td>160</td>
      <td>
        <button class="button_one">view</button>
        <button class="button_two">delete</button>
      </td>
    </tr>
  </tbody>

  <tr>
    <td><img src="https://placehold.co/60" alt="placehold"></td>
    <td rowspan="2">valhala</td>
    <td>mohamed inbrahim</td>
    <td>190</td>
    <td>
      <button class="button_one">view</button>
      <button class="button_two">delete</button>
    </td>
  </tr>

  <tr>
    <td><img src="https://placehold.co/60" alt="placehold"></td>
    <td>noor atef</td>
    <td>110</td>
    <td>
      <button class="button_one">view</button>
      <button class="button_two">delete</button>
    </td>
  </tr>

  <tr class="bottom">
    <td><img src="https://placehold.co/60" alt="placehold"></td>
    <td>unino</td>
    <td>ibrahim adel</td>
    <td>130</td>
    <td>
      <button class="button_one">view</button>
      <button class="button_two">delete</button>
    </td>
  </tr>
</table>

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
                {data: 'category_name', name: 'category_name'},
                {data: 'image', name: 'image'},
                {data: 'price', name: 'price'},
                {data: 'stock', name: 'stock'},
                {data: 'discount', name: 'discount'},
                {data: 'status', name: 'status'},
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
