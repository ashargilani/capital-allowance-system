@extends('admin.layout.main')

@section('page-title')
    Asset Group
@endsection
@section('page-content')
    <div class="p-table">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1>Asset Group <i class="fa fa-th-list" aria-hidden="true"></i></h1>
                <label>
                    @if(isset($assetGroup))
                        Update the asset group
                    @else
                        Add a new asset group to store
                    @endif
                </label>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            @if(!isset($assetGroup->id))
                {!! Form::open(array('route' => 'store-asset-group')) !!}
            @else
                {!! Form::open(array('route' => array('update-asset-group', $assetGroup->id))) !!}
                {!! Form::hidden('_method','put') !!}
            @endif
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="asset-name">Asset Group Title:</label>
                        <input type="text" class="form-control" name="title" id="asset_group_title" placeholder="e.g: Plants & Machinery" required value="{{isset($assetGroup) ? $assetGroup->title : '' }}">
                        <label class="error">{{ $errors->has('title') ? $errors->first('title'): '' }}</label>
                    </div>
                    <fieldset>
                        <legend>Depreceation</legend>
                        <div class="form-group">
                            <label for="dep-input-percentage">Input Rate:</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="text" class="form-control" name="dep_input_percentage" id="dep-input-percentage" placeholder="20" required aria-describedby="basic-addon1" value="{{isset($assetGroup) ? $assetGroup->dep_input_percentage : '' }}">
                                <label class="error"></label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Capital Allowance</legend>
                        <div class="form-group">
                            <label for="ca-initial-allowance-percentage">Initial Allowance:</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="text" class="form-control" name="ca_initial_allowance_percentage" id="ca-initial-allowance-percentage" placeholder="50" required aria-describedby="basic-addon1" value="{{isset($assetGroup) ? $assetGroup->ca_initial_allowance_percentage : '' }}">
                                <label class="error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ca-annual-allowance-percentage">Annual Allowance:</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="text" class="form-control" name="ca_annual_allowance_percentage" id="ca-annual-allowance-percentage" placeholder="25" required aria-describedby="basic-addon1" value="{{isset($assetGroup) ? $assetGroup->ca_annual_allowance_percentage : '' }}">
                                <label class="error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ca-investment-allowance-percentage">Investment Allowance:</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="text" class="form-control" name="ca_investment_allowance_percentage" id="ca-investment-allowance-percentage" placeholder="10" aria-describedby="basic-addon1" value="{{isset($assetGroup) ? $assetGroup->ca_investment_allowance_percentage : '' }}">
                                <label class="error"></label>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" id="add-asset-group" class="btn btn-primary">{{ isset($assetGroup) ? 'Update Asset group' : 'Add Asset Group' }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
