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

    private $appKey = '5d84bcc8bf121';

    private $appSecret = 'dab025a5213aef8e94a8f2dc52d37e2a';

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