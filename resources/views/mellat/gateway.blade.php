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
            <div class="c-t-dark row alternat alternat-green">
                <p>عملیات مورد نظر خود را انتخاب کنید: </p>
                <form action="{{ route('mellat.callBack') }}" method="post">
                    <input type="hidden" name="RefId" value="{{ $pay['RefId'] }}">
                    <input type="submit" name="dopay" class="btn btn-success mr-5" value="پرداخت با موفقیت انجام شود">
                    <div class="w-100"></div>
                    <input type="submit" name="cancel" class="btn btn-danger mr-5" value="انصراف از پرداخت">
                </form>
                <code class="code rtl text-r">
                    مواردی که به آدرس { {{ $pay['callBackUrl'] }} } فرستاده میشود، شامل: <br>
                <p class="ltr text-l">
                    1: RefId
                    <br>2: ResCode => 0 / 61
                    <br>3: SaleOrderId => عدد
                    <br>4: SaleReferenceId => عدد
                    <br>5: CardHolderInfo => 1234-4567-****-9876
                </p>
                </code>
            </div>
            <p class="c-t-red">تست بانک ملت</p>
            <p class="smal-t c-t-dark">Milad Shaker Dn</p>
        </div>
    </div>
</body>

</html>