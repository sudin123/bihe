@extends('backend.layouts.app')
@section('title') Dashboard @endsection
@section('content')
@section('content')
    <!-- END PAGE BREADCRUMBS -->
    <div class="page-content-inner">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="10">12</span>
                            </h3>
                            <small>Applicants</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn green btn-outline "><i class="fa fa-user"></i>Show All</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red">
                                <span data-counter="counterup" data-value="10">13</span>
                            </h3>
                            <small>Categories</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn red-mint btn-outline"><i class="fa fa-plus"></i> New Category</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="10">13</span>
                            </h3>
                            <small>Ads</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-secret"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn blue btn-outline"><i class="fa fa-plus"></i> New Ad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection