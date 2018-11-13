<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\Http\Services\AssetService;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AssetService $assetService)
    {
        $assets = $assetService->getAllAssets();
        return view('admin.asset.list_asset')->with([
            'assets' => $assets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::select(
            'id', 'title', 'dep_input_percentage',
            'ca_initial_allowance_percentage', 'ca_annual_allowance_percentage',
            'ca_investment_allowance_percentage'
        )
            ->get();

        return view('admin.asset.add_asset')->with([
            'categories' => $allCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AssetService $assetService)
    {
        $message = 'Failed to add the asset to the assets table';
        $alertType = 'danger';

        if($assetService->saveNewAsset($request)) {
            $message = 'Successfully added the new asset to assets table';
            $alertType = 'success';
        }

        return redirect()->route('list-assets')->with([
            'message' => $message,
            'alert_type' => $alertType
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset, AssetService $assetService)
    {
        $message = $assetService->deleteAsset($asset);
        return redirect()->route('list-assets')->with([
            'message' => $message
        ]);
    }
}
