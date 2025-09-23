@extends('backend.admin.dashboard')

@section('content')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <section class="section">
            <div class="card">
                {{-- $table->string('title'); // Programming course
                $table->string('institution'); // Harvard University
                $table->string('period')->nullable(); // 2020 - 2023
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->integer('order')->default(0); --}}
                <div class="card-body">
                    <h6 class="card-title">Resume Add Form</h6>
                        <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Institution</label>
                                        <input type="text" class="form-control" name="institution" placeholder="Enter institution">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Order</label>
                                        <input type="number" class="form-control" name="order" placeholder="Enter order">
                                    </div>
                                </div>

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Period</label>
                                        <input type="text" class="form-control" name="period" placeholder="Enter period">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" placeholder="Enter start date">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">End Date</label>
                                        <input type="date" class="form-control" name="end_date" placeholder="Enter end date">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        
                </div>
            </div>
            
        </section>
    </div>
    
@endsection
