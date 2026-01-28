<!DOCTYPE html>
<html>
<head>
    <title>New Project Showcase</title>
</head>
<body>
    <h1>New Project: {{ $portfolio->title }}</h1>
    <h2>{{ $portfolio->subtitle }}</h2>
    @if($portfolio->image)
        <img src="{{ asset('upload/portfolio/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" style="max-width: 100%;">
    @endif
    <p>{!! Str::limit(strip_tags($portfolio->description), 200) !!}</p>
    <a href="{{ route('portfolio.details', $portfolio->id) }}">View Project</a>
</body>
</html>
