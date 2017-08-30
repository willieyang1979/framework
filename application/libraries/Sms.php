<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User:zhangweiwei
 * Date: 17/3/9
 * Time: 下午5:25
 */
class Sms{
    public function Post($data, $target) {
        $url_info = parse_url($target);
        $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
        $httpheader .= "Host:" . $url_info['host'] . "\r\n";
        $httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
        $httpheader .= "Content-Length:" . strlen($data) . "\r\n";
        $httpheader .= "Connection:close\r\n\r\n";
        //$httpheader .= "Connection:Keep-Alive\r\n\r\n";
        $httpheader .= $data;
        $fd = fsockopen($url_info['host'], 80);
        fwrite($fd, $httpheader);
        $gets = "";
        while(!feof($fd)) {
            $gets .= fread($fd, 128);
        }
        fclose($fd);
        if($gets != ''){
            $start = strpos($gets, '<?xml');
            if($start > 0) {
                $gets = substr($gets, $start);
            }
        }
        return $gets;
    }
    
    public function sendsms($phone)
    {
        $code = rand(1000, 9999);
        $recode =md5($code);
        $msg ="您的验证码是：".$code."。请不要把验证码泄露给其他人。【微网通联】";
        $target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
        $post_data = "sname=DL-fudl&spwd=1234qwer&scorpid=&sprdid=1012818&sdst=".$phone."&smsg=".rawurlencode($msg);
        $gets = $this->Post($post_data, $target);
        $result = array();
        $result['gets'] = $gets;
        $result['code'] = $recode;
        return $result;
    }
}

?>

