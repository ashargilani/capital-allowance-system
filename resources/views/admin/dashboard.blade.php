@extends('admin.layout.main')

@section('page-title')
    Capital Allowance System - Dashboard
@endsection
@section('page-content')
    <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4>Dashboard information and statistics <i class="fa fa-dashboard fa-2x" aria-hidden="true"></i></h4>
            </div>
            <div class="panel-body">
                <div class="row box">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 dashboard-align">
                        <div class="well">
                            <p>
                                <span style="font-size:3.0em;"><?php echo "100"; ?></span><br />
                                <b>BRANDS</b>
                                <br />
                                <i class="fa fa-tag dashboard-values"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 dashboard-align">
                        <div class="well">
                            <p>
                                <span style="font-size:3.0em;"><?php echo "200"; ?></span><br />
                                <b>Categories</b>
                                <br>
                                <i class="fa fa-sitemap dashboard-values"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 dashboard-align">
                        <div class="well">
                            <p>
                                <span style="font-size:3.0em;"><?php echo "200"; ?></span><br />
                                <b>PRODUCTS</b>
                                <br>
                                <i class="fa fa-cubes dashboard-values"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 dashboard-align">
                        <div class="well">
                            <p>
                                <span style="font-size:3.0em;"><?php echo  "500"; ?></span><br />
                                <b>SALES TODAY</b>
                                <br>
                                <i class="fa fa-money dashboard-values"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
    <!-- #Panel Group -->
@endsection
