@extends('tusaned.temp')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    @section('title-page', 'Events infos')
    <link rel="stylesheet" type="text/css" href="{{asset('tusaned/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('tusaned/css/animate.css')}}" />

    <link rel="stylesheet" href="{{asset('tusaned/css/eventsInfo.css')}}" />
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
      <section class="events-info">
        <div class="container-div pb-5">
          <nav aria-label="breadcrumb" class="mt-1 mb-lg-2 wow fadeIn">
            <ol class="breadcrumb mb-0 pr-0">
              <li class="breadcrumb-item"><a href="{{route('events')}}">فعالياتنا</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                الأخبار والأحداث
              </li>
            </ol>
          </nav>
          <div class="container-img">
            <div class="img-container wow fadeInDown" data-wow-delay=".1s">
              <img src="./image/eventsInfo.png" class="img-fluid" alt="" />
            </div>
            <h6
              class="
                mt-2
                d-flex
                align-items-center
                justify-content-end
                wow
                fadeInUp
              "
            >
              <span>
                <img src="./image/calendar.svg" alt="" />
              </span>
              <span class="ml-1">الأحد</span>
              <span>06/12/2021</span>
              <span class="mr-3"
                ><i class="fas fa-share-alt"></i><i class="fas fa-print"></i
              ></span>
            </h6>
            <div class="social-media mb-2 wow fadeInUp">
              <span>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><img src="./image/instagram.svg" alt="" /></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </span>
            </div>
            <div class="container-info text-right">
              <h2 class="wow fadeInUp">احتفال الفائزين بجوائز عام 2020</h2>

              <p class="wow fadeInUp">
                حتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء، بالفائزين
                بجوائز التميز للعام 2020، وذلك في المقر الرئيسي للمبادرة وتوزعت
                الجوائز على مجموعة من المؤسسات الأهلية المتميزة والأفراد
                الرياديين بقيمة 245 ألف دولار أمريكي، وتقدم للجوائز 216 طلبا،
                تمت دراستُها وتقييمُها بشفافيةٍ وحياديةٍ تامةٍ من قبل لجانٍ
                خارجيةٍ تطوعية مكونة من .30 شخصية فلسطينية تضم خبراءً وأكاديميين
                في شتى مجالات الجائزة، موزعين على 6 لجان مستقلة
              </p>
              <p class="wow fadeInUp">
                وفاز بجائزة "التعاون" للقدس 2020 "جائزة المرحوم راغب الكالوتي
                للتنمية المجتمعية في القدس- للقدس نعمل"، ملتقى الشباب التراثي
                المقدسي عن مشروع (سند) لتمكين ودعم ذوي الاحتياجات الخاصة والفئات
                المهمشة من خلال الفنون. وذهبت جائزة "التعاون" للشباب 2020 "جائزة
                منير الكالوتي للشباب الفلسطيني الريادي- لغدٍ أفضل... نبدع"، لخمس
                مبادرات ريادية هي: مبادرة كرسي ذكي لذوي الاعاقة الحركية للريادي
                جمال خالد سالم شختور من بيت لحم، مبادة د. سيلا للريادي نائل طلال
                جمعة القطاطي من غزة، مبادرة سواعد19 للرياديتين لين فواز أبو بكر،
                هبة عوايصة من نابلس، مبادرة ZENO FOOD للمنتجات الخالية من
                الجلوتين للريادية زينب جميل عابد من رفح- غزة، ومبادرة منصة جسور
                للريادي أمين رياض أمين أبو دياك من جنين
              </p>
              <p class="wow fadeInUp">
                فيما حصدت جائزة التعاون " للمعلم/ة المتميز/ة 2020 "جائزة منير
                الكالوتي للمعلم/ة المتميز/ة" ابداع معلم ... نهضة وطن ثلاث معلمات
                هن: وصال باسم عبد الرحمن كراز من مدرسة جمعية أطفالنا للصم غزة عن
                استخدام أسلوب علمي حديث (الكيروجامي والأوروغامي والأينيميشن) في
                جميع المواد الدراسية، مها جمال صلاح الدين أبو منشار من مدرسة
                ياسر عمرو الثانوية للبنات من الخليل عن أسلوبها نظم تعليمية
                مبتكرة باستخدام المنصات والوسائل التعليمية، ومي ابراهيم حسان
                درابيع من مدرسة بنات الفوار الأولى- الخليل عن أسلوبها الذي يعتمد
                على فهم المدلولات العلمية بطريقة الفكاهة والمتعة مبتعدين عن
                الطرق التقليدية الشائعة في التعليم ومحاولة تجسيد تلك المفاهيم
                بصور كاريكاتيرية.
              </p>
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

    <script src="js/script.js"></script>
  </body>
</html>
