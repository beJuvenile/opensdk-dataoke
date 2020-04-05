<?php
/**
 * 咚咚抢
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=23
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class DdqGoodsListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/category/ddq-goods-list';

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
    public $version = 'v1.2.0';

    private $roundTime; // 场次时间 默认为当前场次，场次时间输入方式：yyyy-mm-dd hh:mm:ss

    private $apiParams = [];



    public function setRoundTime($val)
    {
        $this->roundTime = (string)$val;
        $this->apiParams['roundTime'] = (string)$val;
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