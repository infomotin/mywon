@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Skill</h4>
                    <a href="{{ route('myskill.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- 
                            $table->string('name');              // Skill name e.g. Figma, React
                            $table->string('icon')->nullable();  // Path to icon file
                            $table->unsignedTinyInteger('level')->default(0); // Percentage 0-100
                            $table->integer('order')->default(0); // For ordering in frontend 
                            --}}
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Level</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myskills as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ asset('uploads/icon/' . $item->icon) }}" alt="Icon" width="50"></td>
                                        <td>{{ $item->level }}</td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <a href="{{ route('myskill.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
