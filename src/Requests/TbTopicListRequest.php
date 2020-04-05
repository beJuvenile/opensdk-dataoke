<?php
/**
 * 官方活动推广
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=24
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/4/5
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class TbTopicListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/category/get-tb-topic-list';

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

    private $pageId;    // 分页id 支持传统的页码分页方式

    private $pageSize;  // 每页条数 默认20

    private $type;      // 端口类型 输出的端口类型：0.全部（默认），1.PC，2.无线

    private $channelID; // 渠道ID 阿里妈妈上申请的渠道id

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

    public function setType($val)
    {
        $this->type = (int)$val;
        $this->apiParams['type'] = (int)$val;
    }

    public function setChannelID($val)
    {
        $this->channelID = (string)$val;
        $this->apiParams['channelID'] = (string)$val;
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