@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Queue Management Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <form action="{{ route('queue.start') }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="play"></i>
                        Start Worker
                    </button>
                </form>
                <form action="{{ route('queue.stop') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="stop-circle"></i>
                        Stop Worker
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Worker Status</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-2 mt-3">
                                            @if($workerStatus)
                                                <span class="badge bg-success">Running</span>
                                            @else
                                                <span class="badge bg-secondary">Stopped / Unknown</span>
                                            @endif
                                        </h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-muted">
                                                <span>Queue: default</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Pending Jobs</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-2 mt-3">{{ $jobs->count() }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-muted">
                                                Jobs waiting to be processed
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Failed Jobs</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-2 mt-3 text-danger">{{ $failedJobs->count() }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-muted">
                                                Jobs that failed execution
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-3">
                            <h6 class="card-title mb-0">Failed Jobs List</h6>
                            @if($failedJobs->count() > 0)
                                <form action="{{ route('queue.delete.all.failed') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ALL failed jobs?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete All Failed Jobs</button>
                                </form>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">ID</th>
                                        <th class="pt-0">Queue</th>
                                        <th class="pt-0">Payload (Class)</th>
                                        <th class="pt-0">Exception</th>
                                        <th class="pt-0">Failed At</th>
                                        <th class="pt-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($failedJobs as $job)
                                        @php
                                            $payload = json_decode($job->payload);
                                            $displayName = $payload->displayName ?? 'Unknown';
                                        @endphp
                                        <tr>
                                            <td>{{ $job->id }}</td>
                                            <td>{{ $job->queue }}</td>
                                            <td>{{ $displayName }}</td>
                                            <td title="{{ $job->exception }}">{{ Str::limit($job->exception, 50) }}</td>
                                            <td>{{ $job->failed_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('queue.retry', $job->id) }}" method="POST" class="me-2">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-xs btn-icon">
                                                            <i data-feather="refresh-cw"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('queue.delete', $job->id) }}" method="POST" onsubmit="return confirm('Delete this job?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs btn-icon">
                                                            <i data-feather="trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No failed jobs found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Pending Jobs List</h6>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">ID</th>
                                        <th class="pt-0">Queue</th>
                                        <th class="pt-0">Payload (Class)</th>
                                        <th class="pt-0">Attempts</th>
                                        <th class="pt-0">Available At</th>
                                        <th class="pt-0">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($jobs as $job)
                                        @php
                                            $payload = json_decode($job->payload);
                                            $displayName = $payload->displayName ?? 'Unknown';
                                        @endphp
                                        <tr>
                                            <td>{{ $job->id }}</td>
                                            <td>{{ $job->queue }}</td>
                                            <td>{{ $displayName }}</td>
                                            <td>{{ $job->attempts }}</td>
                                            <td>{{ date('Y-m-d H:i:s', $job->available_at) }}</td>
                                            <td>{{ date('Y-m-d H:i:s', $job->created_at) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No pending jobs found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
