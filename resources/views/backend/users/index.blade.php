@extends('backend.layouts.app')
@section('title') Users @endsection
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
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    {{-- <a href="{{route('dashboard')}}">Dashboard</a> --}}
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>All users</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE TITLE -->
    </div>
</div>
<!-- END PAGE HEAD-->
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
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">Add New User</span>
                    </div>                    
                </div>
                <div class="portlet-body">

                {!! Form::open(array('route' => 'users.store',  'method' => 'POST', 'role' => 'form',  'required' => 'required')) !!}

                    {{-- <div class="form-group">
                    {!! Form::label('Category:') !!}
                {!! Form::select('role_id',$roles, old('role_id'), ['class'=>'select2 form-control select-role', 'placeholder'=>'Select Role']) !!}
                    </div> --}}

                     <div class="form-group {{$errors->has('name') ? 'has-error':''}}">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name',NULL, array('class' => 'form-control', 'placeholder' => 'Enter Username')) !!}
                     @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>

                <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email',NULL, array('class' => 'form-control', 'placeholder' => 'Enter Email Address')) !!}
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
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


                    <div class="form-group">
                    {!! Form::button("Save", array('class' => 'btn blue','type' => 'submit')) !!}
                    </div>
                {!! Form::close() !!}
                         
                </div>
            </div>
            
        </div>
        <div class="col-md-8">
             <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-blue-ebonyclay"></i>
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">All Users
                        </span>
                    </div>
                    {{-- <div class="actions">
                            <a class="btn btn-danger" href=""><i class="fa fa-plus"></i>Assign Roles</a>
                    </div> --}}
                    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr class="uppercase">
                                <th> #</th>
                                <th><strong>Full Name</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Roles</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($users as $key=>$user)
                                     <tr>
                                     <td>{{++$key}}</td>
                                     <td>{{$user->name}}</td>
                                     <td>{{$user->email}}</td>

                                     <td>@foreach($user->roles as $role)
                                     {{$role->role}},
                                     @endforeach
                                     </td>

                                    <td> 
                                    <div class="btn-group btn-group-sm btn-group-solid">
                                         <a href="{{route('users.edit',$user->id)}}" class='btn blue btn-outline'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                         {!! Form::open(array('route' => ['users.destroy',$user->id],  'method' => 'DELETE', 'role' => 'form',  'required' => 'required','class'=>'delete-form')) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', array('class' => 'btn red btn-outline delete-btn','type' => 'submit')) !!}
                                         {!! Form::close()!!}
                                             
                                    </div>
                                    </tr>
                                 @endforeach

                            </tbody>
                        </table>

                    </div>
                     <center>{!! $users->links() !!}</center>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $('.select2').select2({placeholder: $(this).attr('placeholder')});
        $('body').find('.remove').removeClass('hide');
        $('.add-new-repeater').click(function () {
            repeatBlock(appendClass = ".repeater-form", appendTo = ".form-body");
            disableSelected();
        });
</script>
@endpush