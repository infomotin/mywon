<footer class="tj-footer-area">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center">
             <div class="footer-logo-box">
                <a href="{{ route('home') }}"><img src="{{ !empty($setting->logo) ? url('upload/setting/'.$setting->logo) : asset('/Fontend/assets/img/logo/logo.png') }}" alt="{{ $setting->website_name ?? 'Logo' }}" /></a>
             </div>
             <div class="footer-menu">
                <nav>
                   <ul>
                      <li><a href="#services-section">Services</a></li>
                      <li><a href="#works-section">Works</a></li>
                      <li><a href="#resume-section">Resume</a></li>
                      <li><a href="#skills-section">Skills</a></li>
                      <li><a href="#testimonials-section">Testimonials</a></li>
                      <li><a href="#contact-section">Contact</a></li>
                   </ul>
                </nav>
             </div>
             <div class="copy-text">
                <p>&copy; {{ date('Y') }} All rights reserved by <a href="#" target="_blank">{{ $setting->website_name ?? 'Mjnamadi' }}</a></p>
             </div>
          </div>
       </div>
    </div>
 </footer>