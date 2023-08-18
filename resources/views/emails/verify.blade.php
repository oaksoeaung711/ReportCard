<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Mail</title>
    <style type="text/css">
        div {
            text-align: center;
        }

        a {
            padding: 10px 20px;
            border-radius: 10px;
            background-color: #63647B;
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <div>
        <p>You've entered {{ $user_email }} as the email address for your account.</p>
        <p>Please verify this email address by clicking button below.</p>
        <a href="{{ route('verify',$validtoken) }}">Verify your email</a>
    </div>
</body>
</html>