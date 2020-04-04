<?php
/**
 * 失效商品
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=11
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class StaleGoodsByTimeRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/get-stale-goods-by-time';

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

    private $pageSize;  // 每页条数 默认为100，可选范围：10,50,100,200，如果小于10按10处理，大于200按照200处理，其它非范围内数字按100处理

    private $pageId;    // 分页id 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。
                        // 示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；
                        // 示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）

    private $startTime; // 开始时间 默认为yyyy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间，开始时间需要在当日

    private $endTime;   // 结束时间 默认为请求的时间，商品下架的时间小于等于结束时间，结束时间需要在当日

    private $apiParams = [];



    public function setPageSize($val)
    {
        $this->pageSize = (int)$val;
        $this->apiParams['pageSize'] = (int)$val;
    }

    public function setPageId($val)
    {
        $this->pageId = (string)$val;
        $this->apiParams['pageId'] = (string)$val;
    }

    public function setStartTime($val)
    {
        $this->startTime = (string)$val;
        $this->apiParams['startTime'] = (string)$val;
    }

    public function setEndTime($val)
    {
        $this->endTime = (string)$val;
        $this->apiParams['endTime'] = (string)$val;
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