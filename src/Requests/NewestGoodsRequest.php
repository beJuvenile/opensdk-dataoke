<?php
/**
 * 商品更新
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=3
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class NewestGoodsRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/get-newest-goods';

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

    private $pageSize = 100; // 默认100，可选范围：10,50,100,200，如果小于10按10处理，大于200按照200处理，其它非范围内数字按100处理

    private $pageId = '1';  // 分页id,默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。
                            // 示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；
                            // 示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）

    private $startTime;     // 商品上架开始时间 请求格式：yyyy-MM-dd HH:mm:ss

    private $endTime;       // 商品上架结束时间 请求格式：yyyy-MM-dd HH:mm:ss

    private $cids;          // 一级类目Id 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。
                            // 当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，
                            // 1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，
                            // 10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺

    private $subcid;        // 二级类目Id 大淘客的二级类目id，通过超级分类API获取。
                            // 仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id

    private $juHuaSuan;     // 是否聚划算 1-聚划算商品，0-所有商品，不填默认为0

    private $taoQiangGou;   // 是否淘抢购 1-淘抢购商品，0-所有商品，不填默认为0

    private $tmall;         // 是否天猫商品 1-天猫商品，0-所有商品，不填默认为0

    private $tchaoshi;      // 是否天猫超市商品 1-天猫超市商品，0-所有商品，不填默认为0

    private $goldSeller;    // 是否金牌卖家 1-金牌卖家，0-所有商品，不填默认为0

    private $haitao;        // 是否海淘商品 1-海淘商品，0-所有商品，不填默认为0

    private $brand;         // 是否品牌商品 1-品牌商品，0-所有商品，不填默认为0

    private $brandIds;      // 品牌id 当brand传入0时，再传入brandIds将获取不到结果。品牌id可以传多个，以英文逗号隔开，如：”345,321,323”

    private $priceLowerLimit;   // 价格（券后价）下限

    private $priceUpperLimit;   // 价格（券后价）上限

    private $couponPriceLowerLimit; // 最低优惠券面额

    private $commissionRateLowerLimit;  // 最低佣金比率

    private $monthSalesLowerLimit;  // 最低月销量

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

    public function setCids($id)
    {
        $this->cids = (string)$id;
        $this->apiParams['cids'] = (string)$id;
    }

    public function setSubcid($id)
    {
        $this->subcid = (string)$id;
        $this->apiParams['subcid'] = (string)$id;
    }

    public function setJuHuaSuan($val)
    {
        $this->juHuaSuan = (int)$val;
        $this->apiParams['juHuaSuan'] = (int)$val;
    }

    public function setTaoQiangGou($val)
    {
        $this->taoQiangGou = (int)$val;
        $this->apiParams['taoQiangGou'] = (int)$val;
    }

    public function setTmall($val)
    {
        $this->tmall = (int)$val;
        $this->apiParams['tmall'] = (int)$val;
    }

    public function setTchaoshi($val)
    {
        $this->tchaoshi = (int)$val;
        $this->apiParams['tchaoshi'] = (int)$val;
    }

    public function setGoldSeller($val)
    {
        $this->goldSeller = (int)$val;
        $this->apiParams['goldSeller'] = (int)$val;
    }

    public function setHaitao($val)
    {
        $this->haitao = (int)$val;
        $this->apiParams['haitao'] = (int)$val;
    }

    public function setBrand($val)
    {
        $this->brand = (int)$val;
        $this->apiParams['brand'] = (int)$val;
    }

    public function setBrandIds($val)
    {
        $this->brandIds = (string)$val;
        $this->apiParams['brandIds'] = (string)$val;
    }

    public function setPriceLowerLimit($val)
    {
        $this->priceLowerLimit = (float)$val;
        $this->apiParams['priceLowerLimit'] = (float)$val;
    }

    public function setPriceUpperLimit($val)
    {
        $this->priceUpperLimit = (float)$val;
        $this->apiParams['priceUpperLimit'] = (float)$val;
    }

    public function setCouponPriceLowerLimit($val)
    {
        $this->couponPriceLowerLimit = (int)$val;
        $this->apiParams['couponPriceLowerLimit'] = (int)$val;
    }

    public function setCommissionRateLowerLimit($val)
    {
        $this->commissionRateLowerLimit = (float)$val;
        $this->apiParams['commissionRateLowerLimit'] = (float)$val;
    }

    public function setMonthSalesLowerLimit($val)
    {
        $this->monthSalesLowerLimit = (int)$val;
        $this->apiParams['monthSalesLowerLimit'] = (int)$val;
    }
    
    public function setSort($val)
    {
        $this->sort = (int)$val;
        $this->apiParams['sort'] = (int)$val;
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