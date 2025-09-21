<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="x-ua-compatible" content="ie=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="description" content="Hey there! I’m Mustapha, I studied computer science for 4 years at AL-QALAM University Katsina, graduated in 2022 atfer completing Information Technology Developer (ITD) program at Legacy Computer Institute kaduna. I design and develop services for customers of all sizes, specialized in creating stylish, modern websites / web applications, web services and online stores" />
    {{-- {{ asset('/Fontend/') }} --}}
   <!-- Site Title -->
   <title>Mustapha - Personal Portfolio </title>

   <!-- Place favicon.ico in the root directory -->
   <link rel="apple-touch-icon" href="{{ asset('Fontend/assets/img/favicon.png') }}" />
   <link rel="shortcut icon" type="image/png" href="{{ asset('Fontend/assets/img/favicon.png') }}" />

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/animate.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/bootstrap.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/font-awesome-pro.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/flaticon_gerold.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/nice-select.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/backToTop.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/owl.carousel.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/swiper.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/odometer-theme-default.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/magnific-popup.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/main.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/light-mode.css') }}" />
   <link rel="stylesheet" href="{{ asset('Fontend/assets/css/responsive.css') }}" />
</head>

<body>
   <!-- Preloader Area Start -->
   @include('frontend.body.components.preloader')
   <!-- Preloader Area End -->

   <!-- start: Back To Top -->
   @include('frontend.body.components.backToTop')
   <!-- end: Back To Top -->

   <!-- HEADER START -->
   @include('frontend.body.components.header')
   <!-- HEADER END -->

   <main class="site-content" id="content">
      <!-- HERO SECTION START -->
      @include('frontend.body.components.hero')
      <!-- HERO SECTION END -->

      <!-- SERVICES SECTION START -->
      @include('frontend.body.components.services')
      <!-- SERVICES SECTION END -->

      <!-- start: Service Popup -->
      @include('frontend.body.components.servicePopup')
      <!-- end: Service Popup -->

      @yield('content')

      <!-- TESTIMONIAL SECTION START -->
      @include('frontend.body.components.testimonial')
      <!-- TESTIMONIAL SECTION END -->

      <!-- BLOG SECTION STAR -->
      @include('frontend.body.components.blog')
      <!-- BLOG SECTION END -->

      <!-- CONTACT SECTION START -->
      @include('frontend.body.components.contact')
      <!-- CONTACT SECTION END -->

      <!-- BEGIN: Contact Form Success Modal Message -->
      @include('frontend.body.components.contact_success')
      <!-- END: Contact Form Success Modal Message -->

      <!-- BEGIN: Contact Form Fail Modal Message -->
      @include('frontend.body.components.contact_fail')
      <!-- END: Contact Form Fail Modal Message End -->
   </main>

   <!-- FOOTER AREA START -->
   @include('frontend.body.components.footer')
   <!-- FOOTER AREA END -->

   <!-- CSS here -->
   <script src="{{ asset('/Fontend/assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/nice-select.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/backToTop.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/smooth-scroll.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/appear.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/wow.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/gsap.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/one-page-nav.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/lightcase.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/swiper.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/imagesloaded-pkgd.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/isotope.pkgd.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/odometer.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/magnific-popup.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/validate.min.js') }}"></script>
   <script src="{{ asset('/Fontend/assets/js/main.js') }}"></script>
</body>
</html>