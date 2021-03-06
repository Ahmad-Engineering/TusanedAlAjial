@extends('tusaned.temp')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    @section('title-page', 'Tusaned events')
    <link rel="stylesheet" type="text/css" href="{{asset('tusaned/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/animate.css')}}" />

    <link rel="stylesheet" href="{{asset('tusaned/css/events.css')}}" />
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

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('actions')}}">
                      <span> <img src="./image/star.svg" alt="" /> </span>
                      <span> مبادراتنا </span></a
                    >
                  </li>

                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('events')}}">
                      <span>
                        <img src="./image/news icon.svg" alt="" />
                      </span>
                      <span>فعالياتنا</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.us')}}">
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
      <section class="events pb-5">
        <div class="container-div pb-5">
          <div
            class="header-events pt-4 pt-md-5 mt-2 text-right wow fadeInDown"
          >
            <h3>
              <span>فعالياتنا</span>
            </h3>
          </div>
          <div class="body-events text-right mt-4">
            <span class="header-body wow fadeInDown" data-wow-delay=".2s">
              الأخبار والأحداث
            </span>
            <div
              class="events-carousel1 owl-carousel owl-theme wow fadeIn"
              data-wow-delay=".3s"
            >
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".3s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/Repeat Grid 1.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".4s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/group-hikers-sitting-top-mountain-peak-out-stretching-their-hands.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".5s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/active-handsome-photographer-man-taking-photo-camer-while-walking-traveling.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".6s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/rear-side-audiences-sitting-listening-speackers-stage.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/active-handsome-photographer-man-taking-photo-camer-while-walking-traveling.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <span class="header-body header-body2 mt-3">
              الفعاليات والأنشطة
            </span>

            <div class="events-carousel2 owl-carousel owl-theme wow fadeIn">
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".3s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/children-s-silhouettes-showing-muscles-sunset.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".4s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/top-view-stack-hands-against-green-grass.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".5s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/father-son-playing-football.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 wow fadeInDown" data-wow-delay=".6s">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/young-friends-clapping-hands.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <div class="card-body">
                  <div class="card-img">
                    <img
                      src="./image/active-handsome-photographer-man-taking-photo-camer-while-walking-traveling.png"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                  <div class="card-info">
                    <h6>احتفال الفائزين بجوائز عام 2020</h6>
                    <p>
                      احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
                      بالفائزين بجوائز التميز للعام 2020، وذلك في المقر الرئيسي
                      للمبادرة
                    </p>
                    <div class="read-more text-center">
                      <a href="./eventsInfo.html">
                        اقرا المزيد
                        <span class="my-auto">
                          <i class="fas fa-angle-double-left"></i>
                        </span>
                      </a>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/events.js"></script>

    <script src="js/script.js"></script>
  </body>
</html>
