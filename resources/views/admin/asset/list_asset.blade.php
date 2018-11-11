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
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <div id="dataTableContainer" class="data-table-container table-responcive">
                    <table id="table_id" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset Title</th>
                            <th>Description</th>
                            <th>Added On</th>
                            <th>Modify</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( $assets->count() > 0)
                            @foreach($assets as $asset)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->description }}</td>
                                <td>{{ $asset->created_at }}</td>
                                <td>
                                    <button class="btn-info" data-id="" data-title="" data-description="" data-toggle="modal" data-target="#myModal">&nbsp;Edit&nbsp;</button>
                                </td>
                                <td>
                                    <button class="btn-danger delete-btn" data-cid="">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    <h4 class="label-info">No assets have been added uptill now</h4>
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
