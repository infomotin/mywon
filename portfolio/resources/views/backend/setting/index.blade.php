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

                            <h6 class="card-title">Update Website Setting</h6>

                            <form class="forms-sample" method="POST" action="{{ route('setting.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">

                                <div class="mb-3">
                                    <label class="form-label">Website Name</label>
                                    <input type="text" class="form-control" name="website_name" value="{{ $setting->website_name ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{ $setting->meta_title ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <textarea class="form-control" name="meta_keywords" rows="3">{{ $setting->meta_keywords ?? '' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                </div>
                                <div class="mb-3">
                                    <img id="showImage" class="wd-100 rounded-circle" src="{{ (!empty($setting->logo)) ? url('upload/setting/'.$setting->logo) : url('upload/no_image.jpg') }}" alt="profile">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Favicon</label>
                                    <input type="file" class="form-control" name="favicon" id="favicon">
                                </div>
                                <div class="mb-3">
                                    <img id="showFavicon" class="wd-50" src="{{ (!empty($setting->favicon)) ? url('upload/setting/'.$setting->favicon) : url('upload/no_image.jpg') }}" alt="profile">
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#logo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        $('#favicon').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showFavicon').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection