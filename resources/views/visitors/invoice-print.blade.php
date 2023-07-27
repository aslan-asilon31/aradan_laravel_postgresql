<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/frontend/dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> AslanAsilon Shop
          <small class="float-right">Invoice</small>
        </h2>
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
