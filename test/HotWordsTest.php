<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\DaTaoKe\Client;
use OpenSDK\DaTaoKe\Requests\HotWordsRequest;

class HotWordsTest
{

    private $appKey = '5d84bcc8bf121';

    private $appSecret = 'dab025a5213aef8e94a8f2dc52d37e2a';

    public function __invoke()
    {
        $c = new Client();
        $c->appKey = $this->appKey;
        $c->appSecret = $this->appSecret;
        $req = new HotWordsRequest();
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new HotWordsTest())();



/*
$c = new Client();
$c->appKey = '5d84bcc8bf121';
$c->appSecret = 'dab025a5213aef8e94a8f2dc52d37e2a';
$req = new HotWordsRequest();
$c->setRequest($req);
$result = $c->execute();
echo 1;
var_dump($result);
*/