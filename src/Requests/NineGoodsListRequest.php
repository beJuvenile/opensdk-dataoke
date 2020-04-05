<?php
/**
 * 9.9包邮精选
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=15
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class NineGoodsListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/nine/op-goods-list';

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

    private $pageId;    // 请求的页码，默认参数1

    private $pageSize;  // 每页显示的条数，默认20

    private $nineCid;   // 9.9精选的类目id，
                        // 分类id请求详情：-1-精选，1 -居家百货，2 -美食，3 -服饰，4 -配饰，5 -美妆，6 -内衣，
                        // 7 -母婴，8 -箱包，9 -数码配件，10 -文娱车品

    private $apiParams = [];


    public function setPageId($val)
    {
        $this->pageId = (string)$val;
        $this->apiParams['pageId'] = (string)$val;
    }

    public function setPageSize($val)
    {
        $this->pageSize = (int)$val;
        $this->apiParams['pageSize'] = (int)$val;
    }

    public function setNineCid($val)
    {
        $this->nineCid = (int)$val;
        $this->apiParams['nineCid'] = (int)$val;
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