<?php

namespace App\Http\Services;


use App\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryService
 * @package App\Http\Services
 */
class CategoryService
{
    /**
     * @var Category
     */
    private $assetGroup;

    /**
     * CategoryService constructor.
     * @param Category $assetGroup
     */
    public function __construct(Category $assetGroup)
    {
        $this->assetGroup = $assetGroup;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllAssetsGroups()
    {
        return $this->assetGroup::all();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function addAssetGroup(Request $request)
    {
        Category::create([
            'title' => $request->input('title'),
            'dep_input_percentage' => floatval($request->input('dep_input_percentage')),
            'ca_initial_allowance_percentage' => floatval($request->input('ca_initial_allowance_percentage')),
            'ca_annual_allowance_percentage' => floatval($request->input('ca_annual_allowance_percentage')),
            'ca_investment_allowance_percentage' => floatval($request->input('ca_investment_allowance_percentage'))
        ]);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function saveNewAsset(Request $request)
    {
        $asset = new Category();
        $asset->name = $request->input['name'];
        $asset->description = $request->input['description'];
        $asset->save();

        return true;
    }

    /**
     * @param Request $request
     * @param Category $category
     */
    public function updateAssetGroup(Request $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->dep_input_percentage = $request->input('dep_input_percentage');
        $category->ca_initial_allowance_percentage = $request->input('ca_initial_allowance_percentage');
        $category->ca_annual_allowance_percentage = $request->input('ca_annual_allowance_percentage');
        $category->ca_investment_allowance_percentage = $request->input('ca_investment_allowance_percentage');
        $category->save();
    }

    /**
     * @param Category $category
     * @return string
     * @throws \Exception
     */
    public function deleteAssetGroup(Category $category)
    {
        try{
            $category->delete();
            $message = 'Asset group has been successfully deleted !';
        }
        catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return $message;
    }
}
