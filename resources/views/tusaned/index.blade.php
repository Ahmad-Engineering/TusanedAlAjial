@extends('tusaned.parent')

@section('title-page', 'Home')


@section('content')
<div class="container item">
    <div class="box-main-home">
      <div class="row">
        <div class="col-12 col-md-6 info-main order-1 order-md-0">
          <h1
            class="
              d-none d-md-flex
              flex-column
              mt-md-4
              wow
              fadeInDown
            "
            data-wow-delay=".3s"
          >
            <span>احتفال الفائزين </span>
            <span class="pr-3 pt-2"> بجوائز عام 2020 </span>
          </h1>
          <p class="wow fadeInDown" data-wow-delay=".4s">
            احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
            بالفائزين بجوائز التميز ، وذلك في المقر الرئيسي للمبادرة,
            الشباب هم الشريحة الأكثر أهمية في أي مجتمع وإذا كانوا
            اليوم يمثلون نصف الحاضر فإنهم في الغد سيكونون كل
            المستقبل... والمجتمع لا يكون قوياً إلا بشبابه، والأوطان لا
            تًبنى إلا بسواعد شبابها، لذلك تأتي هذه الجائزة لدعم الشباب
            في تحقيق .طموحاته ومبادراته الريادية
          </p>
          <div
            class="btn-main text-center text-md-right wow fadeInDown"
            data-wow-delay=".5s"
          >
            <a href="{{route('events.info')}}"> قراءة المزيد </a>
          </div>
        </div>
        <div
          class="
            col-12 col-md-6
            img-main
            mt-2 mt-md-0
            order-0 order-md-1
          "
        >
          <h1 class="d-flex d-md-none flex-column wow fadeInDown">
            <span>احتفال الفائزين </span>
            <span class="pr-1 pr-sm-3 pt-2 pb-sm-1">
              بجوائز عام 2020
            </span>
          </h1>
          <div
            class="
              the-img-main
              text-center
              mt-1 mt-md-4 mt-md-0
              wow
              fadeInDown
            "
          >
            <img src="{{asset('tusaned/image/hands.png')}}" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container item">
    <div class="box-main-home">
      <div class="row">
        <div class="col-12 col-md-6 info-main order-1 order-md-0">
          <h1 class="d-none d-md-flex flex-column mt-md-4">
            <span>احتفال الفائزين </span>
            <span class="pr-3 pt-2"> بجوائز عام 2020 </span>
          </h1>
          <p>
            احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
            بالفائزين بجوائز التميز ، وذلك في المقر الرئيسي للمبادرة,
            الشباب هم الشريحة الأكثر أهمية في أي مجتمع وإذا كانوا
            اليوم يمثلون نصف الحاضر فإنهم في الغد سيكونون كل
            المستقبل... والمجتمع لا يكون قوياً إلا بشبابه، والأوطان لا
            تًبنى إلا بسواعد شبابها، لذلك تأتي هذه الجائزة لدعم الشباب
            في تحقيق .طموحاته ومبادراته الريادية
          </p>
          <div class="btn-main text-center text-md-right">
            <a href="./eventsInfo.html"> قراءة المزيد </a>
          </div>
        </div>
        <div
          class="
            col-12 col-md-6
            img-main
            mt-2 mt-md-0
            order-0 order-md-1
          "
        >
          <h1 class="d-flex d-md-none flex-column">
            <span>احتفال الفائزين </span>
            <span class="pr-1 pr-sm-3 pt-2 pb-sm-1">
              بجوائز عام 2020
            </span>
          </h1>
          <div class="the-img-main text-center mt-1 mt-md-4 mt-md-0">
            <img src="{{asset('tusaned/image/hands.png')}}" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container item">
    <div class="box-main-home">
      <div class="row">
        <div class="col-12 col-md-6 info-main order-1 order-md-0">
          <h1 class="d-none d-md-flex flex-column mt-md-4">
            <span>احتفال الفائزين </span>
            <span class="pr-3 pt-2"> بجوائز عام 2020 </span>
          </h1>
          <p>
            احتفلت مبادرة "شباب تساند الأجيال"، يوم أمس الأربعاء،
            بالفائزين بجوائز التميز ، وذلك في المقر الرئيسي للمبادرة,
            الشباب هم الشريحة الأكثر أهمية في أي مجتمع وإذا كانوا
            اليوم يمثلون نصف الحاضر فإنهم في الغد سيكونون كل
            المستقبل... والمجتمع لا يكون قوياً إلا بشبابه، والأوطان لا
            تًبنى إلا بسواعد شبابها، لذلك تأتي هذه الجائزة لدعم الشباب
            في تحقيق .طموحاته ومبادراته الريادية
          </p>
          <div class="btn-main text-center text-md-right">
            <a href="./eventsInfo.html"> قراءة المزيد </a>
          </div>
        </div>
        <div
          class="
            col-12 col-md-6
            img-main
            mt-2 mt-md-0
            order-0 order-md-1
          "
        >
          <h1 class="d-flex d-md-none flex-column">
            <span>احتفال الفائزين </span>
            <span class="pr-1 pr-sm-3 pt-2 pb-sm-1">
              بجوائز عام 2020
            </span>
          </h1>
          <div class="the-img-main text-center mt-1 mt-md-4 mt-md-0">
            <img src="{{asset('tusaned/image/hands.png')}}" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
