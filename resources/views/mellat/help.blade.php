<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milad Shaker Dn |{{ isset($data['title']) ? $data['title']: "تست بانک" }}</title>
    <link rel="stylesheet" href="{{ url('/assets/css/mellatE.css') }}">
    <style>

    </style>
</head>

<body>
    <div id="main">
        <div class="fof">
            <h3>راهنما</h3>
            <div class="c-t-dark row alternat alternat-green">
                <p>سرویس WSDL : WSDL URL</p>
                <code class="code">
                    {{ route("mellat.serve") }}?wsdl
                </code>
                <p>صفحه پرداخت : Gateway URL</p>
                <code class="code">
                    {{ route("mellat.gateway") }}
                </code>
                <button class="btn btn-success">لیست متدها</button>
                <button class="btn btn-danger">ساخت (وب سرور در صورت تمایل)</button>
                <p>ساخت (وب سرور در صورت تمایل) :</p>
                <code class="code">
                    <p>
                        php -S 192.168.43.82:8190 -t public
                        <br> OR <br>
                        php -S http://localhost:5500 -t public
                        <br> OR <br>
                        php -S 127.0.0.1:5500 -t public
                    </p>
                </code>
                ‌گیت‌هاب :
                <code class="code">
                    https://github.com/miladshakerdn/Banktest
                </code>
            </div>
            <p class="c-t-red">تست بانک ملت</p>
            <p class="smal-t c-t-dark">Milad Shaker Dn</p>
        </div>
    </div>
</body>

</html>