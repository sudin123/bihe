{!! Form::open(array('route' => 'categories.store',  'method' => 'POST', 'role' => 'form',  'required' => 'required')) !!}
    <div class="form-group">
		{!! Form::label('Select Parent Category:') !!}
		{!! Form::select('parent_id',$categories->pluck('category_name','id')->toArray(), old('parent_id'), ['class'=>'select2 form-control select-category', 'placeholder'=>'Select Parent Category']) !!}
	</div>
	<div class="form-group {{$errors->has('category_name') ? 'has-error':''}}">
        {!! Form::label('category_name', 'Name') !!}
        {!! Form::text('category_name',old('category_name'), array('class' => 'form-control', 'placeholder' => 'Name','id'=>'category-title')) !!}
         @if ($errors->has('category_name'))
            <span class="help-block">
                <strong>{{ $errors->first('category_name') }}</strong>
            </span>
   		@endif
    </div>
    <div class="form-group">
	{!! Form::button("Save", array('class' => 'btn blue','type' => 'submit')) !!}
	</div>
{!! Form::close() !!}   