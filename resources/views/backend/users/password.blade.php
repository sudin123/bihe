@extends('backend.layouts.app')
@section('title') Users @endsection

@push('styles')
    <link href="{{ asset('/admin/assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('heading')
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <div class="container">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Change Password
                <small>change your password</small>
            </h1>
        </div>
        <!-- BEGIN PAGE BREADCRUMBS -->

        <!-- END PAGE TITLE -->
    </div>
</div>
@endsection
@section('content')
<div class="page-content-inner">
    <div class="row">
	    <div class="col-md-6 col-sm-push-3">
	      <div class="portlet light portlet-fit ">
	                <div class="portlet-title">
	                    <div class="caption">
	                        <i class="icon-settings font-blue-ebonyclay"></i>
	                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">Change Password</span>
	                    </div>                   
	                </div>
	    		<div class="portlet-body">
				    	
				    	@if(Session::has('message'))
			            <p class="alert alert-danger">{{ Session::get('message') }}</p>
			            @endif

	    			{!!Form::open(['route'=>['update.password',$user->id],'method'=>'PUT'])!!}

	    			<div class="form-group {{$errors->has('password') ? 'has-error':''}}">

	                    {!! Form::label('password', 'Password') !!}
	                    {!! Form::text('password',NULL, array('class' => 'form-control', 'placeholder' => 'Enter Password')) !!}
	                     @if ($errors->has('password'))
	                        <span class="help-block">
	                            <strong>Password is required</strong>
	                        </span>
	                    @endif

               		</div>

	                <div class="form-group">
	                    {!! Form::label('c_password', 'Confirm Password') !!}
	                    {!! Form::text('c_password',NULL, array('class' => 'form-control', 'placeholder' => 'Confirm Password')) !!}
	                </div>

	                <div class="form-group">
                    	{!! Form::button("Change Password", array('class' => 'btn blue','type' => 'submit')) !!}
                    </div>



	    			{!!Form::close()!!}

	    		</div>	
	        </div>       
	    </div>
    </div>
</div>

@endsection