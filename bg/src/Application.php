<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 10:51 AM
 */

namespace Bg\Sdk;

use Bg\Sdk\Request\BaseRequest;
use Bg\Sdk\Utils\CurlUtil;

class Application
{
    private $baseEndpoint = "https://global-openapi.bithumb.pro/openapi/v1";

    private $apiKey;

    private $msgNo;

    private $timestamp;

    private $secretKey;

    public function __construct($apiKey = '', $secretKey = '', $msgNo = '', $timestamp = 0)
    {
        $this->apiKey = $apiKey;
        $this->msgNo = $msgNo;
        $this->timestamp = $timestamp;
        $this->secretKey = $secretKey;
    }

    public function execute(BaseRequest $request)
    {
        $params = $request->getParams();

        if ($request->isNeedSign()) {
            $params["apiKey"] = $this->apiKey;
            $params["msgNo"] = $this->msgNo;
            $params["timestamp"] = $this->timestamp;
            $params["signature"] = $this->genSignature($params);
        }

        if ($request->getMethod() == "POST") {
            $params = json_encode($params);
        } else {
            $params = http_build_query($params);
        }

        $url = $this->baseEndpoint . $request->getPath();
        $curl = new CurlUtil();
        return $curl->request($request->getMethod(), $url, $params);
    }

    public function genSignature($params)
    {
        ksort($params);
        $str = http_build_query($params);
        $sign = hash_hmac("sha256", $str, $this->secretKey, false);
        return $sign;
    }

}