<!DOCTYPE html>
<html>
<head>
    <title>Newsletter</title>
</head>
<body>
    <h1>{{ $subjectLine }}</h1>
    <div>
        {!! $content !!}
    </div>
    <p>Thank you for subscribing to our newsletter.</p>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #999; text-align: center;">
        <p>You received this email because you subscribed to our newsletter.</p>
        <p><a href="{{ route('unsubscribe', ['email' => $subscriber->email, 'token' => $subscriber->token]) }}" style="color: #666; text-decoration: underline;">Unsubscribe</a></p>
    </div>
</body>
</html>
