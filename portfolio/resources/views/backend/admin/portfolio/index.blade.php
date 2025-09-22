@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Portfolio</h4>
                    <a href="{{ route('portfolio.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- $table->string('title')->nullable();
                            $table->string('subtitle')->nullable();
                            $table->string('image')->nullable();
                            $table->string('description')->nullable();
                            $table->foreignId('services_cat_id')->nullable();
                            $table->string('url')->nullable(); --}}
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Description</th>
                                    <th>Services Cat ID</th>
                                    <th>URL</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $item)
                                    <tr>
                                        <td><img src="{{ asset('upload/portfolio/' . $item->image) }}" alt="" width="100"></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->subtitle }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->services_cat_id }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <a href="{{ route('portfolio.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
