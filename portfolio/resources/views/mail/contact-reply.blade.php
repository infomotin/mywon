<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        // dd($reply);
        
    @endphp
    <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td>
                    Dear {{ $reply['first_name'] }} {{ $reply['last_name'] }},
                </td>
            </tr>
            <tr>
                <td>
                    We have received your email regarding {{ $reply['subject'] }}.
                </td>
            </tr>
            <tr>
                <td>
                    {{ $reply['message'] }}
                </td>
            </tr>
            <tr>
                <td>
                    Thank you for using our service.
                </td>
            </tr>
            <tr>
                <td>
                    Best Regards,
                </td>
            </tr>
            <tr>
                <td>
                    {{ $reply['user_id'] }}
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>