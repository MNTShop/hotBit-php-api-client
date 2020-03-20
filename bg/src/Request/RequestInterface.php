<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:01 AM
 */

namespace Bg\Sdk\Request;


interface RequestInterface
{

    public function getPath();

    public function getMethod();

    public function getParams();
}