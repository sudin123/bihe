@extends('backend.layouts.app')
@section('title') Categories @endsection
@section('heading')
 <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>All Categories
                    <small>lists of all Categories</small>
                </h1>
            </div>
            <!-- BEGIN PAGE BREADCRUMBS -->
            <div class="breadcrumb-wrapper">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>All Posts</span>
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
    <div>
        <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-blue-ebonyclay"></i>
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">Edit Category</span>
                    </div>
                    
                </div>
                <div class="portlet-body">
                {!! Form::open(array('route' => ['categories.update',$category->id],  'method' => 'PUT', 'role' => 'form',  'required' => 'required')) !!}
                            <div class="form-group">
                            {!! Form::label('Category:') !!}
                            {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'select2 form-control select-category', 'placeholder'=>'Select Category']) !!}
                        </div>

                        <div class="form-group {{$errors->has('category_name') ? 'has-error':''}}">
                            {!! Form::label('category_name', 'Category Name') !!}
                            {!! Form::text('category_name',$category->category_name, array('class' => 'form-control', 'placeholder' => 'Category Name')) !!}
                             @if ($errors->has('category_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                        {!! Form::button("Update", array('class' => 'btn blue','type' => 'submit')) !!}
                        </div>
                    {!! Form::close() !!}  
                    
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