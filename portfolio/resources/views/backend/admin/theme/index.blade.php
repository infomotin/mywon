@extends('backend.admin.dashboard')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Frontend Theme Customization</h6>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <form action="{{ route('theme.update') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-4">
                            <h5 class="text-primary mb-3">Color Scheme</h5>
                            <div class="col-md-3">
                                <label class="form-label">Primary Color</label>
                                <input type="color" class="form-control form-control-color w-100" name="primary_color" value="{{ $setting->primary_color }}" title="Choose your color">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Secondary Color</label>
                                <input type="color" class="form-control form-control-color w-100" name="secondary_color" value="{{ $setting->secondary_color }}" title="Choose your color">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Background Color</label>
                                <input type="color" class="form-control form-control-color w-100" name="background_color" value="{{ $setting->background_color }}" title="Choose your color">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Text Color</label>
                                <input type="color" class="form-control form-control-color w-100" name="text_color" value="{{ $setting->text_color }}" title="Choose your color">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <h5 class="text-primary mb-3">Theme Mode</h5>
                            <div class="col-md-4">
                                <select class="form-select" name="theme_mode">
                                    <option value="dark" {{ $setting->theme_mode == 'dark' ? 'selected' : '' }}>Dark Mode</option>
                                    <option value="light" {{ $setting->theme_mode == 'light' ? 'selected' : '' }}>Light Mode</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <h5 class="text-primary mb-3">Section Visibility Control</h5>
                            <p class="text-muted mb-3">Toggle switches to show or hide specific sections on the frontend.</p>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_hero" name="show_hero" {{ $setting->show_hero ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_hero">Hero Section</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_services" name="show_services" {{ $setting->show_services ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_services">Services Section</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_portfolio" name="show_portfolio" {{ $setting->show_portfolio ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_portfolio">Portfolio Section</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_resume" name="show_resume" {{ $setting->show_resume ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_resume">Resume/Education</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_skills" name="show_skills" {{ $setting->show_skills ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_skills">Skills Section</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_testimonial" name="show_testimonial" {{ $setting->show_testimonial ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_testimonial">Testimonials</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_blog" name="show_blog" {{ $setting->show_blog ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_blog">Blog Section</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_contact" name="show_contact" {{ $setting->show_contact ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_contact">Contact Section</label>
                                </div>
                            </div>
                             <div class="col-md-3 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_footer" name="show_footer" {{ $setting->show_footer ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_footer">Footer Section</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <h5 class="text-primary mb-3">Advanced Customization</h5>
                            <div class="col-md-12">
                                <label class="form-label">Custom CSS</label>
                                <textarea class="form-control" name="custom_css" rows="6" placeholder="/* Enter custom CSS here */">{{ $setting->custom_css }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
