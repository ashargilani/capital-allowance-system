<?php

namespace App\Http\Services;

use App\Asset;
use Illuminate\Http\Request;

/**
 * Class AssetService
 * @package App\Http\Services
 */
class AssetService
{
    private $asset;

    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllAssets() {
        return $this->asset::all();
    }

    /**
     * @param Request $request
     */
    public function saveNewAsset(Request $request)
    {
        $asset = new Asset();
        $asset->name = $request->input['name'];
        $asset->description = $request->input['description'];
        $asset->save();
        dd($asset);
        return true;
    }
}
