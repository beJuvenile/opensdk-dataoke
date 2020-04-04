<?php
/**
 * 我发布的商品
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=2
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class OwnerGoodsRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/get-owner-goods';

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

    private $pageSize = 100; // 每页条数,默认为100

    private $pageId = '1';  // 分页id,默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。
                            // 示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；
                            // 示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）

    private $online = 1;    // 是否下架 默认为1，1-未下架商品，0-已下架商品

    private $startTime;     // 商品提交开始时间 请求格式：yyyy-MM-dd HH:mm:ss

    private $endTime;       // 商品上架结束时间 请求格式：yyyy-MM-dd HH:mm:ss

    private $sort;          // 排序字段, 默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，
                            // 4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高

    private $apiParams = [];



    public function setPageSize($size=100)
    {
        $this->pageSize = (int)$size;
        $this->apiParams['pageSize'] = (int)$size;
    }

    public function setPageId($id='1')
    {
        $this->pageId = (string)$id;
        $this->apiParams['pageId'] = (string)$id;
    }

    public function setOnline($int)
    {
        $this->online = (int)$int;
        $this->apiParams['online'] = (int)$int;
    }

    public function setStartTime($time)
    {
        $this->startTime = (string)$time;
        $this->apiParams['startTime'] = (string)$time;
    }

    public function setEndTime($time)
    {
        $this->endTime = (string)$time;
        $this->apiParams['endTime'] = (string)$time;
    }

    public function setSort($sort=0)
    {
        $this->sort = (int)$sort;
        $this->apiParams['sort'] = (int)$sort;
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