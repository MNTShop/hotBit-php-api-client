<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:03 AM
 */

namespace Bg\Sdk\REST\Request\Spot;
use Bg\Sdk\REST\RESTRequest;


class CancelOrderRequest extends RESTRequest
{

    protected $path = "/spot/cancelOrder";

    protected $method = "POST";

    protected $isNeedSign = true;

    public $orderId;
    public $symbol;

    public function __construct(string $orderId,string $symbol)
    {
        $this->symbol = $symbol;
        $this->orderId = $orderId;
    }

    public function getParams():array
    {
        return [
            "orderId" => $this->orderId,
            "symbol" => $this->symbol
        ];
    }

}