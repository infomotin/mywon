<!DOCTYPE html>
<html>
<head>
    <title>New Blog Post</title>
</head>
<body>
    <h1>New Blog Post: {{ $blog->title }}</h1>
    @if($blog->thumbnail)
        <img src="{{ asset('upload/posts/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" style="max-width: 100%;">
    @endif
    <p>{!! Str::limit(strip_tags($blog->content), 200) !!}</p>
    <a href="{{ route('blog.details', $blog->id) }}">Read More</a>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #999; text-align: center;">
        <p>You received this email because you subscribed to our newsletter.</p>
        <p><a href="{{ route('unsubscribe', ['email' => $subscriber->email, 'token' => $subscriber->token]) }}" style="color: #666; text-decoration: underline;">Unsubscribe</a></p>
    </div>
</body>
</html>
