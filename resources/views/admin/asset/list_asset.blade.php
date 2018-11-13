@extends('admin.layout.main')

@section('page-title')
    All Assets
@endsection
@section('page-content')
    <div class="p-table">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1>All Assets <i class="fa fa-th-list" aria-hidden="true"></i></h1>
                <label>Assets that you have added uptill now</label>
                <hr />
            </div>
            <div class="col-xs-12 col-sm-4 text-center">
                <a href="{{ route('add-asset') }}">
                    <button type="button" class="btn btn-primary margin-top-20">
                        <i class="fa fa-plus"></i>
                        Add New Asset
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                @include('admin.layout.partials.message')
                <div id="dataTableContainer" class="data-table-container table-responcive">
                    <table id="table_id" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Month/Year of purchase</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Purchase Cost</th>
                            <th>Annual Depreceation</th>
                            <th>I.A</th>
                            <th>A.A</th>
                            <th>Investment Allowance</th>
                            <th>Added On</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( $assets->count() > 0)
                            @foreach($assets as $asset)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->month_year_of_purchase }}</td>
                                <td>{{ $asset->no_of_assets_purchased }}</td>
                                <td>{{ $asset->description }}</td>
                                <td>{{ $asset->purchase_cost }}</td>
                                <td>{{ $asset->annual_depreceation }}</td>
                                <td>{{ $asset->initial_allowance }}</td>
                                <td>{{ $asset->annual_allowance }}</td>
                                <td>{{ $asset->investment_allowance }}</td>
                                <td>{{ $asset->created_at }}</td>
                                <td>
                                    <button class="btn-info">Edit</button>
                                </td>
                                <td>
                                    <a href="{{ route('delete-asset', ['asset' => $asset]) }}">
                                        <button class="btn-danger delete-btn">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="13" class="text-center">
                                    <h4 class="label-info">No assets have been added uptill now !</h4>
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
    @include('admin.layout.partials.datatables')
@endsection
