<?php

namespace App\Services\Servers;

use App\Models\Pay;
use App\Services\Banks\Models\Mellat as mellatModel;

class Mellat
{
    public function bpPayRequest($parameters)
    {
        $data = $parameters['data'];
        $table = $parameters['table'];

        $res = Pay::create($data);
        $result = 34;
        if ($res instanceof Pay)
            $result = $data['ResCode'] . "," . $data['RefId'];

        return self::response($result);
    }

    public function bpVerifyRequest($parameters)
    {
        $data = $parameters['data'];
        $maxTime = (int)$data['timeInterval'];

        $result = Pay::where("saleReferenceId", "=", $data["saleReferenceId"])->first();

        if (!($result instanceof Pay)) return self::response(54); //تراکنش مرجع وجود نیست
        if ($result['saleOrderId'] != $data['saleOrderId']) return self::response(44); // تراکنش نامعتبر
        if ($result['ResCode'] != 0) return self::response(61);
        // محاسبه فاصله زمانی ایجاد پرداخت و این درخواست
        $interval = time() - $result['time'];
        if (($result['status'] == 0) || ($interval > $maxTime)) {
            $result->ResCode = 61;
            $result->action = 'bpVerifyRequest';
            $result->save();
            return self::response(61); // زمان وریفای به اتمام رسیده// خطا در واریز
        }
        if ($result['verify'] == 1) return self::response(43); // قبلا درخواست وریفای صادر شده

        $result->verify = 1;
        $result->action = 'bpVerifyRequest';
        $result->ResCode = 0;
        if ($result->save()) return self::response(0); // وریفای انجام شد

        return self::response(34); // خطای سیستمی رخ داد
    }

    public function bpSettleRequest($parameters)
    {
        $data = $parameters['data'];
        $maxTime = (int)$data['timeInterval'];

        $result = Pay::where("saleReferenceId", "=", $data["saleReferenceId"])->first();

        if (!($result instanceof Pay)) return self::response(54); //تراکنش مرجع وجود نیست
        if ($result['saleOrderId'] != $data['saleOrderId']) return self::response(47); // تراکنش نامعتبر
        if ($result['ResCode'] != 0) return self::response(61);
        // محاسبه فاصله زمانی ایجاد پرداخت و این درخواست
        $interval = time() - $result['time'];
        if (($result['status'] == 0) || ($interval > $maxTime)) {
            $result->ResCode = 61;
            $result->action = 'bpSettleRequest';
            $result->save();
            return self::response(61); // زمان س‌تل به اتمام رسیده// خطا در واریز
        }
        if ($result['verify'] == 0) return self::response(44); // درخواست وریفای صادر نشده
        if ($result['settle'] == 1) return self::response(45); // قبلا تراکنش س‌تل شده است

        $result->settle = 1;
        $result->action = 'bpSettleRequest';
        $result->ResCode = 0;
        if ($result->save()) return self::response(0); // س‌تل انجام شد

        return self::response(34); // خطای سیستمی رخ داد
    }
    public function bpInquiryRequest($parameters)
    {
        $data = $parameters['data'];
        $maxTime = (int)$data['timeInterval'];

        $result = Pay::where("saleReferenceId", "=", $data["saleReferenceId"])->first();

        if (!($result instanceof Pay)) return self::response(54); //تراکنش مرجع وجود نیست
        if ($result['saleOrderId'] != $data['saleOrderId']) return self::response(42); // تراکنش sale یافت نشده
        $isReverse = ($result['reverse'] == 1) ? true : false;
        $isStatus = ($result['status'] == 1) ? true : false;
        $hasTime = ((time() - $result['time']) < $maxTime) ? true : false;
        $isVerify = ($result['verify'] == 1) ? true : false;
        $isSettle = ($result['settle'] == 1) ? true : false;
        if ($isReverse) return self::response(48); // مرجوع شده
        if ($isStatus && $isVerify && $isSettle) return self::response(45); // ستل شده
        if ($isStatus && $isVerify && !$isSettle) return self::response(46); // وریفای شده ولی ستل نشده
        if ($isStatus && !$isVerify) {
            // پرداخت شده ولی وریفای نشده
            if ($hasTime) {
                return self::response(46); // وقت برای وریفای هست
            } else {
                return self::response(61); // تراکنش لغو شده
            }
        }
        if (!$isStatus && !$isVerify && !$isSettle) {
            if ($result['ResCode'] != 0) return self::response(61); // قطعا کنسل شده
            if ($hasTime) {
                return self::response(42); // هنوز مان هست و کاربر پرداخت یا کنسل نکرده
            } else {
                return self::response(61); // پرداخت نشده و زمانی هم ندارد
            }
        }
        // درصورتی که مشکلی ناشناخته باشد 
        return self::response(34);
    }
    public function bpReversalRequest($parameters)
    {
        $data = $parameters['data'];
        $maxTime = (int)$data['timeInterval'];

        $result = Pay::where("saleReferenceId", "=", $data["saleReferenceId"])->first();

        if (!($result instanceof Pay)) return self::response(54); //تراکنش مرجع وجود نیست
        if ($result['saleOrderId'] != $data['saleOrderId']) return self::response(42); // تراکنش sale یافت نشده
        $isReverse = ($result['reverse'] == 1) ? true : false;
        $isStatus = ($result['status'] == 1) ? true : false;
        $hasTime = ((time() - $result['time']) < $maxTime) ? true : false;
        $isSettle = ($result['settle'] == 1) ? true : false;
        if ($isReverse) return self::response(48); // مرجوع شده قبلا        
        if ($isSettle) return self::response(45); // تراکنش ستل شده  // طبق قرارداد امکان مرجوع ستل شده نیست       
        if ($result['ResCode'] != 0) return self::response($result['ResCode']);
        if ($isStatus && $hasTime) {
            $result->reverse = 1;
            $result->ResCode = 48;
            return ($result->save()) ? 0 : 34; // موفیقت یا خطای سیستمی رخ داد
        }
        // درصورتی که مشکلی ناشناخته باشد 
        return self::response(61);
    }
    public static function response($message)
    {
        return ['return' => $message];
    }
    public function log($method_name, $data)
    {
        $filename = 'log.txt';
        $handle = fopen($filename, 'a+');
        fwrite($handle, date("l dS of F Y h:i:s A") . ' - ' . $_SERVER['REMOTE_ADDR'] . "\r\n" . $method_name . "\r\n" . print_r($data, true));
        fclose($handle);
    }
    public function call($method_name, $parameters)
    {
        $model = new mellatModel();
        // convert Object to array
        $parameters = (array) $parameters[0];

        $func = $model->funcName($method_name);
        $parameters = $model->$func($parameters);

        if ($parameters['hasError']) {
            return ['return' => $parameters['code']];
        }

        return $this->$method_name($parameters);
    }
}
