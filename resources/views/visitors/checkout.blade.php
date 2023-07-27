@extends('layouts/frontend_layout')

@section('content')

@php
    // $totalGrossAmount = $totalGrossAmount; // Replace this with the actual value or calculation
@endphp
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Note:</h5>
          This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> Aradan Online Shop
                <small class="float-right">Invoice </small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>Aradan Online Shop</strong><br>
                  Jagakartsa,Jakarta Selatan<br>
                  DKI Jakarta, Indonesia CA 94107<br>
                  Phone: (804) 123-5432<br>
                  Email: info@gmail.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{ Auth::user()->name; }}</strong><br>
                  Bandung barat<br>
                  Jawa Barat, Indoneisa<br>
                  Phone: (555) 539-1037<br>
                  Email: {{ Auth::user()->name; }}@example.com
                </address>
              </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #007612</b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> {{ $formattedDate }}<br>
              <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Serial #</th>
                  <th>Description</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)

                <tr>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->name }}</td>
                  <td>455-981-221</td>
                  <td>Waiting for payment</td>
                  <td>{{ number_format($itemTotalPrice  = $item->quantity *  $item->price, 0, ',', '.')}}</td>
                </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <p class="lead">Payment Methods:</p>
              <img src="{{ asset('assets/frontend/dist/img/credit/visa.png') }}" alt="Visa">
              <img src="{{ asset('assets/frontend/dist/img/credit/mastercard.png') }}" alt="Mastercard">
              <img src="{{ asset('assets/frontend/dist/img/credit/american-express.png') }}" alt="American Express">
              <img src="{{ asset('assets/frontend/dist/img/credit/paypal2.png') }}" alt="Paypal">

              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>Rp {{ number_format($totalPrice += $itemTotalPrice, 0, ',', '.')   }}</td>
                  </tr>
                  <tr>
                    <th>Tax (11%)</th>
                    <td>{{ number_format($Afterpajak = $totalPrice * 0.11, 0, ',', '.')  }}</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>Rp 0</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>Rp {{ number_format($grantTotal = $totalPrice + $Afterpajak, 0, ',', '.') }}</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="invoice-print" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              <button  class="btn btn-success float-right" id="pay-button"><i class="far fa-credit-card"></i> Submit
                Payment
              </button>
              <a href="invoice-generate-pdf" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
              </a>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->



  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $snapToken }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            }
        });
    });
</script>
@endsection


@section('css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{ asset('assets/frontend/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('assets/frontend/dist/css/adminlte.min.css') }} ">
@endsection

@section('js')
  


<!-- jQuery -->
<script src="{{ asset('assets/frontend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/frontend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/frontend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/frontend/dist/js/demo.js') }}"></script>

@endsection