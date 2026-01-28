@extends('backend.admin.dashboard')

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Send Newsletter</h4>
                    <a href="{{ route('subscriber.index') }}" class="btn btn-secondary float-end">Back to List</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <form action="{{ route('subscriber.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message (HTML supported)</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="10" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">You can use HTML tags to format your newsletter.</div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Newsletter</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
