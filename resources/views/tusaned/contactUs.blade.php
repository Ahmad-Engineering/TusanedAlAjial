@extends('tusaned.temp')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    @section('title-page', 'Contact us')
    <link rel="stylesheet" type="text/css" href="{{asset('tusaned/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.theme.default.css')}}" />

    <link rel="stylesheet" href="{{asset('tusaned/css/contactUs.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/style.css')}}" />

    <link rel="stylesheet" href="{{asset('tusaned/css/mediaQ.css')}}" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('tusaned/toastr/toastr.min.css')}}">
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

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('events')}}">
                      <span>
                        <img src="./image/news icon.svg" alt="" />
                      </span>
                      <span>فعالياتنا</span>
                    </a>
                  </li>

                  <li class="nav-item active">
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
      <section class="contact-us">
        <div class="container-div pb-5 text-right">
          <div class="row pt-2 pt-md-5">
            <div class="col-md-5 contact-info order-1 order-md-0">
              <div class="header mt-2 pt-2">
                <h3>
                  <span> تواصل معنا </span>
                </h3>
              </div>
              <div class="contact-num mt-5">
                <div
                  class="
                    d-flex
                    flex-column flex-sm-row flex-md-column flex-xl-row
                    justify-content-sm-between
                    align-items-sm-center
                    justify-content-lg-start
                    align-items-lg-start align-items-md-start
                    justify-content-xl-between
                    align-items-xl-center
                  "
                >
                  <div
                    class="
                      d-flex
                      num
                      num1
                      align-items-center
                      mb-3 mb-md-3 mb-sm-0 mb-xl-0
                    "
                  >
                    <span class="ml-1 ml-md-2 ml-lg-3">
                      <img
                        src="./image/phone-call.svg"
                        class="img-fluid"
                        alt=""
                      />
                    </span>
                    <span> 00970567077653 </span>
                  </div>

                  <div
                    class="d-flex num num2 align-items-center pl-sm-4 pl-md-0"
                  >
                    <span class="ml-1 ml-md-2 ml-lg-3">
                      <img src="./image//email.svg" class="img-fluid" alt="" />
                    </span>
                    <span> tusaned.alajial@gmail.com </span>
                  </div>
                </div>
                <div class="d-flex num align-items-center mt-3">
                  <span class="ml-1 ml-md-2 ml-lg-3">
                    <img
                      src="./image/placeholder.svg"
                      class="img-fluid"
                      alt=""
                    />
                  </span>
                  <span> غزة – عمارة المعتز 1 – الدور الأرضي </span>
                </div>
              </div>
              <div class="contact-form mt-2">
                <form id="contact-form">
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 mt-2">
                      <label>الاسم كاملا : </label>
                      <input
                        class="form-control form-control-lg"
                        name="full-name"
                        required=""
                        type="text"
                        placeholder="مثال: محمد أحمد محمود عبدالله"
                        id="full_name"
                      />
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 mt-2">
                      <label>رقم الهاتف : </label>
                      <input
                        class="form-control form-control-lg"
                        name="phone"
                        required=""
                        type="text"
                        placeholder="مثال: 00972591234567"
                        id="phone"
                      />
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 mt-2">
                      <label> البريد الإلكتروني : </label>
                      <input
                        class="form-control form-control-lg"
                        name="email"
                        required=""
                        type="email"
                        placeholder="مثال: example123@gmail.com"
                        id="email"
                      />
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 mt-2">
                      <label> الرسالة : </label>
                      <textarea
                        name="text-mes"
                        id="msg"
                        cols="30"
                        rows="5"
                        class="form-control form-control-lg"
                        required=""
                        placeholder="مثال: ...اكتب نص رسالتك هنا"
                      ></textarea>
                    </div>
                  </div>
                  <div class="submit-btn">
                    <input type="button" onclick="contact()" value="ارسال" />
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-5 contact-img mr-auto order-0 order-md-1 pb-3">
              <img src="./image/contactUs.png" class="img-fluid" alt="" />
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
    <script src="js/owl.carousel.js"></script>
    {{-- AXIOS LIBRARY --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Toastr -->
    <script src="{{asset('tusaned/toastr/toastr.min.js')}}"></script>
    <script src="js/script.js"></script>
    <script>
        function contact () {
        // alert('Sure');
            axios.post('/tusaned/contact-us-sending', {
                full_name: document.getElementById('full_name').value,
                phone: document.getElementById('phone').value,
                email: document.getElementById('email').value,
                msg: document.getElementById('msg').value,
            })
                .then(function (response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById('contact-form').reset();
                })
                .catch(function (error) {
                // handle error
                console.log(error);
                toastr.error(error.response.data.message)
                })
                .then(function () {
                // always executed
                });
            }
    </script>
  </body>
</html>
