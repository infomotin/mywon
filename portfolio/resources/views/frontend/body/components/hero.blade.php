<section class="hero-section d-flex align-items-center" id="intro">
    <div class="intro_text">
       <svg viewBox="0 0 1320 300">
          <text x="50%" Y="50%" text-anchor="middle">HI</text>
       </svg>
    </div>
    @php
        $hero = \App\Models\Hero::first();
    @endphp
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-6">
             <div class="hero-content-box">
                <span class="hero-sub-title">I am <span class="hero-name">{{ $hero->name }}</span></span>
                <h1 class="hero-title">{{ $hero->title }}</h1>

                <div class="hero-image-box d-md-none text-center">
                   <img src="{{ asset('/Fontend/assets/img/hero/me.png') }}" alt="" />
                </div>

                <p class="lead">
                   {{ $hero->description }}
                </p>
                <div class="button-box d-flex flex-wrap align-items-center">
                   <a href="{{ asset('upload/cv/' . $hero->cv) }}" class="btn tj-btn-secondary">Download CV <i class="flaticon-download"></i></a>
                   <ul class="ul-reset social-icons">
                      <li>
                         <a href="{{ $hero->facebook }}"><i class="fa-brands fa-twitter"></i></a>
                      </li>
                      <li>
                         <a href="{{ $hero->twitter }}"><i class="fa-light fa-basketball"></i></a>
                      </li>
                      <li>
                         <a href="{{ $hero->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a>
                      </li>
                      <li>
                         <a href="{{ $hero->github }}"><i class="fa-brands fa-github"></i></a>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="col-md-6 d-none d-md-block">
             <div class="hero-image-box text-center">
                <img src="{{ asset('upload/hero/' . $hero->image) }}" alt="" />
             </div>
          </div>
       </div>
       <div class="funfact-area">
          <div class="row">
             <div class="col-6 col-lg-3">
                <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                   <div class="number"><span class="odometer" data-count="{{ $hero->YOE }}">0</span></div>
                   <div class="text">Years of <br />Experience</div>
                </div>
             </div>
             <div class="col-6 col-lg-3">
                <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                   <div class="number"><span class="odometer" data-count="{{ 40 }}">0</span>+</div>
                   <div class="text">Project <br />Completed</div>
                </div>
             </div>
             <div class="col-6 col-lg-3">
                <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                   <div class="number"><span class="odometer" data-count="150">0</span>K</div>
                   <div class="text">Happy <br />Clients</div>
                </div>
             </div>
             <div class="col-6 col-lg-3">
                <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                   <div class="number"><span class="odometer" data-count="{{ $hero->YOE }}">0</span></div>
                   <div class="text">Years of <br />Experience</div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>