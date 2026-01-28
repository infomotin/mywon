@extends('frontend.master_layout')

@section('content')
<section class="contact-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Unsubscribed</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        You have been successfully unsubscribed from our mailing list. You will no longer receive updates from us.
                    </p>
                    <div class="button-group text-center wow fadeInUp" data-wow-delay=".5s">
                        <a href="{{ route('home') }}" class="btn tj-btn-primary">Return to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection