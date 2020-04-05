<?php
/**
 * 商品详情API测试类
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/4/5
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\DaTaoKe\Client;
use OpenSDK\DaTaoKe\Requests\GoodsDetailsRequest;

class GoodsDetailTest
{

    private $appKey;

    private $appSecret;

    public function __construct()
    {
        $config = require 'config.php';

        $this->appKey = $config['app_key'];
        $this->appSecret = $config['app_secret'];
    }

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new GoodsDetailsRequest();
        $req->setGoodsId('589284195570');
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new GoodsDetailTest())();