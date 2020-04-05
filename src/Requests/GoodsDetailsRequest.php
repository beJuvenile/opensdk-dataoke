<?php
/**
 * 单品详情
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=8
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class GoodsDetailsRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/get-goods-details';

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
    public $version = 'v1.2.1';

    private $id;        // 商品id 大淘客商品id，请求时id或goodsId必填其中一个，若均填写，将优先查找当前单品id

    private $goodsId;   // 淘宝商品id

    private $apiParams = [];


    public function setId($val)
    {
        $this->id = (int)$val;
        $this->apiParams['id'] = (int)$val;
    }

    public function setGoodsId($val)
    {
        $this->goodsId = (string)$val;
        $this->apiParams['goodsId'] = (int)$val;
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