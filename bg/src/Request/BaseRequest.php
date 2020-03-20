<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:10 AM
 */

namespace Bg\Sdk\Request;


abstract class BaseRequest implements RequestInterface
{

    protected $method;

    protected $path;

    protected $isNeedSign;

    public function getMethod()
    {
        return $this->method;
    }

    public abstract function getParams();

    public function getPath()
    {
        return $this->path;
    }

    public function isNeedSign()
    {
        return $this->isNeedSign;
    }
}