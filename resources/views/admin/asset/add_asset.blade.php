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
                    <div class="form-group">
                        <label for="asset-name">Asset Name:</label>
                        <input type="text" class="form-control" name="name" id="asset-name" placeholder="e.g: Cars" required>
                        <label class="error"></label>
                    </div>
                    <div class="form-group">
                        <label for="asset-description">Asset Description:</label>
                        <textarea class="form-control" name="description" id="asset-description" placeholder="Please enter a short description of category here...."></textarea>
                        <label class="error"></label>
                    </div>
                    <button type="submit" name="add-asset" class="btn btn-primary">Add Asset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
