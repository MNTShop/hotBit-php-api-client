<?php
/**
 * Created by PhpStorm.
 * User: qingyu.gou
 * Date: 2020/3/19
 * Time: 11:03 AM
 */

namespace Bg\Sdk\Request;


class AssetListRequest extends BaseRequest
{

    protected $path = "/spot/assetList";

    protected $method = "POST";

    protected $isNeedSign = true;

    public $coinType;

    public $assetType;

    public function getParams()
    {
        return [
            "coinType" => $this->coinType,
            "assetType" => $this->assetType
        ];
    }
}