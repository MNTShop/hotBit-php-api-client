<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:44 AM
 */

namespace Bg\Sdk\Example;

use Bg\Sdk\Application;
use Bg\Sdk\Request\AssetListRequest;
use Bg\Sdk\Request\WithdrawRequest;

class AssetListExample
{
    public static function sendRequest()
    {
        $timeData = ServerTimeExample::sendRequest();
        $timeData = json_decode($timeData,true);

        $request = new AssetListRequest();
        $request->coinType = "BTC";
        $request->assetType = "spot";

        $apiKey = 'f0e7ee3458dd24720a19d7c0342c2222';
        $secretKey = '70ed6ff617f9fbff43f547491b680d1f847d9a877915469523371d10d0a93c46';
        $msgNo = 'msgNo';
        $timestamp = $timeData["timestamp"];
        $client = new Application($apiKey, $secretKey, $msgNo, $timestamp);
        return $client->execute($request);
    }
}