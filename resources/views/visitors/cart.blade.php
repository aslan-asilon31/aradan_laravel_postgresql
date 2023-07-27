@extends('layouts/frontend_layout')

@section('content')

    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
              @if ($message = Session::get('success'))
                  <div class="p-4 mb-3 bg-green-400 rounded">
                      <p class="text-green-800">{{ $message }}</p>
                  </div>
              @endif
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('cart_icon.png') }}" alt="" srcset="">
                    <h4 class="text-3xl font-bold">Cart Page</h4>
                </div>
                <a href="/"> << Order more</a>
              
              <div class="flex-1">

                    <div class="divTable div-hover">
                            
                            <div class="rowTable bg-primary text-white pb-2">
                                <div class="divTableCol">Product</div>
                                <div class="divTableCol">Authorized</div>
                                <div class="divTableCol">Quantity</div>
                                <div class="divTableCol">Price</div>
                                <div class="divTableCol">Total</div>
                                <div class="divTableCol">Actions</div>
                            </div>
                            @foreach ($cartItems as $item)
                            <div class="rowTable">
                                <div class="divTableCol">
                                    <div class="media">
                                        <a class=" pull-left mr-2 ml-0" href="#"> <img src="{{ $item->image }}" class="w-20 rounded" alt="Thumbnail"> </a>
                                        <div class="media-body">
                                            <h6 class="media-heading"><a href="#"> {{ $item->name }} </a></h5>
                                            <h6 class="media-heading"><a href="#">details product</a></h6>
                                            <span>Status: </span><span class="text-warning"><strong>waiting for payment</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="divTableCol"><strong class="label label-warning">Pending</strong></div>
                                <div class="divTableCol">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="text" name="quantity" value="{{ $item->quantity }}" style="width: 50px;"
                                    class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                    <button class="btn btn-info" style="color:white;">Update</button>
                                    </form>
                                </div>
                                <div class="divTableCol"  ><strong>Rp {{ number_format($item->price, 0, ',', '.') }}</strong></div>
                                <div class="divTableCol" >
                                    <strong>
                                        Rp {{ number_format($itemTotalPrice  = $item->quantity *  $item->price, 0, ',', '.')}}
                                    </strong>
                                </div>
                                <div class="divTableCol">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger"><span class="fa fa-remove"></span> Remove</button>
                                    </form>

                                </div>
                            </div>  

                @endforeach
                            
                            <div class="rowTable">
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"><h5>Total</h5></div>
                                <div class="divTableCol">
                                    <strong> <h6>Rp {{ number_format($totalPrice += $itemTotalPrice, 0, ',', '.')   }}</h6>   </strong>
                                </div>
                            </div>
                            
                            <div class="rowTable">
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"><h5>Shipping</h5></div>
                                <div class="divTableCol" >
                                    <div class="rowTable">
                                        <div class="divTableCol">
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('aradan_logo.png') }}" style="width:40px;height:40px;" alt="" srcset="">
                                                Aradan Free Ongkir (+ Rp.0)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/anteraja.png') }}" style="width:40px;height:40px;" alt="" srcset="">
                                                Anteraja (+ Rp.5000)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/J&T_express.png') }}" style="width:40px;height:40px;" alt="" srcset="">
                                                J&T (+ Rp.5000)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/ninja_express.png') }}" style="width:40px;height:30px;" alt="" srcset="">
                                                Ninja Express (+ Rp.5000)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/pos.png') }}" style="width:40px;height:40px;" alt="" srcset="">
                                                POS (+ Rp.5000)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/sicepat.png') }}" style="width:40px;height:30px;" alt="" srcset="">
                                                Sicepat (+ Rp.5000)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/tiki.png') }}" style="width:40px;height:30px;" alt="" srcset="">
                                                Tiki (+ Rp.5000)
                                            </div>
                                            <div class="">
                                                <input type="radio" name="shipping" id=""><img src="{{ asset('shipping/wahana.png') }}" style="width:40px;height:40px;" alt="" srcset="">
                                                Wahana (+ Rp.5000)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="rowTable">
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"><h5>Discount</h5></div>
                                <div class="divTableCol" >
                                    <strong> <h6> 0 % <span style="color:red;font-size:16px;"> - 0</span> </h6>   </strong>
                                </div>
                            </div>
                            
                            <div class="rowTable">
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"><h5>PPN</h5></div>
                                <div class="divTableCol" >
                                    <strong> <h6> 11 % <span style="color:red;font-size:16px;"> + {{ number_format($Afterpajak = $totalPrice * 0.11, 0, ',', '.')  }}</span> </h6>   </strong>
                                </div>
                            </div>
                            
                            <div class="rowTable">
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"><h5>Grant Total</h5></div>
                                <div class="divTableCol">
                                    <strong> <h6>Rp {{ number_format($grantTotal = $totalPrice + $Afterpajak, 0, ',', '.') }}</h6>   </strong>
                                </div>
                            </div>
                            
                            <div class="rowTable">
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <div class="divTableCol"></div>
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button class="px-2 py-1 text-sm  ="style="background-color:red;color:white;">Clear Carts</button>
                                </form>
                                <div class="divTableCol">
                                    {{-- <form action="{{ route('orders.show', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="px-2 py-1 text-sm  ="style="background-color:green;color:white;">Order</button>
                                    </form> --}}

                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                      <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">Checkout</button>
                                    </form>
                                </div>
                            </div>
 
                    </div>

              </div>


            </div>
        </div>
      </div>

</div>




@endsection


@section('css')
<style>
    .mr-2{
  margin-right: 20px;
}

.divTable{
	display: table;
	width: 100%;
}
.rowTable {
	display: table-row;
}
.divTableHeading {
	display: table-header-group;
}
.divTableCol, .divTableHead {
	border-bottom: 1px solid #eee;
	display: table-cell;
	padding: 3px 10px;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}

</style>
    
@endsection


