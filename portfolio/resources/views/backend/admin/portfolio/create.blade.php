@extends('backend.admin.dashboard')

@section('content')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    {{-- $table->string('title')->nullable();
                $table->string('subtitle')->nullable();
                $table->string('image')->nullable();
                $table->string('description')->nullable();
                $table->foreignId('services_cat_id')->nullable();
                $table->string('url')->nullable(); --}}
                    <h6 class="card-title">Portfolio Add Form</h6>
                        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Enter description">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="mb-3">
                                        <img id="preview-image-before-upload" src="{{ (isset($portfolio->image)) ? asset('upload/portfolio/' . $portfolio->image) : 'https://www.riobeauty.co.uk/assets/images/product_image_placeholder_large.gif' }}"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Services Cat ID</label>
                                        <input type="text" class="form-control" name="services_cat_id" placeholder="Enter services cat id">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">URL</label>
                                        <input type="text" class="form-control" name="url" placeholder="Enter url">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle" placeholder="Enter subtitle">
                                    </div>
                                </div>
                            </div><!-- Row -->
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                reader.onload = function (e) {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function () {
            readURL(this);
        });
        function readProblemStatementURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview-problem_statement_image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#problem_statement_image").change(function () {
            readProblemStatementURL(this);
        });
    </script>
@endsection
