<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="{{ asset('assets/frontend/img/apple-icon.png') }}"
    />
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/img/favicon.png') }}" />
    <title>Aradan</title>

    

    @yield('css')

    <!-- Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>

    <!-- Perfect Scrollbar -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.min.css"
    />

    <!-- Swiper -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/frontend/css/app.css') }}" rel="stylesheet" />
    <!-- <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    /> -->
  </head>

  <body>
    <div class="wrapper d-flex flex-column">
      <!-- Start Header -->
      <header class="header position-sticky">
        <!-- Start Header Top Part -->
        <div class="header-top-part py-2 d-none d-lg-block">
          <div class="container-xxl">
            <div
              class="row align-items-center justify-content-center justify-content-lg-between"
            >
              <div class="col-auto">
                <ul class="sub-navigation">
                  <li><a href="#" title="Guides">Guides</a></li>
                  <li><a href="#" title="Terms of Sale">Terms of Sale</a></li>
                  <li><a href="#" title="Terms of Use">Terms of Use</a></li>
                  <li>
                    <a href="#" title="Privacy & Policy">Privacy & Policy</a>
                  </li>
                </ul>
              </div>
              <div class="col-auto">
                <h6>Complimentary Standard Shipping Indonesia Wide</h6>
              </div>
              <div class="col-auto">
                <ul class="sub-navigation">
                  <li>
                    {{-- <a href="/login" title="Login / Register">Login / Register</a> --}}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Header Top Part -->
        <!-- Start Navbar Part -->
        <nav class="navbar navbar-expand-lg p-0">
          <div class="container-xxl ">
            <a class="navbar-brand" href="/" title="Aradan "
              ><img class="animate__animated animate__heartBeat animate__infinite	infinite animate__slow" src="{{ asset('assets/frontend/img/logo.svg') }}" alt="Aradan "
            /></a>

            <div
              class="offcanvas offcanvas-start"
              tabindex="-1"
              id="offcanvasExample"
              aria-labelledby="offcanvasExampleLabel"
            >
              <div class="offcanvas-header primary-gradient py-2">
                <a
                  class="navbar-brand"
                  href="#"
                  title="Aradan "
                  ><img
                    src="{{ asset('assets/frontend/img/logo.svg') }}"
                    alt="Aradan "
                /></a>
                <button
                  type="button"
                  class="btn-close btn-close-white"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close"
                ></button>
              </div>
              <div class="offcanvas-body p-0 ms-lg-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      aria-current="page"
                      href="src/collection.html"
                      title="Men"
                      >Men</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="src/product.html" title="Women"
                      >Women</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="src/collection.html" title="Kids"
                      >Kids</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" title="Customise">Customise</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" title="Sale">Sale</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" title="Shipping">Shipping</a>
                  </li>
                  <li class="nav-item d-lg-none">
                    <a class="nav-link" href="#" title="Guides">Guides</a>
                  </li>
                  <li class="nav-item d-lg-none">
                    <a class="nav-link" href="#" title="Terms of Sale"
                      >Terms of Sale</a
                    >
                  </li>
                  <li class="nav-item d-lg-none">
                    <a class="nav-link" href="#" title="Terms of Use"
                      >Terms of Use</a
                    >
                  </li>
                  <li class="nav-item d-lg-none">
                    <a class="nav-link" href="#" title="Privacy & Policy"
                      >Privacy & Policy</a
                    >
                  </li>
                  <li class="nav-item d-lg-none">
                    <a class="nav-link" href="#" title="Login / Register"
                      >Login / Register</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-transparent">
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9.58342 1.66675C13.9584 1.66675 17.5001 5.20842 17.5001 9.58342C17.5001 13.9584 13.9584 17.5001 9.58342 17.5001C5.20842 17.5001 1.66675 13.9584 1.66675 9.58342C1.66675 6.50008 3.42508 3.83341 6.00008 2.52508"
                    stroke="white"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M18.3334 18.3334L16.6667 16.6667"
                    stroke="white"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </button>
              <button class="btn btn-transparent">
                <span class="badge rounded-pill bg-danger" style=""> {{ Cart::getTotalQuantity()}} </span>
                <svg
                  width="24"
                  height="20"
                  viewBox="0 0 24 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M7.5 6.39167V5.58334C7.5 3.70834 9.31 1.86667 11.56 1.69167C14.24 1.47501 16.5 3.23334 16.5 5.42501V6.57501"
                    stroke="white"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M3.81007 13.8001L4.04007 15.3584C4.26007 16.9917 4.98007 18.3334 9.00007 18.3334H15.0001C19.0201 18.3334 19.7401 16.9917 19.9501 15.3584L20.7001 10.3584C20.9701 8.32508 20.2701 6.66675 16.0001 6.66675H8.00007C3.73007 6.66675 3.03007 8.32508 3.30007 10.3584"
                    stroke="white"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M15.4955 9.99992H15.5045"
                    stroke="white"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M8.49451 9.99992H8.50349"
                    stroke="white"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </button>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample"
              >
                <span></span>
                <span></span>
                <span></span>
              </button>


            @if(auth()->check())

              {{-- dropdown image  --}}
              <div class="btn-group">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://i.pravatar.cc/85" alt="Profile Image" class="profile-image" style="border-radius: 50%; width:40px; height:40px;">
                </button>
                <ul class="dropdown-menu">
                  <!-- Dropdown menu items -->
                  <li><a class="dropdown-item" href="/home">View Profile</a></li>
                  <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <button type="submit">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
              
              {{-- End dropdown image  --}}
          
            @else
            
              {{-- dropdown image  --}}
              <div class="btn-group">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('user_blank.png') }}" alt="Profile Image" class="profile-image" style="border-radius: 50%; width:40px; height:40px;">
                </button>
                <ul class="dropdown-menu">
                  <!-- Dropdown menu items -->
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Register</a></li>
                </ul>
              </div>
              
              {{-- End dropdown image  --}}
            @endif
              



            </div>
          </div>
        </nav>
        <!-- End Navbar Part -->
      </header>
      <!-- End Header -->


      @yield('content')



      
      <!-- Start Footer -->
      <footer class="footer">
        <!-- Start Footer Top Part -->
        <div class="footer-top-part py-3">
          <div class="container-xxl">
            <ul class="footer-top-part-listing">
              <li
                data-aos="fade-right"
                data-aos-anchor-placement="center-bottom"
              >
                <img src="{{ asset('assets/img/ic-check.svg') }}" alt="" />Duties and Taxes
                Guaranteed
              </li>
              <li
                data-aos="fade-right"
                data-aos-anchor-placement="center-bottom"
                data-aos-delay="200"
              >
                <img src="{{ asset('assets/img/ic-check.svg') }}" alt="" />Free Express
                Shipping
              </li>
              <li
                data-aos="fade-right"
                data-aos-anchor-placement="center-bottom"
                data-aos-delay="400"
              >
                <img src="{{ asset('assets/img/ic-check.svg') }}" alt="" />Customer Love
              </li>
              <li
                data-aos="fade-right"
                data-aos-anchor-placement="center-bottom"
                data-aos-delay="400"
              >
                <img src="{{ asset('assets/img/ic-check.svg') }}" alt="" />Easy Returns
              </li>
            </ul>
          </div>
        </div>
        <!-- End Footer Top Part -->

        <!-- Start Footer Bottom Part -->
        <div class="footer-bottom-part primary-gradient">
          <div class="container-xxl">
            <div class="row justify-content-between">
              <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="footer-logo-outer mb-3 mb-lg-5">
                  <a
                    href="#"
                    class="footer-logo"
                    title="Aradan "
                    data-aos="zoom-in-left"
                  >
                    <img
                      src="{{ asset('assets/img/logo-footer.svg') }}"
                      alt="Aradan "
                    />
                  </a>
                </div>
                <h5 class="mb-3 mb-lg-5" data-aos="fade-up">
                  Complete your style with awesome clothes from us.
                </h5>
                <ul class="social-icons">
                  <li
                    data-aos="zoom-in-up"
                    data-aos-anchor-placement="center-bottom"
                  >
                    <a href="#" title="Facebook"
                      ><img src="{{ asset('assets/img/ic-facebook.svg') }}" alt="Facebook"
                    /></a>
                  </li>
                  <li
                    data-aos="zoom-in-up"
                    data-aos-anchor-placement="center-bottom"
                    data-aos-delay="100"
                  >
                    <a href="#" title="Instagram"
                      ><img src="{{ asset('assets/img/ic-instagram.svg') }}" alt="Instagram"
                    /></a>
                  </li>
                  <li
                    data-aos="zoom-in-up"
                    data-aos-anchor-placement="center-bottom"
                    data-aos-delay="200"
                  >
                    <a href="#" title="Twitter"
                      ><img src="{{ asset('assets/img/ic-twitter.svg') }}" alt="Twitter"
                    /></a>
                  </li>
                  <li
                    data-aos="zoom-in-up"
                    data-aos-anchor-placement="center-bottom"
                    data-aos-delay="300"
                  >
                    <a href="#" title="LinkedIn"
                      ><img src="{{ asset('assets/img/ic-linkedin.svg') }}" alt="LinkedIn"
                    /></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-8 col-xl-6">
                <div class="row justify-content-between">
                  <div
                    class="col-6 col-sm-auto mb-5 mb-md-0"
                    data-aos="fade-left"
                  >
                    <h5 class="mb-3 mb-md-4">Company</h5>
                    <ul class="footer-links">
                      <li>
                        <a href="#" title="About">About</a>
                      </li>
                      <li>
                        <a href="#" title="Contact us">Contact us</a>
                      </li>
                      <li>
                        <a href="#" title="Support">Support</a>
                      </li>
                      <li>
                        <a href="#" title="Careers">Careers</a>
                      </li>
                    </ul>
                  </div>
                  <div
                    class="col-6 col-sm-auto mb-5 mb-md-0"
                    data-aos="fade-left"
                    data-aos-delay="200"
                  >
                    <h5 class="mb-3 mb-md-4">Quick Link</h5>
                    <ul class="footer-links">
                      <li>
                        <a href="#" title="Share Location">Share Location</a>
                      </li>
                      <li>
                        <a href="#" title="Orders Tracking">Orders Tracking</a>
                      </li>
                      <li>
                        <a href="#" title="Size Guide">Size Guide</a>
                      </li>
                      <li>
                        <a href="#" title="FAQs">FAQs</a>
                      </li>
                    </ul>
                  </div>
                  <div
                    class="col-6 col-sm-auto mb-5 mb-md-0"
                    data-aos="fade-left"
                    data-aos-delay="400"
                  >
                    <h5 class="mb-3 mb-md-4">Legal</h5>
                    <ul class="footer-links">
                      <li>
                        <a href="#" title="Terms & conditions"
                          >Terms & conditions</a
                        >
                      </li>
                      <li>
                        <a href="#" title="Privacy Policy">Privacy Policy</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Footer Bottom Part -->
      </footer>
      <!-- End Footer -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="video-modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <div class="modal-video-outer">
              <iframe
                id="video"
                src="https://www.youtube.com/embed/wWY_clozJlU"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CODE HERE -->
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>

    <script>
      // Dropdown image 

      // End ropdown image 
    </script>
  </body>
</html>
