@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hero</h4>
                    <a href="{{ route('hero.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>facebook</th>
                                    <th>twitter</th>
                                    <th>instagram</th>
                                    <th>linkedin</th>
                                    <th>YOE</th>
                                    <th>CV</th>
                                    <th>HC</th>
                                    <th>Location</th>
                                    <th>github</th>
                                    <th>problem_statement</th>
                                    <th>problem_statement_image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hero as $item)
                                    <tr>
                                        <td><img src="{{ asset('upload/hero/' . $item->image) }}" alt="" width="100"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->facebook }}</td>
                                        <td>{{ $item->twitter }}</td>
                                        <td>{{ $item->instagram }}</td>
                                        <td>{{ $item->linkedin }}</td>
                                        <td>{{ $item->YOE }}</td>
                                        <td>{{ $item->CV }}</td>
                                        <td>{{ $item->HC }}</td>
                                        <td>{{ $item->Location }}</td>
                                        <td>{{ $item->github }}</td>
                                        <td>{{ $item->problem_statement }}</td>
                                        <td><img src="{{ asset('upload/hero/' . $item->problem_statement_image) }}" alt="" width="100"></td>
                                        <td>
                                            <a href="{{ route('hero.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
