<?php
/**
 * 签名
 * 
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 22:13
 */
namespace OpenSDK\DaTaoKe\Libs;

class Signer
{

    /**
     * 生成签名
     *
     * @param array $data // 数据
     * @param string $secret // 密钥
     * @return string
     */
    public static function make($data, $secret)
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');

        return strtoupper(md5($str . '&key=' . $secret));
    }
    
}