@php
   $blogs = \App\Models\Blog::with(['category', 'tags'])->latest()->paginate(3);
@endphp
<section class="blog-section" id="blog-section">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="section-header text-center">
                <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Recent Blogs</h2>
                <p class="wow fadeInUp" data-wow-delay=".4s">
                   We put your ideas and thus your wishes in the form of a unique web project that inspires you and
                   you customers.
                </p>
             </div>
          </div>
       </div>
       <div class="row">
         @foreach ($blogs as $blog)
          <div class="col-lg-4 col-md-6">
             <div class="blog-item wow fadeInUp" data-wow-delay=".5s">
                <div class="blog-thumb">
                   <a href="#">
                      <img src="{{ asset('upload/posts/' . $blog->thumbnail) }}" alt="" />
                   </a>
                   <a href="#" class="category">{{ $blog->category->name ?? '-' }}</a>
                </div>

                <div class="blog-content">
                   <div class="blog-meta">
                      <ul class="ul-reset">
                         <li><i class="fa-light fa-calendar-days"></i> {{ $blog->created_at->format('d M, Y') }}</li>
                         <li><i class="fa-light fa-comments"></i> <a href="#">Comment (0)</a></li>
                      </ul>
                   </div>
                   <h3 class="blog-title"><a href="#">{{ $blog->title }}</a></h3>
                </div>
             </div>
          </div>
         @endforeach          
       </div>
    </div>
 </section>