<?php
/*!
 * OnBobba API
 * Supported by OnBobba (www.onbobba.com.br)
 */

class OnBobba {

    private $param = array();
    private $request = '';

    public function param($name, $value) {
        $this->param[$name] = $value;
    }

    public function request($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = trim($string);
        $string = str_replace(' ',  '', $string);
        $string = mb_strtolower($string);
        if(substr($string, 0, 1) == '/') {
            $string = substr($string, 1);
        }
        $this->request = $string;
    }

    public function execute() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://apiv2.onbobba.com.br/'.$this->request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->param);
        $res = json_decode(curl_exec($ch));
        curl_close($ch);
        return $res;
    }

}