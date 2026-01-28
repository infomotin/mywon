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

                            <h6 class="card-title">Update Live Chat Setting</h6>

                            <form class="forms-sample" method="POST" action="{{ route('update.live.chat.setting') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $setting->id }}">

                                <div class="mb-4">
                                    <h5 class="mb-3">WhatsApp Configuration</h5>
                                    <div class="mb-3">
                                        <label class="form-label">WhatsApp Number (e.g. +8801700000000)</label>
                                        <input type="text" class="form-control" name="whatsapp_number" value="{{ $setting->whatsapp_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="whatsapp_status" name="whatsapp_status" {{ $setting->whatsapp_status ? 'checked' : '' }}>
                                            <label class="form-check-label" for="whatsapp_status">Enable WhatsApp Chat</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="mb-4">
                                    <h5 class="mb-3">Tawk.to / Script Configuration</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Chat Widget Script (e.g. Tawk.to Embed Code)</label>
                                        <textarea class="form-control" name="tawk_to_script" rows="8">{{ $setting->tawk_to_script }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="tawk_to_status" name="tawk_to_status" {{ $setting->tawk_to_status ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tawk_to_status">Enable Script Chat</label>
                                        </div>
                                    </div>
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
