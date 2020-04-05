<?php
/**
 * 定时拉取
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=12
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/4/05
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class GoodsByTimeRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/pull-goods-by-time';

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

    private $pageSize = 100; // 默认100，可选范围：10,50,100,200，如果小于10按10处理，大于200按照200处理，其它非范围内数字按100处理

    private $pageId = '1';  // 分页id,默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。
                            // 示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；
                            // 示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）

    private $cid;           // 大淘客的一级分类id。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id

    private $subcid;        // 大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，
                            // 当一级类目id和二级类目id同时传入时，会自动忽略二级类目id

    private $pre;           // 是否预告商品 1-预告商品，0-非预告商品

    private $sort;          // 默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，
                            // 4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高

    private $startTime;     // 开始时间 格式为yy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间

    private $endTime;       // 结束时间 默认为请求的时间，商品下架的时间小于等于结束时间

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

    public function setCid($id)
    {
        $this->cid = (string)$id;
        $this->apiParams['cid'] = (string)$id;
    }

    public function setSubcid($id)
    {
        $this->subcid = (int)$id;
        $this->apiParams['subcid'] = (int)$id;
    }

    public function setPre($val)
    {
        $this->pre = (int)$val;
        $this->apiParams['pre'] = (int)$val;
    }

    public function setSort($val)
    {
        $this->sort = (int)$val;
        $this->apiParams['sort'] = (int)$val;
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