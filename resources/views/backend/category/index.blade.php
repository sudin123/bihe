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
                        {{-- <a href="{{route('dashboard')}}">Dashboard</a> --}}
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>All Categories</span>
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
        <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-blue-ebonyclay"></i>
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">Add New Category</span>
                    </div>
                </div>
                <div class="portlet-body">
                    {{-- form included in partials --}}
                    @include('backend.category.partials.create_form')
                </div>
            </div>
            
        </div>
        <div class="col-md-8">
        	 <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-blue-ebonyclay"></i>
                        <span class="caption-subject font-blue-ebonyclay sbold uppercase">All Categories
                        </span>
                    </div>
                    
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light table-advance">
                            <thead>
                            <tr class="uppercase">
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($categories as $key=>$category)
                                     <tr>
                                         <td><strong>{{$category->category_name}}</strong></td>
                                         <td>
                                             <div class="btn-group btn-group-sm btn-group-solid">
                                                 <a href="{{route('categories.edit',$category->id)}}" class='btn blue btn-outline'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                 {!! Form::open(array('route' => ['categories.destroy',$category->id],  'method' => 'DELETE', 'role' => 'form',  'required' => 'required','class'=>'delete-form')) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', array('class' => 'btn red btn-outline delete-btn','type' => 'submit')) !!}
                                                 {!! Form::close()!!}

                                             </div>
                                        </td>
                                    </tr>
                                    @if(count($category->childs))
                                        @include('backend.category.partials.manageChild',['children' => $category->childs])
                                    @endif
                                 @endforeach

                            </tbody>
                        </table>

                    </div>
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
        //on keyup, start the countdown
        $(document).on('mouseleave','#category-title', function () {
            doneTyping($(this).val())
        });

        
	</script>

@endpush