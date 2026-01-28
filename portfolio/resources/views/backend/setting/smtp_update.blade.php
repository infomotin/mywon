@extends('backend.admin.index')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Smtp Setting</h6>

                            <form class="forms-sample" method="POST" action="{{ route('update.smtp.setting') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $setting->id }}">

                                <div class="mb-3">
                                    <label class="form-label">Mailer</label>
                                    <input type="text" class="form-control" name="mailer" value="{{ $setting->mailer }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Host</label>
                                    <input type="text" class="form-control" name="host" value="{{ $setting->host }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Port</label>
                                    <input type="text" class="form-control" name="port" value="{{ $setting->port }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ $setting->username }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" value="{{ $setting->password }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Encryption</label>
                                    <input type="text" class="form-control" name="encryption" value="{{ $setting->encryption }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">From Address</label>
                                    <input type="text" class="form-control" name="from_address" value="{{ $setting->from_address }}">
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
