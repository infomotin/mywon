@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Resume</h4>
                    <a href="{{ route('resume.create') }}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            {{-- $table->string('title');              // Job Title e.g. Lead Developer
                            $table->string('company');            // Company / Institute name
                            $table->string('period')->nullable(); // Display period e.g. 2022 - Present
                            $table->date('start_date')->nullable(); // Optional structured start date
                            $table->date('end_date')->nullable();   // Optional structured end date
                            $table->integer('order')->default(0);   // For custom sorting in UI --}}
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Period</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resumes as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>{{ $item->period }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            <a href="{{ route('resume.edit', $item->id) }}" class="btn btn-primary">Edit</a>
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
