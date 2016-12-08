<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{!! trans('confirmation.sin_up') !!}</title>
</head>
<body>
    <h1>{!! trans('confirmation.thanks')!!}</h1>

    <p>
        {!! trans('confirmation.confirm')!!} <a href="{{ url('register/confirm/{user->token}') }}"> {!! trans('confirmation.link')!!}</a>
    </p>
</body>
</html>