<?php
/**
 * 品牌库
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=17
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class BrandListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/tb-service/get-brand-list';

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
    public $version = 'v1.1.1';

    private $pageId;    // 页码

    private $pageSize;  // 每页条数 默认20条

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

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['version'] = $this->version;

        return $this->apiParams;
    }

}