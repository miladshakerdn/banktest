<?php

namespace App\Services\Banks\Validators;
// need use db
use Illuminate\Support\Facades\DB;

class Validator
{
    // Result Data & first error
    public $result;
    // All errors
    public $errors = [];
    public $data;
    public function decomposition($data, $rules, $additionalData)
    {
        $data = (array) $data;
        $this->data = $data;
        foreach ($rules as $key => $rule) {
            $dataName = $key;
            $this->result["data"][$key] = isset($data[$key]) ? $data[$key] : "";
            $this->data[$key] = $this->result["data"][$key];

            $this->analyze($dataName, $rule);
        }
        // add data and rename keys
        $this->dataFixer($additionalData);

        return $this->makeResult();
    }

    public function dataFixer($data)
    {
        foreach ($data as $key => $value) {
            $params = [];
            $parts = explode(':', $value);
            $func = $parts[0];
            $params[] = $key;
            $params[] = isset($parts[1]) ? $parts[1] : "";
            // d([$key,$func,$params]);
            call_user_func_array(array($this, $func), $params);
        }
    }
    public function analyze($dataName, $rule)
    {
        $errorCode = $rule["errorCode"];
        $rules = explode('|', $rule["rule"]);
        foreach ($rules as $rule) {
            $part = explode(':', $rule);
            $ruleName = $part[0];
            $parts["val"] = $this->data[$dataName];
            $parts["name"] = $dataName;
            $parts["cond"] = isset($part[1]) ? $part[1] : "";
            $hasError = call_user_func_array(array($this, $ruleName), $parts);
            if ($hasError) {
                // d(["parts"=>$parts,"func"=>$ruleName]);
                $this->errors[$dataName] = ["code" => $errorCode];
            }
        }
    }
    // DATA FIXER
    public function key($key, $newKey)
    {
        $this->result["data"][$newKey] = $this->result["data"][$key];
        unset($this->result["data"][$key]);
    }
    public function self($key, $val = "")
    {
        $this->result["data"][$key] = isset($this->data[$key]) ? $this->data[$key] : $val;
    }
    public function set($key, $val = "")
    {
        $this->result["data"][$key] = $val;
    }
    public function hashCode($key, $val)
    {
        $this->result["data"][$key] = $this->randHash(20);
    }
    // END DATA FIXER
    public function numeric($val, $name, $cond)
    {
        return (!is_numeric($val)) ? true : false;
    }
    public function amount($val, $name, $cond)
    {
        return (!is_numeric($val)) ? true : false;
    }
    // Need DB
    public function unique($val, $name, $cond = "id")
    {
        // #FIXE
        //DB::select("SELECT * FROM users");
        $res = DB::select("SELECT $cond FROM  $this->table  where $cond=:cond", ['cond' => $val]);
        return count($res) > 0 ? true : false;
    }
    public function between($val, $name, $cond)
    {
        $minMax = $this->dash($cond);
        $min = $minMax[0];
        $max = $minMax[1];
        return $val < $min || $val > $max ? true : false;
    }
    public function date($val, $name, $cond = "Ymd")
    {

        return $this->validateDate($val, $cond) ? false : true;
    }
    public function time($val, $name, $cond = "Hms")
    {

        return $this->validateDate($val, $cond) ? false : true;
    }
    function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
    public function string($val, $name, $cond)
    {
        return is_string($val) || is_int($val) || is_null($val) ? false : true;
    }
    public function url($val, $name, $cond)
    {
        // if need check real url use this preg_match
        /**
         * if valid => return false - means no error
         * if is not valid => return true - means no we have error
         *  preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$val) ? false : true
         */
        return filter_var($val, FILTER_VALIDATE_URL) ? false : true;
    }
    // max
    public function max($val, $name, $cond)
    {
        $len = strlen($val);
        return $len > $cond ? true : false;
    }
    // min
    public function min($val, $name, $cond)
    {
        $len = strlen($val);
        return $len < $cond ? true : false;
    }
    // -
    public function dash($data)
    {
        return explode('-', $data);
    }
    public function hasError()
    {
        return count($this->errors) > 0 ? true : false;
    }
    public function firstError()
    {
        foreach ($this->errors as $key => $value) {
            return $value['code'];
        }
    }
    public function makeResult()
    {
        $this->result["table"] = $this->table;
        $this->result["hasError"] = $this->hasError();
        $this->result["code"] = $this->result["hasError"] ? $this->firstError() : null;
        return $this->result;
    }
    public function funcName($str)
    {
        return $str . "Data";
    }
    public static function randHash($strength = 20, $str = null)
    {
        $input = 'abcdefghij012345klmnopqrstuvwxyz6789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input = (is_null($str)) ? $input : $str;
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            if ($i == 0 && $random_character == 0)
                $random_character = 1;
            $random_string .= $random_character;
        }

        return $random_string;
    }
    public function card()
    {
        $str = "0123456789";
        return SELF::randHash(4, $str) . '-' . SELF::randHash(4, $str) . '-****-' . SELF::randHash(4, $str);
    }
}
