<?php
/**
 * 联盟搜索
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=13
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class TbServiceRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/tb-service/get-tb-service';

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

    private $pageNo;    // 第几页 默认1

    private $pageSize;  // 页大小， 默认20，范围值1~100

    private $keyWords;  // 查询词 查询词不能为空

    private $sort;      // 排序方式 默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，
                        // 4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高

    private $source;    // 是否商城商品 设置为1表示该商品是属于淘宝商城商品，设置为非1或不设置表示不判断这个属性（和overseas字段冲突，若已请求source，请勿再请求overseas）

    private $overseas;  // 是否海外商品 设置为1表示该商品是属于海外商品，设置为非1或不设置表示不判断这个属性（和source字段冲突，若已请求overseas，请勿再请求source）

    private $endPrice;  // 折扣价范围上限

    private $startPrice;// 折扣价范围下限

    private $startTkRate;   // 媒体淘客佣金比率下限

    private $endTkRate;     // 商品筛选-淘客佣金比率上限

    private $hasCoupon;     // 是否有优惠券 设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性

    private $apiParams = [];


    public function setPageNo($val)
    {
        $this->pageNo = (int)$val;
        $this->apiParams['pageNo'] = (int)$val;
    }

    public function setPageSize($val)
    {
        $this->pageSize = (int)$val;
        $this->apiParams['pageSize'] = (int)$val;
    }

    public function setKeyWords($val)
    {
        $this->keyWords = (string)$val;
        $this->apiParams['keyWords'] = (string)$val;
    }

    public function setSort($val)
    {
        $this->sort = (int)$val;
        $this->apiParams['sort'] = (int)$val;
    }

    public function setSource($val)
    {
        $this->source = (int)$val;
        $this->apiParams['source'] = (int)$val;
    }

    public function setOverseas($val)
    {
        $this->overseas = (int)$val;
        $this->apiParams['overseas'] = (int)$val;
    }

    public function setEndPrice($val)
    {
        $this->endPrice = (float)$val;
        $this->apiParams['endPrice'] = (float)$val;
    }

    public function setStartPrice($val)
    {
        $this->startPrice = (float)$val;
        $this->apiParams['startPrice'] = (float)$val;
    }

    public function setStartTkRate($val)
    {
        $this->startTkRate = (float)$val;
        $this->apiParams['startTkRate'] = (float)$val;
    }

    public function setEndTkRate($val)
    {
        $this->endTkRate = (float)$val;
        $this->apiParams['endTkRate'] = (float)$val;
    }

    public function setHasCoupon($val)
    {
        $this->hasCoupon = (bool)$val;
        $this->apiParams['hasCoupon'] = (bool)$val;
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