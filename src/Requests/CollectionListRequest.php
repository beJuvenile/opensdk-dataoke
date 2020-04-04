<?php
/**
 * 我的收藏
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=1
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class CollectionListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/get-collection-list';

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

    private $cid;           // 商品在大淘客的分类id
                            // 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。
                            // 当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，1 -女装，2 -母婴，3 -美妆，4 -居家日用，
                            // 5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺

    private $trailerType;   // 是否返回预告商品 1:返回全部商品（包含在线商品），0:返回在线商品,默认返回全部商品

    private $sort;          // 排序字段, 默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，
                            // 4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高

    private $collectionTimeOrder;   // 加入收藏时间

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

    public function setTrailerType($type=1)
    {
        $this->trailerType = (int)$type;
        $this->apiParams['trailerType'] = (int)$type;
    }

    public function setSort($sort=0)
    {
        $this->sort = (int)$sort;
        $this->apiParams['sort'] = (int)$sort;
    }

    public function setCollectionTimeOrder($time)
    {
        $this->collectionTimeOrder = (int)$time;
        $this->apiParams['collectionTimeOrder'] = (int)$time;
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