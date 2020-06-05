<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:44 AM
 */

namespace Bg\Sdk\WS\Examples;

use Bg\Sdk\BithumbGlobalClient;
use Bg\Sdk\WS\Interfaces\WSClientInterface;
use Bg\Sdk\WS\Streams\TickerStream;
use Bg\Sdk\WS\WSResponse;

class TopicTickerExample
{
    public static function Test()
    {
        $client = new BithumbGlobalClient();
        $client->subscribe(new TickerStream(
            'BIP-USDT',
            function (WSClientInterface $client,TickerStream $stream ,WSResponse $response) {
                if ($response->isError()) {
                    error_log(print_r($response,1));
                    $response->getCode(); //code of error
                    $response->getRaw(); //raw response
                    $client->unSubscribe($stream); //unsubscribe now and free space
                }
                if ($response->isNormal()) {
                    error_log(print_r( $response->getData(),1));
                    $response->getData(); //get all data
                    $response->getTopic(); //topic
                    $response->getTimestamp(); //timestamp
                    $client->unSubscribe($stream);
                }
            }));
    }

}