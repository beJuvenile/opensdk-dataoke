<?php
/**
 * 超级分类API测试类
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/4/4
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\DaTaoKe\Client;
use OpenSDK\DaTaoKe\Requests\SuperCategoryRequest;

class SuperCategoryTest
{

    private $appKey = '5d84bcc8bf12';

    private $appSecret = 'dab025a5213aef8e94a8f2dc52d37e2';

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new SuperCategoryRequest();
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new SuperCategoryTest())();