@extends('../layouts/frontend_layout')


@section('content')
{{-- Live Chat Whatsapp --}}
<a href="https://api.whatsapp.com/send?phone=082123070516" target="_blank">
  <img src="{{ asset('assets/frontend/img/whatsapp_logo.png') }}" alt="" style="width: 100px; position: fixed; z-index: 9999; bottom: 20px; left: 20px;" srcset="">
</a>
{{-- End Live Chat Whatsapp --}}


      <!-- Main Content -->
      <main class="main-content flex-grow-1">
        <div class="container-xxl">
          <!-- Start main Banner -->
          <section class="main-banner position-relative">
            <h2 class="banner-border-text" data-aos="zoom-in-up">
              THE NEW 2023
            </h2>
            <h1 class="banner-title animate__animated animate__flash animate__infinite infinite animate__slow" data-aos="flip-up" data-aos-delay="500">
              AIR JORDAN
            </h1>
            <figure
              class="figure d-block main-banner-figure mb-0"
              data-aos="fade-up"
            >
              <img
                class="figure-img img-fluid d-block mx-auto mb-0 animate__animated animate__bounce animate__infinite infinite animate__slow"
                src="{{ asset('assets/frontend/img/banner-img-lg.png') }}"
                alt=""
              />
            </figure>
            <p class="banner-text" data-aos="fade-up" data-aos-delay="200">
              We know how large objects will act,
            </p>
            <a
              href="src/product.html"
              class="btn btn-primary rounded-0 text-uppercase"
              data-aos="flip-left"
            >
              <span class="text-white">Shop now</span>
            </a>
            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-primary rounded-0 text-uppercase modal-btn"
              data-bs-toggle="modal"
              data-bs-target="#video-modal"
            >
              <img  src="{{ asset('assets/frontend/img/ic-play.svg') }}" alt="">
            </button>
          </section>
          <!-- End main Banner -->

          <!-- Start New Product -->
          <section class="new-product-outer">
            <div
              class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4 gx-4"
            >
              @foreach ($products as $product)
              <div class="col-lg">
                <div
                  class="media new-product d-flex"
                  data-aos="flip-left"
                  data-aos-easing="ease-out-cubic"
                  data-aos-duration="500"
                >
                  <div class="new-product-img-outer bg-pink position-relative">
                    <img
                      class="new-product-img position-absolute"
                      src="{{ asset('/storage/products' . $product->image) }}"
                      alt=""
                    />
                  </div>
                  <div class="media-body">
                    <h5 class="new-product-name text-uppercase mb-1">
                      {{ $product->name }}
                    </h5>
                    <div class="product-rating d-flex">
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star.svg') }}" alt="" />
                    </div>
                    <p class="new-product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    {{-- @foreach ($product->category as $ppc)
                    <p class="new-product-text">{{ $ppc->name }}</p>
                    @endforeach --}}
                    {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" value="{{ $product->id }}" name="id">
                      <input type="hidden" value="{{ $product->name }}" name="name">
                      <input type="hidden" value="{{ $pmp->price }}" name="price">
                      <input type="hidden" value="{{ $pmp->discount }}" name="discount">
                      <input type="hidden" value="{{ $pmp->total_price }}" name="total_price">
                      <input type="hidden" value="{{ $product->image }}"  name="image">
                      <input type="hidden" value="1" name="quantity">
                      <button class="" style="background-color:#483285;color:white;"><i class="fa fa-shopping-cart"></i> Add</button> | 
                      <a class="btn-link mb-0" href="{{ route('products.show', $product->id) }}" title="Add to Cart"
                        > <i class="fa fa-eye"></i> Details</a> | 
                      <a class="wishlist-product">
                          <i class="far fa-heart"></i> Wishlist</a> | 
                      <a class="btn-link mb-0" href="" title="Comments"
                        > <i class="fa fa-comment"></i> Comments (12)</a> 
                    </form> --}}

                    {{-- <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-primary">Detail Product</a> --}}



                    @if(auth()->check())
                      <button class="" style="background-color:#68D391;color:white;"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                      {{-- <button class="" style="background-color:red;color:white;"><i class="fa fa-shopping-cart"></i>delete</button> --}}
                      <a class="btn-link mb-0" href="{{ route('product.show', $product->id) }}" title="Add to Cart"
                        > <i class="fa fa-eye"></i> </a> | 
                      <a class="wishlist-product">
                          <i class="far fa-heart"></i> </a> | 
                      <a class="btn-link mb-0" href="" title="Comments"
                        > <i class="fa fa-comment"></i> (12)</a>
                    @else

                      <button class="btn btn-link mb-2 px-2 py-2 " data-bs-toggle="modal" data-bs-target="#exampleModal" id="belanjaBtn" style="background-color:#68D391;color:white;"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                      {{-- <button class="" style="background-color:red;color:white;"><i class="fa fa-shopping-cart"></i>delete</button> --}}
                      <a class="btn-link mb-0" href="#" id="belanjaBtn" title="Add to Cart"
                        > <i class="fa fa-eye"></i> </a> | 
                      <a class="wishlist-product"  id="belanjaBtn">
                          <i class="far fa-heart"></i> </a> | 
                      <a class="btn-link mb-0" href="#" id="belanjaBtn" title="Comments"
                        > <i class="fa fa-comment"></i>  (12)</a>
                    @endif



                  </div>
                </div>
              </div>
                  
              @endforeach
            </div>
          </section>
          <!-- End New Product -->


      </main>
      <!-- End Main Content -->



 <!-- Modal add to cart -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        Nikmati kemudahan berbelanja di Aradan dengan login terlebih dahulu. Silakan login untuk menambahkan produk ini ke keranjang belanja Anda
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>



{{-- Check visitor apakah sudah login atau belum --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const belanjaBtn = document.getElementById('belanjaBtn');
    belanjaBtn.addEventListener('click', function() {
      if (!{{ auth()->check() }}) {
        // Handle the logic to show the login modal
        // For example, you can use Bootstrap's modal API to display the modal
        // You can refer to Bootstrap documentation for more details
        $('#exampleModal').modal('show');
      } else {
        // Handle the logic for adding to cart
        // For example, you can redirect the user to the cart page or perform an AJAX request
        // based on your application's flow
        window.location.href = "/cart";
      }
    });
  });
</script>

{{-- End Check visitor apakah sudah login atau belum --}}


    
@endsection

@section('css')
@stop 
@section('js')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/648c8c8ecc26a871b022fe6f/1h32ga41a';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
<!--End of Tawk.to Script-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // Event saat tombol Belanja ditekan
    $('#belanjaBtn').click(function(e) {
      e.preventDefault();

      // Cek apakah pengunjung sudah login atau belum
      var isLoggedIn = /* Logika untuk memeriksa apakah pengunjung sudah login atau belum */;

      // Jika belum login, tampilkan modal informasi
      if (!isLoggedIn) {
        $('#infoModal').modal('show');
      } else {
        // Lanjutkan ke halaman belanja
        window.location.href = "/belanja";
      }
    });
  });
</script>

@stop