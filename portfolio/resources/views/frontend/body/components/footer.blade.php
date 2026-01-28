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
             
             <!-- Subscription Form -->
             <div class="footer-subscribe">
                <h5 class="footer-subscribe-title">Subscribe to my Newsletter</h5>
                <form id="subscribeForm" class="subscribe-form position-relative">
                   @csrf
                   <div class="input-group">
                      <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                      <button type="submit" class="btn tj-btn-primary">Subscribe</button>
                   </div>
                   <div id="subscribe-message" class="mt-2 text-start"></div>
                </form>
             </div>

             <div class="copy-text">
                <p>&copy; {{ date('Y') }} All rights reserved by <a href="#" target="_blank">{{ $setting->website_name ?? 'Mjnamadi' }}</a></p>
             </div>
          </div>
       </div>
    </div>
 </footer>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
    $(document).ready(function() {
        $('#subscribeForm').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var messageDiv = $('#subscribe-message');
            var submitBtn = form.find('button[type="submit"]');
            
            submitBtn.prop('disabled', true).text('Subscribing...');
            messageDiv.html('');

            $.ajax({
                url: "{{ route('subscribe') }}",
                type: "POST",
                data: form.serialize(),
                success: function(response) {
                    messageDiv.html('<span class="text-success">' + response.message + '</span>');
                    form[0].reset();
                    submitBtn.prop('disabled', false).text('Subscribe');
                },
                error: function(xhr) {
                    var errorMsg = 'Something went wrong. Please try again.';
                    if(xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    messageDiv.html('<span class="text-danger">' + errorMsg + '</span>');
                    submitBtn.prop('disabled', false).text('Subscribe');
                }
            });
        });
    });
 </script>