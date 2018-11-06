<?php

namespace App\Http\Services;

use App\Asset;

class AssetService
{
    private $asset;

    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    public function getAllAssets() {
        return $this->asset::all();
    }
}
