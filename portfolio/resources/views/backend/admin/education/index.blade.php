@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Education</h4>
                    <a href="{{ route('education.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- $table->string('title'); // Programming course
                            $table->string('institution'); // Harvard University
                            $table->string('period')->nullable(); // 2020 - 2023
                            $table->date('start_date')->nullable();
                            $table->date('end_date')->nullable();
                            $table->integer('order')->default(0); --}}
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Institution</th>
                                    <th>Period</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($education as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->institution }}</td>
                                        <td>{{ $item->period }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
