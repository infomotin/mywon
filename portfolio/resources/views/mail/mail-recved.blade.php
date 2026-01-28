<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td>
                    Dear {{ $contact->first_name }} {{ $contact->last_name }},
                </td>
            </tr>
            <tr>
                <td>
                    We have received your email.
                </td>
            </tr>
            <tr>
                <td>
                    We will get back to you as soon as possible.
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
