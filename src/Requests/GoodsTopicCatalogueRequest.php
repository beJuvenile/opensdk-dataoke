<?php
/**
 * 精选专辑API
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=21
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class GoodsTopicCatalogueRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/topic/catalogue';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'get';

    /**
     * 接口版本号
     *
     * @var string
     */
    public $version = 'v1.1.0';

    private $apiParams = [];


    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['version'] = $this->version;

        return $this->apiParams;
    }

}