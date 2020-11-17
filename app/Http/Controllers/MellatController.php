<?php

namespace App\Http\Controllers;

use App\Services\Servers\Server;
use App\Models\Pay;
use Illuminate\Http\Request;

use App\Helper\Helper;

class MellatController extends Controller
{

    protected $title = "بانک ملت";
    protected $time = 20;

    public function __construct()
    {
    }
    public function index()
    {


        $Service = new Server('Mellat');

        $classmap = [
            'in' => 'in'
        ];

        $params = array(
            'soap_version' => SOAP_1_2,
            'style' => SOAP_RPC,
            'use' => SOAP_LITERAL,
            'classmap' => $classmap
        );

        $server = new \SOAPServer(route('mellat.wsdl'), $params);
        $server->setObject($Service);
        return $server->handle();
    }

    public function gateway(Request $Request, $refId = null)
    {

        $data = [];
        $data['title'] = $this->title;
        $refId = $Request->input('RefId');
        // $refId = "gw4kk8mcq9yIbnLwynkI";
        $pay = Pay::where("RefId", "=", $refId)->get()->first();

        // آیا پرداخت وجود دارد؟
        $viewErro = $this->checkRefId($pay, $refId);
        if (!is_null($viewErro))
            return $viewErro;
        // آیا مهلت پرداخت داریم؟
        $viewErro = $this->timeInterval($pay['time']);
        if (!is_null($viewErro))
            return $viewErro;


        return view("mellat.gateway", compact("data", "pay"));
    }
    // callBack to site
    public function callBack(Request $Request)
    {
        $data = [];
        $data['title'] = $this->title;
        $refId = $Request->input('RefId');
        $pay = Pay::where("RefId", "=", $refId)->get()->first();
        // آیا پرداخت وجود دارد؟
        $viewErro = $this->checkRefId($pay, $refId);
        if (!is_null($viewErro))
            return $viewErro;
        // آیا مهلت پرداخت داریم؟
        $viewErro = $this->timeInterval($pay['time']);
        if (!is_null($viewErro))
            return $viewErro;
        if ($Request->has('cancel')) {
            $pay->ResCode = 61;
            $pay->status = 0;
            $pay->action = 'cancelPay';
        } else {
            $pay->ResCode = 0;
            $pay->status = 1;
            $pay->action = 'doPaySuccess';
        }
        $pay->saleOrderId = $pay->orderId;
        $pay->CardHolderInfo = Helper::card2();
        $pay->saleReferenceId = time() . Helper::randHash(5, "0123456789");
        if ($pay->save()) {
            $callBackUrl = $pay->callBackUrl;
            $pay = [
                'RefId' => $pay->RefId,
                'ResCode' => $pay->ResCode,
                'SaleOrderId' => $pay->saleOrderId,
                'SaleReferenceId' => $pay->saleReferenceId,
                'CardHolderInfo' => $pay->CardHolderInfo,
            ];
            return view("mellat.callback", compact("data", "pay", "callBackUrl"));
        }
    }

    public function help()
    {
        $data = [];
        $data['title'] = $this->title;
        return view("mellat.help", compact("data"));
    }


    // error render
    protected function checkRefId($pay, $refId)
    {
        $data['title'] = $this->title;
        if (!$pay instanceof Pay) {

            $data['error'] = "ترانکش شما نامعتبر است";
            $data['code'] = $refId . "<br> کد مرجع درخواست پرداخت موجود نیست!";

            return view("mellat.error", compact("data"));
        }
        if ($pay['status'] == 1) {
            $data['error'] = "شما قبلا وضعیت تراکنش را مشخص کرده‌اید";
            $data['code'] = "کد وضعیت پرداخت شما :  " . $pay->ResCode . " است <br> " . Helper::responseCode($pay->ResCode);
            return view("mellat.error", compact("data"));
        }
    }
    protected function timeInterval($time, $minet = null)
    {
        $data['title'] = $this->title;

        $max = is_null($minet) ? ($this->time * 60) : ((int)$minet * 60);
        $now = time();
        $interval = $now - (int)$time;
        $result =  ($interval < $max) ? true : false;
        if (!$result) {
            $data['error'] = "مهلت انجام تراکنش به پایان رسیده است";
            $data['code'] = "حداکثر زمان " . $this->time . " دقیقه است.";
            return view("mellat.error", compact("data"));
        }
    }
}
