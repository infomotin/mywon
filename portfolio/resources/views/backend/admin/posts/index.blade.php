@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blog List</h4>
                    <a href="{{ route('blog.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if ($item->thumbnail)
                                                <img src="{{ asset('upload/posts/' . $item->thumbnail) }}" alt="Thumbnail" width="80">
                                            @endif
                                        </td>
                                        <td>{{ $item->category->name ?? '-' }}</td>
                                        <td>
                                            @foreach ($item->tags as $tag)
                                                <span class="badge bg-info">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $item->user->name ?? 'Admin' }}</td>
                                        <td>
                                            <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('blog.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
