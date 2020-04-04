<?php
/**
 * 猜你喜欢
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=16
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class SimilerGoodsRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/list-similer-goods-by-open';

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

    private $id;    // 大淘客的商品id

    private $size;  // 每页条数 默认10 ， 最大值100

    private $apiParams = [];


    public function setId($val)
    {
        $this->id = (int)$val;
        $this->apiParams['id'] = (int)$val;
    }

    public function setSize($val)
    {
        $this->size = (int)$val;
        $this->apiParams['size'] = (int)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['version'] = $this->version;

        return $this->apiParams;
    }

}