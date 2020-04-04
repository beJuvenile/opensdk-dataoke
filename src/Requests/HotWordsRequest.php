<?php
/**
 * 热搜记录
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=4
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class HotWordsRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/category/get-top100';

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
    public $version = 'v1.0.1';

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