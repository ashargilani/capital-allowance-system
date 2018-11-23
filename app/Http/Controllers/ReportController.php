<?php

namespace App\Http\Controllers;


use App\Http\Services\CategoryService;
use App\Http\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getDepreciationReport(Request $request, ReportService $reportService, CategoryService $categoryService)
    {
        $categories = $categoryService->getAllAssetsGroups();
        $depreciationReportData = $reportService->getDepreciationReportForYearAndGroup($request);
        $reportYear = $request->input('report_year');
        return view('admin.reports.dep_report_for_year')->with([
            'categories' => $categories,
            'depreciationReportData' => $depreciationReportData,
            'reportYear' => $reportYear
        ]);
    }

    public function depreciationReportIndex(CategoryService $categoryService)
    {
        $categories = $categoryService->getAllAssetsGroups();

        return view('admin.reports.dep_report_for_year')->with([
            'categories' => $categories
        ]);
    }
}