@extends('admin.layout.main')

@section('page-title')
    Asset Groups
@endsection
@section('page-content')
    <div class="p-table">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1>All Asset Groups <i class="fa fa-object-group" aria-hidden="true"></i></h1>
                <label>Assets Groups that you have added uptill now</label>
                <hr />
            </div>
            <div class="col-xs-12 col-sm-4 text-center">
                <a href="{{ route('add-asset-group') }}">
                    <button type="button" class="btn btn-primary margin-top-20">
                        <i class="fa fa-plus"></i>
                        Add New Asset Group
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                @include('admin.layout.partials.message')
                <div id="dataTableContainer" class="data-table-container table-responcive">
                    <table id="table_id" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Input Rate</th>
                            <th>Initial Allowance</th>
                            <th>Annual Allowance</th>
                            <th>Investment Allowance</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( $assetGroups->count() > 0)
                            @foreach($assetGroups as $assetGroup)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $assetGroup->title }}</td>
                                    <td>{{ $assetGroup->dep_input_percentage }}%</td>
                                    <td>{{ $assetGroup->ca_initial_allowance_percentage }}%</td>
                                    <td>{{ $assetGroup->ca_annual_allowance_percentage }}%</td>
                                    <td>{{ $assetGroup->ca_investment_allowance_percentage }}%</td>
                                    <td>{{ $assetGroup->created_at }}</td>
                                    <td>{{ $assetGroup->created_at }}</td>
                                    <td>
                                        <a href="{{ route('edit-asset-group', [
                                            'category' => $assetGroup
                                        ]) }}">
                                            <button class="btn-info" onclick="">&nbsp;Edit&nbsp;</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('delete-asset-group', [
                                            'category' => $assetGroup
                                        ]) }}">
                                            <button class="btn-danger delete-btn" data-cid="">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h4 class="label-info">No asset groups have been added uptill now</h4>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additional-scripts')
    <script src="{{ asset('js/datatables.min.js') }}" type="text/javascript"></script>
    @include('admin.layout.partials.datatables')
@endsection
