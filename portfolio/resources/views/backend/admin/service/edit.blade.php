@extends('backend.admin.dashboard')

@section('content')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Service Section Edit Form</h6>
                    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="service_title"
                                        placeholder="Enter title" value="{{ $service->service_title }}">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="service_description" placeholder="Enter description">{{ $service->service_description }}</textarea>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="service_image" id="image">
                                </div>
                                <div class="mb-3">
                                    <img id="preview-image-before-upload"
                                        src="{{ asset('upload/service/' . $service->service_image) }}" alt="preview image"
                                        style="max-height: 50px;">
                                </div>
                            </div><!-- Col -->
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });

        function readProblemStatementURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-problem_statement_image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#problem_statement_image").change(function() {
            readProblemStatementURL(this);
        });
    </script>
@endsection
