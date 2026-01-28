<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Community</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px;">
        <h2 style="color: #2d3748;">Welcome to Our Community!</h2>
        
        <p>Hi there,</p>
        
        <p>Thank you for subscribing to our newsletter! We're thrilled to have you on board.</p>
        
        <p>You'll be the first to know about our latest updates, tech insights, and project showcases.</p>
        
        <p>If you have any questions or just want to say hi, feel free to reply to this email.</p>
        
        <br>
        <p>Best regards,</p>
        <p><strong>The Team</strong></p>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #999; text-align: center;">
            <p>You received this email because you subscribed to our newsletter.</p>
            <p><a href="{{ route('unsubscribe', ['email' => $subscriber->email, 'token' => $subscriber->token]) }}" style="color: #666; text-decoration: underline;">Unsubscribe</a></p>
        </div>
    </div>
</body>
</html>
