<?php
/**
 * 联想词
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=18
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class SearchSuggestionRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/search-suggestion';

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
    public $version = 'v1.0.2';

    private $keyWords;  // 查询词 查询词不能为空

    private $type;      // 当前搜索API类型：1.大淘客搜索 2.联盟搜索 3.超级搜索

    private $apiParams = [];


    public function setKeyWords($val)
    {
        $this->keyWords = (string)$val;
        $this->apiParams['keyWords'] = (string)$val;
    }

    public function setType($val)
    {
        $this->type = (int)$val;
        $this->apiParams['type'] = (int)$val;
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