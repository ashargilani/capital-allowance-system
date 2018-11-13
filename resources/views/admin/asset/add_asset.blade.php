@extends('admin.layout.main')

@section('page-title')
    All Assets
@endsection
@section('page-content')
    <div class="p-table">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1>Assets <i class="fa fa-th-list" aria-hidden="true"></i></h1>
                <label>Add a new asset to to store</label>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <form method="post" action="{{ route('save-asset') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="asset-group">Asset Group:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category" id="asset-group" required>
                                <option selected>Select Asset Group:</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" data-dep_input_percentage="{{ $category->dep_input_percentage }}" data-ca_initial_allowance_percentage="{{ $category->ca_initial_allowance_percentage }}" data-ca_annual_allowance_percentage="{{ $category->ca_annual_allowance_percentage }}" data-ca_investment_allowance_percentage="{{ $category->ca_investment_allowance_percentage }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="error">{{ $errors->has('category') ? $errors->first('category'): '' }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="asset-name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="asset-name" placeholder="e.g: Cars" required />
                        </div>
                        <label class="error">{{ $errors->has('category') ? $errors->first('category'): '' }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="month-year-of-purchase">Date/Month of purchase:</label>
                        <div class="col-sm-10">
                            <div class='input-group'>
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                                <input type='date' name="month_year_of_purchase" class="form-control" placeholder="MM/DD/YYY" required/>
                            </div>
                        </div>
                        <label class="error">{{ $errors->has('category') ? $errors->first('category'): '' }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="asset-description">Asset Description:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" id="asset-description" placeholder="Special Tables" required />
                        </div>
                        <label class="error">{{ $errors->has('category') ? $errors->first('category'): '' }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="assets-purchased">No of Assets purchased:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="no_of_assets_purchased" id="assets-purchased" placeholder="10" required />
                        </div>
                        <label class="error">{{ $errors->has('category') ? $errors->first('category'): '' }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="purchase-cost">Purchase Cost:</label>
                        <div class="col-sm-10">
                            <div class='input-group'>
                            <span class="input-group-addon">
                                <span class="fa fa-dollar"></span>
                            </span>
                                <input type='number' id="purchase-cost" name="purchase_cost" class="form-control" placeholder="100" required/>
                            </div>
                        </div>
                        <label class="error">{{ $errors->has('category') ? $errors->first('category'): '' }}</label>
                    </div>
                    <fieldset>
                        <legend>Depreciation</legend>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="annual-depreceation">Annual Depreceation:</label>
                            <div class="col-sm-10">
                                <input type='number' id="annual-depreceation" name="annual_depreceation" class="form-control" placeholder="100" disabled />
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Capital Allowance</legend>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="initial-allowance">Initial Allowance:</label>
                            <div class="col-sm-10">
                                <input type='number' id="initial-allowance" name="initial_allowance" class="form-control" placeholder="100" disabled />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="annual-allowance">Annual Allowance:</label>
                            <div class="col-sm-10">
                                <input type='number' id="annual-allowance" name="annual_allowance" class="form-control" placeholder="100" disabled />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="investment-allowance">Investment Allowance:</label>
                            <div class="col-sm-10">
                                <input type='number' id="investment-allowance" name="investment_allowance" class="form-control" placeholder="100" disabled />
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" name="add-asset" class="btn btn-primary pull-right">Add Asset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('additional-scripts')
<script type="text/javascript" src="{{ asset('js/form_input_scripts/add_new_asset.js') }}"></script>
@endsection    
