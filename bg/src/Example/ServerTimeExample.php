<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:44 AM
 */

namespace Bg\Sdk\Example;

use Bg\Sdk\Application;
use Bg\Sdk\Request\ServerTimeRequest;

class ServerTimeExample
{
    public static function sendRequest()
    {
        $request = new ServerTimeRequest();
        $client = new Application();
        return $client->execute($request);
    }
}