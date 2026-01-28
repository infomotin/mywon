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
</body>
</html>
