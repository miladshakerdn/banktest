# Bank test

<div style="text-align:right;" dir="rtl">

# شبیه‌ساز بانک ملت

<p>
استفاده از درگاه آنلاین بانک ملت نیازمند دریافت نماد اعتماد الکترونیک است و همچنین API برای تست ندارد، این پروژه برای شبیه‌سازی پرداخت آنلاین بانک ملت است.
</p>

<strong>متد‌های موجود شامل :</strong>

<p>
<pre style="text-align:left;" dir="ltr">
1- bpPayRequest
2- bpVerifyRequest
3- bpSettleRequest
4- bpInquiryRequest
5- bpReversalRequest
</pre>
</p>

<strong>وابستگی ها</strong>

توجه! لازم است که SOAP نصب باشد.

<div style="text-align:left;"  dir="ltr">
    
- [x] PHP ^7.3
- [x] PHP soap
    
</div>

## نصب

نصب با استفاده از کامپوزر. برای این شبیه ساز از فریمورک [Lumen](https://lumen.laravel.com/docs/8.x) استفاده شده.

<div style="text-align:left;" dir="ltr">

```bash
git clone https://github.com/miladshakerdn/banktest.git

cd banktest

#Install Lumen

composer install
```

<p style="text-align:right;" dir="rtl">
فایل `.env` را باز کرده و اطلاعات دیتابیس را وارد کنید.
</p>

```bash
#open .env and set your db information
#migrate database
php artisan migrate
php artisan db:seed
```

</div>

## نحوه استفاده

مطابق مستندات ارائه شده توسط بانک ملت عمل کرده و مانند درگاه واقعی بانک ملت عمل میکند.

اطلاعات اولیه پذیرنده شامل:

<div style="text-align:left;" dir="ltr">

| Name           | Value                                            |
| -------------- | ------------------------------------------------ |
| Terminal ID    | 123625346124                                     |
| Username       | admin                                            |
| Password       | admin                                            |
| WSDL URL       | http://your-server:PORT/mellat/serve?wsdl        |
| Gateway URL    | http://your-server:PORT/mellat/gateway           |
| ---            | ---                                              |
| Or WSDL URL    | http://your-localhost/bankTest/mellat/serve?wsdl |
| Or Gateway URL | http://your-localhost/bankTest/gateway           |

</div>
برای متوجه شدن لینک دقیق می‌توانید صفحه اصلی پروژه را در مرورگر باز کرده تا از آن مطلع شوید.

<div style="text-align:left;" dir="ltr">

```bash
your-server:PORT
#OR
your-localhost/bankTest/
```

</div>

</div>
