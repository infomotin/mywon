@extends('backend.admin.dashboard')

@section('content')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <section class="section">
            <div class="card">
                {{-- 
                            $categories = Category::all();
                            $tags = Tag::all();
                            return view('backend.admin.posts.create', compact('categories', 'tags'));
                            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                            $table->string('title');
                            $table->string('slug')->unique();
                            $table->text('excerpt')->nullable();
                            $table->longText('content');
                            $table->string('image')->nullable();
                            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
                // Author --}}
                <div class="card-body">
                    <h6 class="card-title">Post Add Form</h6>
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <select name="tags[]" class="form-control" multiple>
                                            <option value="" selected>Select Tags</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" placeholder="Enter image" onchange="previewImage(event)">
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset('uploads/posts') }}" alt="Icon" width="100" id="preview">
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
