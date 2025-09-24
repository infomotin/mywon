@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
               {{-- $table->string('logo')->nullable();       // Logo image path
                            $table->string('user_image')->nullable(); // User photo
                            $table->text('quote');                    // Testimonial content
                            $table->string('name');                   // Author name
                            $table->string('designation')->nullable();// Author designation --}}
                <div class="card-body">
                    <h6 class="card-title">Testimonial Edit Form</h6>
                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="logo" placeholder="Enter logo" onchange="previewImage(event)">
                                    <img src="{{ asset('upload/logo/' . $testimonial->logo) }}" alt="Logo" width="100" id="preview">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">User Image</label>
                                    <input type="file" class="form-control" name="user_image" placeholder="Enter user image" onchange="previewImageSecond(event)">
                                    <img src="{{ asset('upload/user_image/' . $testimonial->user_image) }}" alt="User Image" width="100" id="previewSecond">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Quote</label>
                                    <input type="text" class="form-control" name="quote" placeholder="Enter quote" value="{{ $testimonial->quote }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $testimonial->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" placeholder="Enter designation" value="{{ $testimonial->designation }}">
                                </div>
                            </div>
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
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        function previewImageSecond(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewSecond');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
