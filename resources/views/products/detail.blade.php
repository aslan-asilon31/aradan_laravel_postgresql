

<h1>Product Details</h1>
<p><strong>Name:</strong> {{ $product->name }}</p>
<p><strong>Price:</strong> {{ $product->price }}</p>
<!-- You can display other product details here -->

<h1>kami juga merekomendasikan produk yang relevan</h1>
@foreach ($productRecommendation as $productRec)
    <p>{{ $productRec->name }} <br>dengan skor : {{ $productRec->rating }}</p> 
     
    <p>
        degan category nya adalah :
        @foreach ($productRec->category()->get() as $prc)
        
        {{ $prc->name }} <br>
            
        @endforeach
    </p>
@endforeach


