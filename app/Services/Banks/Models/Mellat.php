<?php

namespace App\Services\Banks\Models;

use App\Services\Banks\Validators\Validator;

class Mellat extends Validator
{
    public $table = "pays";
    public function bpPayRequestData($data)
    {
        $this->table = "pays";
        $rules = [
            'orderId'        => ["errorCode" => 51, "rule" => "numeric|unique:orderId"], // or 41
            'amount'         => ["errorCode" => 25, "rule" => "amount|between:10000-500000000"],
            'localDate'      => ["errorCode" => 35, "rule" => "date:Ymd"],
            'localTime'      => ["errorCode" => 35, "rule" => "time:Gis"],
            'additionalData' => ["errorCode" => 32, "rule" => "string|max:1000"],
            'callBackUrl'    => ["errorCode" => 24, "rule" => "url|max:249"],
            'payerId'        => ["errorCode" => 417, "rule" => "numeric"]
        ];
        $additionalData = [
            'terminalId' => 'self',
            'RefId' => 'hashCode',
            'ResCode' => 'set:0',
            'action' => 'set:bpPayRequest',
            'localTime' => 'key:localTime_',
            'time' => 'set:' . time(),
        ];
        return $this->decomposition($data, $rules, $additionalData);
    }

    public function bpVerifyRequestData($data)
    {
        $this->table = "pays";
        $rules = [
            'orderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleOrderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleReferenceId' => ["errorCode" => 32, "rule" => "numeric"],
        ];
        $additionalData = [
            'terminalId' => 'self',
            'timeInterval' => 'set:' . (20 * 60), // 20MIN
        ];
        return $this->decomposition($data, $rules, $additionalData);
    }
    public function bpSettleRequestData($data)
    {
        $this->table = "pays";
        $rules = [
            'orderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleOrderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleReferenceId' => ["errorCode" => 32, "rule" => "numeric"],
        ];
        $additionalData = [
            'terminalId' => 'self',
            'timeInterval' => 'set:' . (20 * 60), // 20MIN
        ];
        return $this->decomposition($data, $rules, $additionalData);
    }
    public function bpInquiryRequestData($data)
    {
        $this->table = "pays";
        $rules = [
            'orderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleOrderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleReferenceId' => ["errorCode" => 32, "rule" => "numeric"],
        ];
        $additionalData = [
            'terminalId' => 'self',
            'timeInterval' => 'set:' . (20 * 60), // 20MIN
        ];
        return $this->decomposition($data, $rules, $additionalData);
    }
    public function bpReversalRequestData($data)
    {
        $this->table = "pays";
        $rules = [
            'orderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleOrderId' => ["errorCode" => 32, "rule" => "numeric"],
            'saleReferenceId' => ["errorCode" => 32, "rule" => "numeric"],
        ];
        $additionalData = [
            'terminalId' => 'self',
            'timeInterval' => 'set:' . (24 * 60 * 60), // 1 day
        ];
        return $this->decomposition($data, $rules, $additionalData);
    }
}
