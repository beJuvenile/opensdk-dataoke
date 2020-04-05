<?php
/**
 * 热门商品
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=20
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/4/5
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class GoodsActivityGoodsListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/activity/goods-list';

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

    private $pageSize = 100; // 每页条数,默认为100 大于100按100处理

    private $pageId = '1';  // 分页id,默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。
                            // 示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，
                            // 该方式可以避免入口商品重复；
                            // 示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）

    private $activityId;    // 活动id 通过热门活动API获取的活动id

    private $cid;           // 大淘客一级分类ID
                            // 1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，
                            // 9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺

    private $subcid;        // 大淘客二级分类ID
                            // 可通过超级分类接口获取二级分类id，当同时传入一级分类id和二级分类id时，以一级分类id为准

    private $apiParams = [];



    public function setPageSize($size=100)
    {
        $this->pageSize = (int)$size;
        $this->apiParams['pageSize'] = (int)$size;
    }

    public function setPageId($val='1')
    {
        $this->pageId = (string)$val;
        $this->apiParams['pageId'] = (string)$val;
    }

    public function setActivityId($val)
    {
        $this->activityId = (int)$val;
        $this->apiParams['activityId'] = (int)$val;
    }

    public function setCid($val)
    {
        $this->cid = (int)$val;
        $this->apiParams['cid'] = (int)$val;
    }

    public function setSubcid($val)
    {
        $this->subcid = (int)$val;
        $this->apiParams['subcid'] = (int)$val;
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