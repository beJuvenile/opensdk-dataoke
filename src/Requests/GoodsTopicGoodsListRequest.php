<?php
/**
 * 专辑商品
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=22
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/4/5
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class GoodsTopicGoodsListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/topic/goods-list';

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

    private $topicId;       // 专辑id 通过精选专辑API获取的活动id

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

    public function setTopicId($val)
    {
        $this->topicId = (int)$val;
        $this->apiParams['topicId'] = (int)$val;
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