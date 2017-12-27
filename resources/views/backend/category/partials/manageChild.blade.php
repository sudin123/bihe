
@foreach($children as $child)
	<tr>
		<td class="highlight">
			<div class="info"></div>&nbsp; &nbsp; &nbsp; &nbsp;{{$child->category_name }}
		</td>
	    <td>
	    <div class="btn-group btn-group-sm btn-group-solid">
	         <a href="{{route('categories.edit',$child->id)}}" class='btn blue btn-outline'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	         {!! Form::open(array('route' => ['categories.destroy',$child->id],  'method' => 'DELETE', 'role' => 'form',  'required' => 'required','class'=>'delete-form')) !!}
	        	{!! Form::button('<i class="fa fa-trash"></i>', array('class' => 'btn red btn-outline delete-btn','type' => 'submit')) !!}
	         {!! Form::close()!!}

	    </div>
        </td>
	</tr>
@endforeach
