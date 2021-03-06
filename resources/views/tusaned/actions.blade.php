@extends('tusaned.temp')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    @section('title-page', 'Tusaned Actions')
    <link rel="stylesheet" type="text/css" href="{{asset('tusaned/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/animate.css')}}" />

    <link rel="stylesheet" href="{{asset('tusaned/css/actions.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/mediaQ.css')}}" />
  </head>

  <body>
    <div id="loading-wrapper">
      <div id="loading-text">LOADING</div>
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
            <img src="./image/logo.png" alt="" class="img-fluid" />
            <span class="d-flex justify-context-center">
              <a class="navbar-brand mr-1" href="{{route('home')}}">شباب تساند الأجيال</a>
            </span>
          </div>
          <div class="modal-container">
            <div class="nav-menu">
              <div class="d-flex align-items-center mt-5 pt-2 mt-md-0">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                      <span>
                        <img src="./image/home.svg" alt="" />
                      </span>
                      <span>الرئيسية</span>

                      <span class="sr-only"></span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">
                      <span> <img src="./image/textus.svg" /> </span>
                      <span>من نحن</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('idea.bank')}}">
                      <span> <img src="./image/Group 698.svg" /> </span>
                      <span> بنك الأفكار </span>
                    </a>
                  </li>

                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('actions')}}">
                      <span> <img src="./image/star.svg" alt="" /> </span>
                      <span> مبادراتنا </span></a
                    >
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('events')}}">
                      <span>
                        <img src="./image/news icon.svg" alt="" />
                      </span>
                      <span>فعالياتنا</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="contactUs.html">
                      <span>
                        <img src="./image/user.svg" alt="" />
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
            <img src="./image/menu.svg" alt="" id="menu-icon" />
          </div>
        </nav>
      </div>
    </header>
    <main>
      <section class="actions pb-2">
        <div class="container-div actions text-right px-3">
          <div class="row py-2 py-md-5 px-2">
            <div class="col-sm-7 col-lg-6 actins-info order-1 order-sm-0 mt-4">
              <h3 class="wow fadeInDown" data-wow-delay=".3s">
                <span>مبادراتنا</span>
              </h3>
              <div class="info-div mt-4 mt-lg-5">
                <h2 class="mb-4 wow fadeInDown" data-wow-delay=".4s">
                  عام 2020 عنوان للتميز والإجتهاد
                </h2>
                <p class="wow fadeInDown" data-wow-delay=".5s">
                  تميز فريق مبادرات شباب تساند الأجيال بالنشاط المميز لعام 2020
                  حيث نفذ العديد من المبادرات الميدانية والأنشطة التطوعية وإلى
                  جانب الزيارات الرسمية للمؤسسات الخيرية والحكومية لبحث سبل
                  التعاون المختلفة لتعزيز تقدم الفريق في شتى المجالات ولتحقيق
                  الأهداف المرسومة للفريق
                </p>
              </div>
              <div
                class="creative-boxes row mt-3 mt-lg-5 pt-4 wow fadeIn"
                data-wow-delay=".6s"
              >
                <div class="col-6 col-sm-3">
                  <div class="card-creative">
                    <span class="img-creative">
                      <img
                        src="./image/iconActions.svg"
                        alt=""
                        class="img-fluid"
                      />
                    </span>
                    <div class="creative-name text-center">
                      <span>+60</span>
                      مبادرة تم تنفيذها
                    </div>
                  </div>
                </div>
                <div class="col-6 col-sm-3">
                  <div class="card-creative">
                    <span class="img-creative">
                      <img
                        src="./image/iconActions2.svg"
                        alt=""
                        class="img-fluid"
                      />
                    </span>
                    <div class="creative-name text-center">
                      <span>+15</span>
                      عضوية تم تسجيلها
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-5 mt-sm-0 col-sm-3">
                  <div class="card-creative">
                    <span class="img-creative">
                      <img
                        src="./image/iconActions3.svg"
                        alt=""
                        class="img-fluid"
                      />
                    </span>
                    <div class="creative-name text-center">
                      <span>7</span>
                      لقاءات رسـميـــــة
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-5 mt-sm-0 col-sm-3">
                  <div class="card-creative">
                    <span class="img-creative">
                      <img
                        src="./image/iconActions4.svg"
                        alt=""
                        class="img-fluid"
                      />
                    </span>
                    <div class="creative-name text-center">
                      <span>20</span>
                      نشاط تطـوعـــي
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="
                col-sm-4 col-md-3
                mr-auto
                my-auto
                ml-md-5
                px-2 px-sm-0
                pl-lg-4
                archives
                order-0 order-sm-1
                wow
                fadeInLeft
              "
            >
              <div class="header-archives-div pr-1">
                <h2>2020</h2>
              </div>
              <div class="slider owl-carousel owl-theme">
                <div class="archives-div item">
                  <div
                    class="
                      boxes-month
                      d-flex
                      justify-content-between
                      align-items-center
                    "
                  >
                    <div class="box d-flex flex-column justify-content-between">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                    <div class="box d-flex flex-column">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                    <div class="box d-flex flex-column">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                  </div>
                </div>
                <div class="archives-div item">
                  <div
                    class="
                      boxes-month
                      d-flex
                      justify-content-between
                      align-items-center
                    "
                  >
                    <div class="box d-flex flex-column justify-content-between">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                    <div class="box d-flex flex-column">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                    <div class="box d-flex flex-column">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                  </div>
                </div>
                <div class="archives-div item">
                  <div
                    class="
                      boxes-month
                      d-flex
                      justify-content-between
                      align-items-center
                    "
                  >
                    <div class="box d-flex flex-column justify-content-between">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                    <div class="box d-flex flex-column">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                    <div class="box d-flex flex-column">
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                      <div class="month">Mar</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

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
          <img src="./image/logo.png" alt="" />
          شباب تساند الأجيال
        </div>
        <div class="footer-sponsor">
          <img src="./image/sponsor1.png" alt="" />
          <img src="./image/sponsor2.png" alt="" />
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

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        rtl: true,
        dots: false,
        navText: [
          "<i class='fas fa-arrow-right'></i>",
          "<i class='fas fa-arrow-left'></i>",
        ],
        responsive: {
          0: {
            items: 1,
          },
        },
      });
    </script>
  </body>
</html>
