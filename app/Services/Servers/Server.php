<?php

namespace App\Services\Servers;

use App\Models\Terminal;

ini_set("soap.wsdl_cache_enabled", "0");
class Server
{
    protected $class_name;

    protected $lib   = 'App\\Services\\Servers\\';

    protected $authData = [];

    public function __construct($className)
    {
        // class nameSpace 
        $this->className($className);
    }
    // Set and load class name
    private function className($className)
    {
        $className = $this->lib . $className;
        $this->class_name = new $className;
    }
    public function getAcceptorData($terminalId)
    {
        $authData = Terminal::where("terminalId", "=", $terminalId)->get();
        if (isset($authData[0]) && ($authData[0] instanceof Terminal)) {
            $authData = $authData->toArray();
            $this->authData = $authData[0];
        }
    }
    public function authenticate($auth)
    {
        $auth = $auth[0];

        $this->getAcceptorData($auth->terminalId);

        if (isset($this->authData['terminalId']) && ($auth->terminalId == $this->authData['terminalId'])) {
            if ($auth->userName == $this->authData['userName'] && $auth->userPassword == $this->authData['userPassword']) {
                return true;
            } else {
                // throw new \SOAPFault('Wrong user/pass',401);
                return ['return' => 24];
            }
        } else {
            // throw new \SOAPFault('Wrong terminalId',401);
            return ['return' => 21];
        }
    }
    public function log($method_name, $data)
    {
        $filename = 'log.txt';
        $handle = fopen($filename, 'a+');
        fwrite($handle, date("l dS of F Y h:i:s A") . ' - ' . $_SERVER['REMOTE_ADDR'] . "\r\n" . $method_name . "\r\n" . print_r($data, true));
        fclose($handle);
    }

    public function __call($method_name, $parameters)
    {

        //  logs
        $this->log($method_name, $parameters);
        $auth = $this->authenticate($parameters);

        // Check acceptor
        if ($auth !== true) {
            return $auth;
        }
        if (!method_exists($this->class_name, $method_name)) throw new \SOAPFault('Method ' . $method_name . ' not found', 401); // methot exist check
        return call_user_func_array(array($this->class_name, "call"), [$method_name, $parameters]); //call method

    }
}
