@extends('backend.admin.dashboard')

@section('content')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Hero Section Add Form</h6>
                        <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="mb-3">
                                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/assets/images/product_image_placeholder_large.gif"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" placeholder="Enter facebook link">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" placeholder="Enter twitter link">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" placeholder="Enter instagram link">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" placeholder="Enter linkedin link">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Github</label>
                                        <input type="text" class="form-control" name="github" placeholder="Enter github link">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Year of Experience</label>
                                        <input type="text" class="form-control" name="YOE" placeholder="Enter YOE">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">CV</label>
                                        <input type="file" class="form-control" name="CV" id="CV">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">HC</label>
                                        <input type="file" class="form-control" name="HC" id="HC">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" name="Location" placeholder="Enter location">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Problem Statement</label>
                                        <textarea class="form-control" name="problem_statement" placeholder="Enter problem statement"></textarea>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Problem Statement Image</label>
                                        <input type="file" class="form-control" name="problem_statement_image" id="problem_statement_image">
                                    </div>
                                    <div class="mb-3">
                                        <img id="preview-problem_statement_image-before-upload" src="https://www.riobeauty.co.uk/assets/images/product_image_placeholder_large.gif"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                </div><!-- Col -->
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
