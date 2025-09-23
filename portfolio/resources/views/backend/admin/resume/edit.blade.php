@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                {{-- $table->string('title');              // Job Title e.g. Lead Developer
                            $table->string('company');            // Company / Institute name
                            $table->string('period')->nullable(); // Display period e.g. 2022 - Present
                            $table->date('start_date')->nullable(); // Optional structured start date
                            $table->date('end_date')->nullable();   // Optional structured end date
                            $table->integer('order')->default(0);   // For custom sorting in UI --}}
                <div class="card-body">
                    <h6 class="card-title">Resume Section Edit Form</h6>
                    <form action="{{ route('resume.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter title" value="{{ $resume->title }}">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Company</label>
                                    <textarea class="form-control" name="company" placeholder="Enter company">{{ $resume->company }}</textarea>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Period</label>
                                    <input type="text" class="form-control" name="period"
                                        placeholder="Enter period" value="{{ $resume->period }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date"
                                        placeholder="Enter start date" value="{{ $resume->start_date }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="end_date"
                                        placeholder="Enter end date" value="{{ $resume->end_date }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" class="form-control" name="order"
                                        placeholder="Enter order" value="{{ $resume->order }}">
                                </div>
                            </div><!-- Col -->
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    </div>
    
@endsection
