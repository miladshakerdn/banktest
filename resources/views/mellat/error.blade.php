<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milad Shaker Dn |{{ isset($data['title']) ? $data['title']: "تست بانک" }}</title>
    <link rel="stylesheet" href="{{ url('/assets/css/mellatE.css') }}">
</head>

<body>
    <div id="main">
        <div class="fof">
            <h1>اوه ...</h1>
            <div class="c-t-dark row alternat">
                <p> {{ $data['error'] }}</p>
                @if (isset($data['code']))
                <code class="code">{!! $data['code'] !!}</code>
                @endif
            </div>
            <p class="c-t-red">تست بانک ملت</p>
            <p class="smal-t c-t-dark">Milad Shaker Dn</p>
        </div>
    </div>
</body>

</html>