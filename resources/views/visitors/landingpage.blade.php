@extends('../layouts/frontend_layout')


@section('content')


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
                      src="{{ asset('assets/img/product-sm-01.png') }}"
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


                    @if(auth()->check())
                      <a type="button" href="/carts" class="btn btn-link mb-0" >
                        Add to Cart
                      </a>
                    @else
                      <!-- Button  modal -->
                      <a type="button"   class="btn btn-link mb-0" id="belanjaBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add to Cart ( blm login)
                      </a>
                    @endif



                  </div>
                </div>
              </div>
                  
              @endforeach
              <div class="col-lg">
                <div
                  class="media new-product d-flex"
                  data-aos="flip-left"
                  data-aos-easing="ease-out-cubic"
                  data-aos-duration="500"
                  data-aos-delay="200"
                >
                  <div
                    class="new-product-img-outer bg-indigo position-relative"
                  >
                    <img
                      class="new-product-img position-absolute"
                      src="{{ asset('assets/img/product-sm-02.png') }}"
                      alt=""
                    />
                  </div>
                  <div class="media-body">
                    <h5 class="new-product-name text-uppercase mb-1">
                      Air Max pegasus 37
                    </h5>
                    <div class="product-rating d-flex">
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star.svg') }}" alt="" />
                    </div>
                    <p class="new-product-price">$189</p>
                    <p class="new-product-text">Women’s Running shoe</p>
                    <a class="btn-link mb-0" href="#" title="Add to Cart"
                      >Add to Cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg">
                <div
                  class="media new-product d-flex"
                  data-aos="flip-left"
                  data-aos-easing="ease-out-cubic"
                  data-aos-duration="500"
                  data-aos-delay="400"
                >
                  <div class="new-product-img-outer bg-green position-relative">
                    <img
                      class="new-product-img position-absolute"
                      src="{{ asset('assets/frontend/img/product-sm-03.png') }}"
                      alt=""
                    />
                  </div>
                  <div class="media-body">
                    <h5 class="new-product-name text-uppercase mb-1">
                      Air Max pegasus 37
                    </h5>
                    <div class="product-rating d-flex">
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star.svg') }}" alt="" />
                    </div>
                    <p class="new-product-price">$189</p>
                    <p class="new-product-text">Women’s Running shoe</p>
                    <a class="btn-link mb-0" href="#" title="Add to Cart"
                      >Add to Cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg">
                <div
                  class="media new-product d-flex"
                  data-aos="flip-left"
                  data-aos-easing="ease-out-cubic"
                  data-aos-duration="500"
                  data-aos-delay="600"
                >
                  <div
                    class="new-product-img-outer bg-dark-blue position-relative"
                  >
                    <img
                      class="new-product-img position-absolute"
                      src="{{ asset('assets/frontend/img/product-sm-04.png') }}"
                      alt=""
                    />
                  </div>
                  <div class="media-body">
                    <h5 class="new-product-name text-uppercase mb-1">
                      Air Max pegasus 37
                    </h5>
                    <div class="product-rating d-flex">
                      <img src="{{ asset('assets/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star-a.svg') }}" alt="" />
                      <img src="{{ asset('assets/frontend/img/star.svg') }}" alt="" />
                    </div>
                    <p class="new-product-price">$189</p>
                    <p class="new-product-text">Women’s Running shoe</p>
                    <a class="btn-link mb-0" href="#" title="Add to Cart"
                      >Add to Cart</a
                    >
                  </div>
                </div>
              </div>
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
        Nikmati kemudahan berbelanja dengan login terlebih dahulu. Silakan login untuk menambahkan produk ini ke keranjang belanja Anda
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