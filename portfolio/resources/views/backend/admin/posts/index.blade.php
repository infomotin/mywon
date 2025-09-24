@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Post</h4>
                    <a href="{{ route('post.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                            $table->string('title');
                            $table->string('slug')->unique();
                            $table->text('excerpt')->nullable();
                            $table->longText('content');
                            $table->string('image')->nullable();
                            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Author --}}
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Excerpt</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->excerpt }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td><img src="{{ asset('uploads/posts/' . $item->image) }}" alt="Image" width="50"></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
