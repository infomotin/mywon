@extends('frontend.master_layout')

@section('content')
   <!-- PORTFOLIO SECTION START -->
   @php 
   $portfolios = App\Models\Portfolio::with('services')->latest()->limit(4)->get();
   // dd($portfolios);
   $services = App\Models\Services::all();
   $resume = App\Models\Resume::all();
   $education = App\Models\Education::all();
   $myskills = App\Models\MySkills::all();

   @endphp
   <section class="portfolio-section" id="works-section">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-header text-center">
                  <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Recent Works</h2>
                  <p class="wow fadeInUp" data-wow-delay=".4s">
                     We put your ideas and thus your wishes in the form of a unique web project that inspires you and
                     you customers.
                  </p>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="portfolio-filter text-center wow fadeInUp" data-wow-delay=".5s">
                  <div class="button-group filter-button-group">
                     <button data-filter="*" class="active">All</button>
                     @foreach ($services as $service)
                        <button data-filter=".{{ Str::replace(' ', '-', $service->service_title) }}">{{ $service->service_title }}</button>
                     @endforeach
                     <div class="active-bg"></div>
                  </div>
               </div>

               <div class="portfolio-box wow fadeInUp" data-wow-delay=".6s">
                  <div class="portfolio-sizer"></div>
                  <div class="gutter-sizer"></div>

                  @foreach ($portfolios as $portfolio)
                  
                  
                  <div class="portfolio-item {{ Str::replace(' ', '-', $portfolio->services->service_title) }}">
                     <div class="image-box">
                        <img src="{{ asset('upload/portfolio/'.$portfolio->image) }}" alt="" />
                     </div>
                     <a href="{{ route('portfolio.details', $portfolio->id) }}" style="color:#fff">
                        <div class="content-box">
                        <h3 class="portfolio-title">{{ $portfolio->title }}</h3>
                        <p>{{ $portfolio->subtitle }}</p>
                        <i class="flaticon-up-right-arrow"></i>
                        {{-- <button data-mfp-src="#portfolio-wrapper" class="portfolio-link modal-popup"></button> --}}
                     </div>
                     </a>
                  </div>
                  @endforeach

                  
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- PORTFOLIO SECTION END -->

   <!-- start: Portfolio Popup -->
   <div id="portfolio-wrapper" class="popup_content_area zoom-anim-dialog mfp-hide">
      <div class="popup_modal_img">
         <img src="{{ asset('/Fontend/assets/img/portfolio/modal-img.jpg') }}" alt="" />
      </div>

      <div class="popup_modal_content">
         <div class="portfolio_info">
            <div class="portfolio_info_text">
               <h2 class="title">DStudio</h2>
               <div class="desc">
                  <p>
                     They are was greater open above shelter lets itself under appear sixth open gathering made upon
                     can't own above midst
                     gathering gathered he one us saying can't divide.
                  </p>
               </div>
               <a href="#" class="btn tj-btn-primary">live preview <i class="fal fa-arrow-right"></i></a>
            </div>
            <div class="portfolio_info_items">
               <div class="info_item">
                  <div class="key">Category</div>
                  <div class="value">Web Design</div>
               </div>
               <div class="info_item">
                  <div class="key">Client</div>
                  <div class="value">Artboard Studio</div>
               </div>
               <div class="info_item">
                  <div class="key">Start Date</div>
                  <div class="value">August 20, 2023</div>
               </div>
               <div class="info_item">
                  <div class="key">Designer</div>
                  <div class="value"><a href="#">ThemeJunction</a></div>
               </div>
            </div>
         </div>

         <div class="portfolio_gallery owl-carousel">
            <div class="gallery_item">
               <img src="{{ asset('/Fontend/assets/img/portfolio-gallery/p-gallery-1.jpg') }}" alt="" />
            </div>
            <div class="gallery_item">
               <img src="{{ asset('/Fontend/assets/img/portfolio-gallery/p-gallery-2.jpg') }}" alt="" />
            </div>
            <div class="gallery_item">
               <img src="{{ asset('/Fontend/assets/img/portfolio-gallery/p-gallery-3.jpg') }}" alt="" />
            </div>
            <div class="gallery_item">
               <img src="{{ asset('/Fontend/assets/img/portfolio-gallery/p-gallery-4.jpg') }}" alt="" />
            </div>
         </div>

         <div class="portfolio_description">
            <h2 class="title">Project Description</h2>
            <div class="desc">
               <p>
                  The goal is there are many variations of passages of Lorem Ipsum available, but the majority have
                  suffered alteration in some
                  form, by injected humour, or randomised words which don't look even slightly believable.
               </p>

               <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in some form, by
                  injected humour, or randomised words which don't look even slightly believable. If you are going to
                  use a passage of Lorem
                  Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
               </p>
            </div>
         </div>

         <div class="portfolio_story_approach">
            <div class="portfolio_story">
               <div class="story_title">
                  <h4 class="title">The story</h4>
               </div>
               <div class="story_content">
                  <p>
                     There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                     alteration in some form, by
                     injected humour, or randomised words which don't look even slightly believable. If you are going
                     to use a passage of Lorem
                     Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. There
                     are many variations of
                     passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                     injected humour, or
                     randomised words which don't look even slightly believable. If you are going to use a passage of
                     Lorem Ipsum, you need to
                     be sure there isn't anything embarrassing hidden in the middle of text.
                  </p>
               </div>
            </div>
            <div class="portfolio_approach">
               <div class="approach_title">
                  <h4 class="title">OUR APPROACH</h4>
               </div>
               <div class="approach_content">
                  <p>
                     There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                     alteration in some form, by
                     injected humour, or randomised words which don't look even slightly believable. If you are going
                     to use a passage of Lorem
                     Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. There
                     are many variations of
                     passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                     injected humour, or
                     randomised words which don't look even slightly believable. If you are going to use a passage of
                     Lorem Ipsum, you need to
                     be sure there isn't anything embarrassing hidden in the middle of text.
                  </p>
               </div>
            </div>
         </div>

         <div class="portfolio_navigation">
            <div class="navigation_item prev-project">
               <a href="#" class="project">
                  <i class="fal fa-arrow-left"></i>
                  <div class="nav_project">
                     <div class="label">Previous Project</div>
                     <h3 class="title">Sebastian</h3>
                  </div>
               </a>
            </div>

            <div class="navigation_item next-project">
               <a href="#" class="project">
                  <div class="nav_project">
                     <div class="label">Next Project</div>
                     <h3 class="title">Qwillo</h3>
                  </div>
                  <i class="fal fa-arrow-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
   <!-- end: Portfolio Popup -->

   <!-- RESUME SECTION START -->
   <section class="resume-section" id="resume-section">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="section-header wow fadeInUp" data-wow-delay=".3s">
                  <h2 class="section-title"><i class="flaticon-recommendation"></i> My Experience</h2>
               </div>

               <div class="resume-widget">
                  
                  @foreach ($resume as $item)
                  <div class="resume-item wow fadeInLeft" data-wow-delay=".7s">
                     <div class="time">{{ Str::substr($item->start_date, 0, 4) }} - {{ ($item->end_date) == null ? 'Present' : Str::substr($item->end_date, 0, 4) }}</div>
                     <h3 class="resume-title">{{ $item->title }}</h3>
                     <div class="institute">{{ $item->company }}</div>
                  </div>
                  @endforeach
               </div>
            </div>

            <div class="col-md-6">
               <div class="section-header wow fadeInUp" data-wow-delay=".4s">
                  <h2 class="section-title"><i class="flaticon-graduation-cap"></i> My Education</h2>
               </div>

               <div class="resume-widget">
                  @foreach ($education as $item)
                  <div class="resume-item wow fadeInRight" data-wow-delay=".5s">
                     <div class="time">{{ Str::substr($item->start_date, 0, 4) }} - {{ ($item->end_date) == null ? 'Present' : Str::substr($item->end_date, 0, 4) }}</div>
                     <h3 class="resume-title">{{ $item->title }}</h3>
                     <div class="institute">{{ $item->institution }}</div>
                  </div>
                  @endforeach                  
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- RESUME SECTION END -->

   <!-- SKILLS SECTION START -->
   <section class="skills-section" id="skills-section">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-header text-center">
                  <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Skills</h2>
                  <p class="wow fadeInUp" data-wow-delay=".4s">
                     We put your ideas and thus your wishes in the form of a unique web project that inspires you and
                     you customers.
                  </p>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="skills-widget d-flex flex-wrap justify-content-center align-items-center">
                  @foreach ($myskills as $item)
                  <div class="skill-item wow fadeInUp" data-wow-delay=".3s">
                     <div class="skill-inner">
                        <div class="icon-box">
                           <img src="{{ asset('uploads/icon/' . $item->icon) }}" alt="" />
                        </div>
                        <div class="number">{{ $item->level }}%</div>
                     </div>
                     <p>{{ $item->name }}</p>
                  </div>
                  @endforeach

               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- SKILLS SECTION END -->
@endsection
