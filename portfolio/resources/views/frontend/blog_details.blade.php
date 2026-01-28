@extends('frontend.details_layout')

@section('content')
<section class="blog-details-section" style="padding: 120px 0 100px;">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="blog-details-wrapper">
                    <div class="back-btn mb-4">
                        <a href="{{ route('home') }}#blog-section" style="color: var(--tj-white); text-decoration: none; font-weight: 500;">
                            <i class="fa-light fa-arrow-left me-2"></i> Back to Blogs
                        </a>
                    </div>

                    <article class="blog-post">
                        <div class="post-thumbnail mb-4">
                            <img src="{{ asset('upload/posts/'.$blog->thumbnail) }}" alt="{{ $blog->title }}" class="img-fluid rounded w-100">
                        </div>
                        
                        <div class="post-content">
                            <div class="post-meta mb-3">
                                <ul class="list-inline" style="padding-left: 0;">
                                    <li class="list-inline-item me-4" style="color: var(--tj-theme-primary);">
                                        <i class="fa-light fa-calendar-days me-2"></i> {{ $blog->created_at->format('d M, Y') }}
                                    </li>
                                    <li class="list-inline-item me-4" style="color: var(--tj-theme-primary);">
                                        <i class="fa-light fa-folder me-2"></i> {{ $blog->category->name ?? 'Uncategorized' }}
                                    </li>
                                    @if($blog->author)
                                    <li class="list-inline-item" style="color: var(--tj-theme-primary);">
                                        <i class="fa-light fa-user me-2"></i> {{ $blog->author->name }}
                                    </li>
                                    @endif
                                </ul>
                            </div>

                            <h2 class="title mb-4" style="font-size: 32px; font-weight: 700;">{{ $blog->title }}</h2>
                            
                            <div class="description" style="line-height: 1.8; color: var(--tj-body);">
                                {!! nl2br(e($blog->content)) !!}
                            </div>

                            <!-- Tags -->
                            @if($blog->tags->count() > 0)
                            <div class="post-tags mt-5 pt-4" style="border-top: 1px solid var(--tj-border);">
                                <h5 class="mb-3">Tags:</h5>
                                <div class="tags">
                                    @foreach($blog->tags as $tag)
                                        <span class="badge bg-dark text-light me-2 mb-2 p-2" style="font-weight: 400; font-size: 14px;">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </article>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget p-4 rounded mb-4" style="background-color: var(--tj-theme-accent-2); border: 1px solid var(--tj-border);">
                        <h4 class="sidebar-title mb-4" style="border-bottom: 1px solid var(--tj-border); padding-bottom: 15px;">Recent Posts</h4>
                        
                        <ul class="recent-posts list-unstyled mb-0">
                            @forelse($recentBlogs as $recent)
                            <li class="mb-4 d-flex align-items-center">
                                <div class="recent-thumb me-3" style="width: 80px; height: 80px; flex-shrink: 0; overflow: hidden; border-radius: 5px;">
                                    <a href="{{ route('blog.details', $recent->id) }}">
                                        <img src="{{ asset('upload/posts/'.$recent->thumbnail) }}" alt="{{ $recent->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="recent-content">
                                    <div class="meta mb-1" style="font-size: 12px; color: var(--tj-theme-primary);">
                                        <i class="fa-light fa-calendar-days me-1"></i> {{ $recent->created_at->format('d M, Y') }}
                                    </div>
                                    <h6 class="title mb-0" style="font-size: 16px; line-height: 1.4;">
                                        <a href="{{ route('blog.details', $recent->id) }}" style="color: var(--tj-white); text-decoration: none;">
                                            {{ Str::limit($recent->title, 40) }}
                                        </a>
                                    </h6>
                                </div>
                            </li>
                            @empty
                            <li class="text-muted">No other recent posts.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Categories Widget (Optional, if you want to fetch categories) -->
                    <!-- <div class="sidebar-widget p-4 rounded" style="background-color: var(--tj-theme-accent-2); border: 1px solid var(--tj-border);">
                        <h4 class="sidebar-title mb-4" style="border-bottom: 1px solid var(--tj-border); padding-bottom: 15px;">Categories</h4>
                        ...
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
