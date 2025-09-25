@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact</h4>
                    <a href="#" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                               {{-- $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('phone');
                $table->text('message');    
                $table->integer('status')->default('0');
                $table->integer('services_cat_id')->default('0'); --}}
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Services Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $item)
                                    <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            @if ($item->services_cat_id)
                                                {{ $item->services->service_title }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal{{ $item->id }}">Reply</button>

                                            <div class="modal fade" id="replyModal{{ $item->id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="replyModalLabel{{ $item->id }}">Reply to {{ $item->first_name }} {{ $item->last_name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('contact.reply', $item->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="subject" class="form-label">Subject</label>
                                                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message" class="form-label">Message</label>
                                                                    <textarea class="form-control" id="message" name="message" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Send</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
