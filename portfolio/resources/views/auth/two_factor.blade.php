<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Two Factor Verification</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendors/core/core.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.png') }}" />
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-login-side-wrapper">
                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">MJ-<span>NAMADI</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Two Factor Verification</h5>
                                        <p class="mb-3">Please enter the code sent to your email.</p>
                                        
                                        <form class="forms-sample" method="POST" action="{{ route('2fa.store') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="code" class="form-label">Verification Code</label>
                                                <input type="number" class="form-control" id="code" name="code" placeholder="123456" required>
                                                @error('code')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Verify</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- core:js -->
    <script src="{{ asset('Backend/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/template.js') }}"></script>
</body>
</html>
