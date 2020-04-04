<?php
/**
 * 客户端
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 20:54
 */
namespace OpenSDK\DaTaoKe;

use OpenSDK\DaTaoKe\Libs\Format;
use OpenSDK\DaTaoKe\Libs\Http;
use OpenSDK\DaTaoKe\Interfaces\Request;
use OpenSDK\DaTaoKe\Libs\Signer;

class Client
{

    /**
     * 接口地址
     *
     * @var string
     */
    public $gateway = 'https://openapi.dataoke.com/api';

    /**
     * AppKey
     *
     * @var string
     */
    public $appKey;

    /**
     * 接口版本
     */
    public $version = 'v1.0.1';

    /**
     * AppSecret
     *
     * @var string
     */
    public $appSecret;
    
    /**
     * request对象
     * 
     * @var object
     */
    public $request;

    /**
     * 数据类型
     *
     * @var string
     */
    public $format = 'json';

    public function __construct($appKey='', $appSecret='')
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }
    
    /**
     * 设置请求对象
     * 
     * @var object
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * 执行
     *
     * @return mixed
     */
    public function execute()
    {
        $requestUrl = $this->gateway . $this->request->method;
        $params     = $this->request->getParams();
        $params['appKey'] = $this->appKey;
        $params['sign']   = Signer::make($params, $this->appSecret);

        if (strtolower($this->request->requestType)=='post') {
            $result = Http::post($requestUrl, $params);
        } else {
            $result = Http::get($requestUrl, $params);
        }

        return strtolower($this->format)=='json' ? Format::deJSON($result) : Format::deSimpleXML($result);
    }





}