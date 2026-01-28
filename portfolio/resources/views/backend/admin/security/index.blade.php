@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Security Manager</h4>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Security Configuration</h6>
                        <form action="{{ route('security.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input" id="captcha_enabled" name="captcha_enabled" {{ $setting->captcha_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label" for="captcha_enabled">Enable Login Captcha</label>
                                    <p class="text-muted small">Adds a simple math captcha to the login page.</p>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input" id="brute_force_enabled" name="brute_force_enabled" {{ $setting->brute_force_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label" for="brute_force_enabled">Enable Brute Force Protection</label>
                                    <p class="text-muted small">Enforces stricter rate limiting on login attempts.</p>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input" id="login_log_enabled" name="login_log_enabled" {{ $setting->login_log_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label" for="login_log_enabled">Enable Login Logging</label>
                                    <p class="text-muted small">Records user login history (IP, Browser, Time).</p>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input" id="two_factor_enabled" name="two_factor_enabled" {{ $setting->two_factor_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label" for="two_factor_enabled">Enable 3D/Email Verification (2FA)</label>
                                    <p class="text-muted small">Sends a verification code to email upon login.</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Recent Login Activity</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>IP Address</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($loginLogs as $log)
                                    <tr>
                                        <td>{{ $log->user->name ?? 'Unknown' }}</td>
                                        <td>{{ $log->ip_address }}</td>
                                        <td>{{ $log->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No login activity recorded yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
