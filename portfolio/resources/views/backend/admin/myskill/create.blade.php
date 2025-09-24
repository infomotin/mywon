@extends('backend.admin.dashboard')

@section('content')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <section class="section">
            <div class="card">
                {{-- 
                $table->string('name');              // Skill name e.g. Figma, React
                $table->string('icon')->nullable();  // Path to icon file
                $table->unsignedTinyInteger('level')->default(0); // Percentage 0-100
                $table->integer('order')->default(0); // For ordering in frontend 
                --}}
                <div class="card-body">
                    <h6 class="card-title">Resume Add Form</h6>
                        <form action="{{ route('myskill.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="form-label">Icon</label>
                                        <input type="file" class="form-control" name="icon" placeholder="Enter icon" onchange="previewImage(event)">
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset('upload/icon') }}" alt="Icon" width="100" id="preview">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Order</label>
                                        <input type="number" class="form-control" name="order" placeholder="Enter order">
                                    </div>
                                </div>

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <input type="number" class="form-control" name="level" placeholder="Enter level">
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
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    
@endsection
