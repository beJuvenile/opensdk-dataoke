<?php
/**
 * 各大榜单API
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=6
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class RankingListRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/goods/get-ranking-list';

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
    public $version = 'v1.1.2';

    private $rankType;      // 榜单类型 1.实时榜 2.全天榜 3.热推榜（热推榜分类无效）4.复购榜

    private $cid;           // 大淘客一级类目id 仅对实时榜单、全天榜单有效

    private $apiParams = [];



    public function setRankType($val)
    {
        $this->rankType = (int)$val;
        $this->apiParams['rankType'] = (int)$val;
    }

    public function setCid($id)
    {
        $this->cid = (int)$id;
        $this->apiParams['cid'] = (int)$id;
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