<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="x-ua-compatible" content="ie=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="description" content="{{ $setting->meta_description ?? '' }}" />
   <meta name="keywords" content="{{ $setting->meta_keywords ?? '' }}" />
    {{-- {{ asset('/Fontend/') }} --}}
   <!-- Site Title -->
   <title>{{ $setting->meta_title ?? 'Mustapha - Personal Portfolio' }}</title>

   <!-- Place favicon.ico in the root directory -->
   <link rel="apple-touch-icon" href="{{ !empty($setting->favicon) ? url('upload/setting/'.$setting->favicon) : asset('Fontend/assets/img/favicon.png') }}" />
   <link rel="shortcut icon" type="image/png" href="{{ !empty($setting->favicon) ? url('upload/setting/'.$setting->favicon) : asset('Fontend/assets/img/favicon.png') }}" />

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
      @yield('content')
   </main>

   <!-- FOOTER AREA START -->
   @include('frontend.body.components.footer')
   <!-- FOOTER AREA END -->

   <!-- Live Chat Integration -->
   @if($liveChatSetting && $liveChatSetting->whatsapp_status && $liveChatSetting->whatsapp_number)
   <div class="whatsapp-chat" style="position: fixed; bottom: 30px; right: 30px; z-index: 9999;">
       <a href="https://wa.me/{{ $liveChatSetting->whatsapp_number }}" target="_blank">
           <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Chat" style="width: 50px; height: 50px;">
       </a>
   </div>
   @endif

   @if($liveChatSetting && $liveChatSetting->tawk_to_status && $liveChatSetting->tawk_to_script)
       {!! $liveChatSetting->tawk_to_script !!}
   @endif
   <!-- End Live Chat Integration -->

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

   <!-- Native Chat Widget -->
   @if($liveChatSetting && $liveChatSetting->native_chat_status)
       @include('frontend.body.components.chat_widget')
   @endif
</body>
</html>
