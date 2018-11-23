<?php

namespace App\Http\Services;

use App\Category;
use Illuminate\Http\Request;

class ReportService
{
    /**
     * @param Request $request
     * @return Category[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDepreciationReportForYearAndGroup(Request $request)
    {
        $reportYear = $request->input('report_year');
        $assetCosts = Category::with(['asset' => function($query) use ($reportYear) {
            $query->whereYear('month_year_of_purchase', $reportYear)
                ;
        }])->get();

        return $assetCosts;
    }
}