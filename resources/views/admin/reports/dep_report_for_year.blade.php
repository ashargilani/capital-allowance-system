@extends('admin.layout.main')

@section('page-title')
    Depreciation Report
@endsection
@section('page-content')
    <div class="p-table">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h1>Depreciation Report <i class="fa fa-th-list" aria-hidden="true"></i></h1>
                <label>Please choose the year and asset-group for depreciation report</label>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="{{ route('get-dep-report') }}">
                {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="report-year">Select Year:</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="report_year" id="report-year" required>
                                <option value="0" selected disabled>Select Year:</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <button class="btn btn-primary pull-right" type="submit">
                                <i class="fa fa-print"> </i>
                                Get-Report
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                @include('admin.layout.partials.message')
                <div id="dataTableContainer" class="data-table-container table-responcive">
                    <table id="table_id" class="table table-striped">
                        @if(isset($reportYear) && isset($depreciationReportData))
                        <thead>
                        <tr>
                            <th>{{ $reportYear }}</th>
                            @foreach($depreciationReportData as $assetGroup)
                                <th>{{ $assetGroup->title }}</th>
                            @endforeach
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Asset Cost :</th>
                            @php ($sum = 0)
                            @foreach($depreciationReportData as $assetGroup)
                                @php($sum += $assetGroup->asset->sum('purchase_cost'))
                                <td>{{ $assetGroup->asset->sum('purchase_cost') }}</td>
                            @endforeach
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr>
                            <td>Addition Year :</td>
                            @foreach($depreciationReportData as $assetGroup)
                                <td>-</td>
                            @endforeach
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Total Cost :</td>
                            @php ($sum = 0)
                            @foreach($depreciationReportData as $assetGroup)
                                @php($sum += $assetGroup->asset->sum('purchase_cost'))
                                <td>{{ $assetGroup->asset->sum('purchase_cost') }}</td>
                            @endforeach
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr>
                            <th>Depreciation For Year :</th>
                            @php ($sum = 0)
                            @foreach($depreciationReportData as $assetGroup)
                                @php($sum += $assetGroup->asset->sum('annual_depreceation'))
                                <td>{{ $assetGroup->asset->sum('annual_depreceation') }}</td>
                            @endforeach
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr>
                            <th>Total Depreciation :</th>
                            @php ($sum = 0)
                            @foreach($depreciationReportData as $assetGroup)
                                @php($sum += $assetGroup->asset->sum('annual_depreceation'))
                                <td>{{ $assetGroup->asset->sum('annual_depreceation') }}</td>
                            @endforeach
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr>
                            <th>NBV Current Year :</th>
                            @php($sumOfNbv = 0)
                            @php($nbv = 0)
                            @foreach($depreciationReportData as $assetGroup)
                                @php($nbv = $assetGroup->asset->sum('purchase_cost') - $assetGroup->asset->sum('annual_depreceation'))
                                @php($sumOfNbv += $nbv)
                                <td>{{ $nbv }}</td>
                            @endforeach
                            <td>{{ $sumOfNbv }}</td>
                        </tr>
                        </tbody>
                        @else
                        <thead>
                        <tr>
                            <td colspan="13" class="text-center">
                                <h4 class="label-info">Please select year to get report !</h4>
                            </td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additional-scripts')
    <script src="{{ asset('js/datatables.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var startYear = 2000;
            var endYear = (new Date()).getFullYear();

            while(startYear < endYear) {
                $('#report-year').append('<option value="'+startYear+'">'+startYear+'</option>');
                startYear++;
            }
        });
    </script>
    @include('admin.layout.partials.datatables')
@endsection
