@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service</h4>
                    <a href="{{ route('service.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- $table->string('service_title')->nullable();
            $table->string('service_description')->nullable();
            $table->string('service_image')->nullable(); --}}
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $item)
                                    <tr>
                                        <td><img src="{{ asset('upload/service/' . $item->service_image) }}" alt="" width="100"></td>
                                        <td>{{ $item->service_title }}</td>
                                        <td>{{ $item->service_description }}</td>
                                        <td>
                                            <a href="{{ route('service.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
