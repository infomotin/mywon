@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Testimonial</h4>
                    <a href="{{ route('testimonial.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- $table->string('logo')->nullable();       // Logo image path
                            $table->string('user_image')->nullable(); // User photo
                            $table->text('quote');                    // Testimonial content
                            $table->string('name');                   // Author name
                            $table->string('designation')->nullable();// Author designation --}}
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>User Image</th>
                                    <th>Quote</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $item)
                                    <tr>
                                        <td><img src="{{ asset('uploads/logo/' . $item->logo) }}" alt="Logo" width="50"></td>
                                        <td><img src="{{ asset('uploads/user_image/' . $item->user_image) }}" alt="User Image" width="50"></td>
                                        <td>{{ $item->quote }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td>
                                            <a href="{{ route('testimonial.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
