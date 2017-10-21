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
            <h1>Manage Users
                <small>lists of all users</small>
            </h1>
        </div>
        <!-- BEGIN PAGE BREADCRUMBS -->
        <div class="breadcrumb-wrapper">
          {{-- <a href="{{route('user.password',$user->id)}}" class="btn btn-success">Change Password</a> --}}
        </div>
        <!-- END PAGE TITLE -->
    </div>
</div>
@endsection
@section('content')
<div class="page-content-inner">
    <div class="row">

        <div class="col-md-4">
            @if(Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-blue-ebonyclay"></i>
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">Manage Role</span>
                    </div>                   
                </div>
                <div class="portlet-body">
                    {!! Form::open(array('route' => ['assign.roles',$user->id], 'role' => 'form',  'required' => 'required')) !!}
                        @include('backend.users.partials.roles')
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-blue-ebonyclay"></i>
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">Update User</span>
                    </div>                   
                </div>
                <div class="portlet-body">

                {!! Form::open(array('route' => ['users.update',$user->id],  'method' => 'PUT', 'role' => 'form',  'required' => 'required')) !!}

                    <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email',$user->email, array('class' => 'form-control','disabled', 'placeholder' => 'Enter Email Address')) !!}
                         @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('username') ? 'has-error':''}}">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name',$user->name, array('class' => 'form-control', 'placeholder' => 'Enter Username')) !!}
                     @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    </div>

            {{--     <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::text('password',NULL, array('class' => 'form-control', 'placeholder' => 'Enter Password')) !!}
                     @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('c_password', 'Confirm Password') !!}
                    {!! Form::text('c_password',NULL, array('class' => 'form-control', 'placeholder' => 'Confirm Password')) !!}
                </div>
 --}}

                    <div class="form-group">
                    {!! Form::button("Update", array('class' => 'btn blue','type' => 'submit')) !!}
                    </div>


                {!! Form::close() !!}
                         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('/admin/assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endpush