<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>@yield('title-page')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('tusaned/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/home.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/mediaQ.css')}}" />
  </head>
  <body>
    <div id="loading-wrapper">
      <div id="loading-text">Loading</div>
      <div id="loading-content"></div>
    </div>
    <header class="position-fixed fixed-top">
      <div class="container-div">
        <nav
          class="
            navbar navbar-expand-lg navbar-light
            d-flex
            justify-content-between
            align-items-center
          "
        >
          <div class="logo d-flex align-items-center">
            <img src="{{asset('tusaned/image/logo.png')}}" alt="" class="img-fluid" />
            <span class="d-flex justify-context-center">
              <a class="navbar-brand mr-1" href="{{route('home')}}">شباب تساند الأجيال</a>
            </span>
          </div>
          <div class="modal-container">
            <div class="nav-menu">
              <div class="d-flex align-items-center mt-5 pt-2 mt-md-0">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">
                      <span>
                        <img src="{{asset('tusaned/image/home.svg')}}" alt="" />
                      </span>
                      <span>الرئيسية</span>

                      <span class="sr-only"></span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">
                      <span> <img src="{{asset('tusaned/image/textus.svg')}}" /> </span>
                      <span>من نحن</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('idea.bank')}}">
                      <span> <img src="{{asset('tusaned/image/Group 698.svg')}}" /> </span>
                      <span> بنك الأفكار </span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('actions')}}">
                      <span> <img src="{{asset('tusaned/image/star.svg')}}" alt="" /> </span>
                      <span> مبادراتنا </span></a
                    >
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('events')}}">
                      <span>
                        <img src="{{asset('tusaned/image/news icon.svg')}}" alt="" />
                      </span>
                      <span>فعالياتنا</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.us')}}">
                      <span>
                        <img src="{{asset('tusaned/image/user.svg')}}" alt="" />
                      </span>
                      <span>تواصل معنا</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="nav-form d-none d-lg-flex">
            <div
              class="
                form-group
                position-relative
                d-flex
                align-items-center
                mb-0
              "
            >
              <span class="position-absolute search-icon">
                <label htmlFor="exampleInputEmail1" class="mb-0">
                  <i class="fa fa-search"></i>
                </label>
              </span>
              <input
                type="email"
                class="form-control lll"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="ابحث"
              />
            </div>
          </div>
          <div
            class="
              burger-button
              d-flex
              alighn-items-between
              flex-column
              d-lg-none
            "
            id="burger-menu-btn"
          >
            <img src="{{asset('tusaned/image/menu.svg')}}" alt="" id="menu-icon" />
          </div>
        </nav>
      </div>
    </header>
    <main>
      <section class="home text-right">
        <div class="main-home wow fadeInDown">
          <div class="owl-carousel home-carousel owl-theme">
              @yield('content')
          </div>
        </div>
      </section>
    </main>
    <!-- <footer class="py-4">
      <div class="container-div">
        <div class="row">
          <div class="footer-logo col-6 col-md-4 text-right">
            <img src="./image/logo.png" alt="" />
            شباب تساند الأجيال
          </div>
          <div
            class="
              footer-sponsor
              col-6 col-md-4
              text-md-center text-left
              d-flex
              align-items-center
              justify-content-end justify-content-md-center
            "
          >
            <img src="./image/sponsor1.png" alt="" />
            <img src="./image/sponsor2.png" alt="" />
          </div>
          <div
            class="
              footer-social
              col-12 col-md-4
              d-flex
              flex-column
              align-items-center
              mt-3 mt-md-0
            "
          >
            <span> تابعنا على شبكاتنا الاجتماعية </span>
            <div class="social-media-footer pt-2">
              <a href="#">
                <span>
                  <i class="fab fa-instagram"></i>
                </span>
              </a>
              <a href="#">
                <span> <i class="fab fa-twitter"></i> </span>
              </a>
              <a href="#">
                <span> <i class="fab fa-youtube"></i> </span>
              </a>
              <a href="#">
                <span> <i class="fab fa-facebook-f"></i> </span>
              </a>
              <a href="#">
                <span> <i class="fab fa-whatsapp"></i> </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer> -->

    <footer class="py-3">
      <div
        class="
          container-div
          d-flex
          flex-column flex-md-row
          justify-content-between
          align-items-center
        "
      >
        <div class="footer-logo">
          <img src="{{asset('tusaned/image/logo.png')}}" alt="" />
          شباب تساند الأجيال
        </div>
        <div class="footer-sponsor">
          <img src="{{asset('tusaned/image/sponsor1.png')}}" alt="" />
          <img src="{{asset('tusaned/image/sponsor2.png')}}" alt="" />
        </div>
        <div
          class="
            footer-social
            d-flex
            flex-column
            align-items-center
            justify-context-center
            mt-3 mt-md-0
          "
        >
          <span> تابعنا على شبكاتنا الاجتماعية </span>
          <div class="social-media-footer mt-2">
            <a href="#">
              <span>
                <i class="fab fa-instagram"></i>
              </span>
            </a>
            <a href="#">
              <span> <i class="fab fa-twitter"></i> </span>
            </a>
            <a href="#">
              <span> <i class="fab fa-youtube"></i> </span>
            </a>
            <a href="#">
              <span> <i class="fab fa-facebook-f"></i> </span>
            </a>
            <a href="#">
              <span> <i class="fab fa-whatsapp"></i> </span>
            </a>
          </div>
        </div>
      </div>
      <div class="copy-rights text-center mt-3">
        ‏2021 جميع الحقوق محفوظة جمعية شباب تساند الأجيال
      </div>
    </footer>

    <script src="{{asset('tusaned/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('tusaned/js/wow.min.js')}}"></script>
    <script>
      new WOW().init();
    </script>
    <script src="{{asset('tusaned/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('tusaned/js/owl.carousel.js')}}"></script>

    <script src="{{asset('tusaned/js/index.js')}}"></script>

    <script src="{{asset('tusaned/js/script.js')}}"></script>
  </body>
</html>
