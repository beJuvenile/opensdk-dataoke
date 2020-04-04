<?php
/**
 * 高效转链
 *
 * @link: http://www.dataoke.com/pmc/api-d.html?id=7
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 21:01
 */
namespace OpenSDK\DaTaoKe\Requests;

use OpenSDK\DaTaoKe\Interfaces\Request;

class PrivilegeLinkRequest implements Request
{

    /**
     * 接口
     *
     * @var string
     */
    public $method = '/tb-service/get-privilege-link';

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

    private $goodsId;       // 淘宝商品id

    private $couponId;      // 优惠券ID
                            // 一个商品在联盟可能有多个优惠券，可通过填写该参数的方式选择使用的优惠券，请确认优惠券ID正确，否则无法正常跳转

    private $pid;           // 推广位ID 用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid

    private $channelId;     // 渠道id 渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的

    private $apiParams = [];



    public function setGoodsId($val)
    {
        $this->goodsId = (string)$val;
        $this->apiParams['goodsId'] = (int)$val;
    }

    public function setCouponId($val)
    {
        $this->couponId = (string)$val;
        $this->apiParams['couponId'] = (string)$val;
    }

    public function setPid($val)
    {
        $this->pid = (string)$val;
        $this->apiParams['pid'] = (string)$val;
    }

    public function setChannelId($val)
    {
        $this->channelId = (string)$val;
        $this->apiParams['channelId'] = (string)$val;
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