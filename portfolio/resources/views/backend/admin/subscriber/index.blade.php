@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Subscriber List</h4>
                    <a href="{{ route('subscriber.newsletter') }}" class="btn btn-success float-end">Send Newsletter</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Subscribed At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subscribers as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at->format('d M, Y h:i A') }}</td>
                                        <td>
                                            <a href="{{ route('subscriber.delete', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subscriber?')">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No subscribers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $subscribers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
