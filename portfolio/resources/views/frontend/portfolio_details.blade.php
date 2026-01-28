@extends('frontend.details_layout')

@section('content')
<section class="portfolio-details-section" style="padding: 120px 0 100px;">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="portfolio-details-wrapper">
                    <div class="back-btn mb-4">
                        <a href="{{ route('home') }}" style="color: var(--tj-white); text-decoration: none; font-weight: 500;">
                            <i class="fa-light fa-arrow-left me-2"></i> Back to Home
                        </a>
                    </div>

                    <div class="portfolio-image mb-4">
                        <img src="{{ asset('upload/portfolio/'.$portfolio->image) }}" alt="{{ $portfolio->title }}" class="img-fluid rounded w-100">
                    </div>
                    
                    <div class="portfolio-content">
                        <h2 class="title mb-3" style="font-size: 36px; font-weight: 700;">{{ $portfolio->title }}</h2>
                        <h5 class="subtitle mb-4 text-muted">{{ $portfolio->subtitle }}</h5>
                        
                        <div class="description" style="line-height: 1.8; color: var(--tj-body);">
                            @if($portfolio->long_description)
                                {!! nl2br(e($portfolio->long_description)) !!}
                            @else
                                <p>{{ $portfolio->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="portfolio-sidebar p-4 rounded" style="background-color: var(--tj-theme-accent-2); border: 1px solid var(--tj-border);">
                    <h4 class="sidebar-title mb-4" style="border-bottom: 1px solid var(--tj-border); padding-bottom: 15px;">Project Info</h4>
                    
                    <ul class="project-info-list list-unstyled">
                        <li class="mb-4">
                            <strong style="display: block; color: var(--tj-theme-primary); margin-bottom: 5px;">Category</strong>
                            <span style="font-size: 16px;">{{ $portfolio->services->service_title ?? 'N/A' }}</span>
                        </li>
                        
                        <li class="mb-4">
                            <strong style="display: block; color: var(--tj-theme-primary); margin-bottom: 5px;">Client</strong>
                            <span style="font-size: 16px;">{{ $portfolio->client ?? 'N/A' }}</span>
                        </li>
                        
                        <li class="mb-4">
                            <strong style="display: block; color: var(--tj-theme-primary); margin-bottom: 5px;">Project Date</strong>
                            <span style="font-size: 16px;">{{ $portfolio->project_date ?? 'N/A' }}</span>
                        </li>
                        
                        <li class="mb-4">
                            <strong style="display: block; color: var(--tj-theme-primary); margin-bottom: 5px;">Technologies</strong>
                            <span style="font-size: 16px;">{{ $portfolio->technologies ?? 'N/A' }}</span>
                        </li>
                    </ul>

                    <div class="action-btn mt-5">
                        <a href="{{ $portfolio->url }}" target="_blank" class="btn tj-btn-primary w-100 py-3">
                            Live Preview <i class="fa-light fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="action-btn mt-5">
                        <a href="{{ $portfolio->url }}" target="_blank" class="btn tj-btn-primary w-100 py-3">
                            Request For Demo <i class="fa-light fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
