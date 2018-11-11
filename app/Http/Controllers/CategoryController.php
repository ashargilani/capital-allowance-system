<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryService $categoryService)
    {
        $allAssetGroups = $categoryService->getAllAssetsGroups();

        return view('admin.category.list_assets_group')->with([
            'assetGroups' => $allAssetGroups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_asset_group');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, CategoryService $categoryService)
    {
        $categoryService->addAssetGroup($request);

        return redirect()->route('list-assets-group')->with([
            'message' => 'Asset group has been added successfully'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.add_asset_group')->with([
            'assetGroup' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @param CategoryService $categoryService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category, CategoryService $categoryService)
    {
        $categoryService->updateAssetGroup($request, $category);

        return redirect()->route('list-assets-group')->with([
            'message' => 'Asset group has been successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category, CategoryService $categoryService)
    {
        $categoryService->deleteAssetGroup($category);
        return redirect()->route('list-assets-group')->with([
            'message' => 'The asset group has been successfully deleted !'
        ]);
    }
}
