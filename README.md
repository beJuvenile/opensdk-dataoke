# opensdk-dataoke

#### 介绍
本类库是对大淘客开放平台API的封装  
接口文档请参见 [大淘客开放平台](http://www.dataoke.com/pmc/openapi.html)

#### 使用示例
~~~php
require 'vendor/autoload.php';

use OpenSDK\DaTaoKe\Client;
use OpenSDK\DaTaoKe\Requests\HotWordsRequest;

$c = new Client();
$c->appKey = 'You are appKey';
$c->appSecret = 'You are appSecret';
$req = new HotWordsRequest();
$c->setRequest($req);
$result = $c->execute();

var_dump($result);
~~~