<?php
/**
 * 联盟搜索
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=14
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class SuperGoodsRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/list-super-goods';

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

    private $type;      // 搜索类型 0-综合结果，1-大淘客商品，2-联盟商品

    private $pageId;    // 请求的页码，默认参数1

    private $pageSize;  // 每页显示的条数，默认20

    private $keyWords;  // 查询词 查询词不能为空

    private $tmall;     // 1-天猫商品，0-所有商品，不填默认为0

    private $haitao;    // 1-海淘商品，0-所有商品，不填默认为0

    private $sort;      // 排序字段信息 销量（total_sales） 价格（price），排序_des（降序），排序_asc（升序）

    private $apiParams = [];


    public function setType($val)
    {
        $this->type = (int)$val;
        $this->apiParams['type'] = (int)$val;
    }

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

    public function setKeyWords($val)
    {
        $this->keyWords = (string)$val;
        $this->apiParams['keyWords'] = (string)$val;
    }

    public function setTmall($val)
    {
        $this->tmall = (int)$val;
        $this->apiParams['tmall'] = (int)$val;
    }

    public function setHaitao($val)
    {
        $this->haitao = (int)$val;
        $this->apiParams['haitao'] = (int)$val;
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