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
        $newAsset = [
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'month_year_of_purchase' => $request->input('month_year_of_purchase'),
            'months_used_in_purchased_disposed_year' => '12',
            'description' => $request->input('description'),
            'no_of_assets_purchased' => $request->input('no_of_assets_purchased'),
            'purchase_cost' => $request->input('purchase_cost'),
            'annual_depreceation' => $request->input('annual_depreceation'),
            'initial_allowance' => $request->input('initial_allowance'),
            'annual_allowance' => $request->input('annual_allowance'),
            'investment_allowance' => '0.00'
        ];

        if ($this->asset::create($newAsset)) {
            return true;
        }

        return false;
    }

    public function deleteAsset(Asset $asset)
    {
        try{
            $asset->delete();
            $message = 'Asset has been successfully deleted !';
        }
        catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return $message;
    }
}
