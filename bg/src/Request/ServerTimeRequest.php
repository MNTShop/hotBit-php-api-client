<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:03 AM
 */

namespace Bg\Sdk\Request;

class ServerTimeRequest extends BaseRequest
{

    protected $path = "/serverTime";

    protected $method = "GET";

    protected $isNeedSign = false;

    public function getParams()
    {
        return [];
    }
}