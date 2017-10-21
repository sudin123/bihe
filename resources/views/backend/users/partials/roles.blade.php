<div class="icheck-list">
    <label>
    {!! Form::checkbox('admin',1,in_array('admin', $roles) ? 'checked' : '',['class'=>'icheck'] ) !!} Administrator
    </label>

    <label>
    {!! Form::checkbox('editor',2,in_array('editor', $roles) ? 'checked' : '',['class'=>'icheck']) !!} Editor
    </label>

    <label>
    {!! Form::checkbox('admanager',3,in_array('admanager', $roles) ? 'checked' : '',['class'=>'icheck']) !!} AdManager
    </label>

    <label>
    {!! Form::checkbox('developer',4,in_array('developer', $roles) ? 'checked' : '',['class'=>'icheck']) !!} Developer
    </label>

    <div class="form-group">
    {!! Form::button("Update", array('class' => 'btn blue','type' => 'submit')) !!}
    </div>
</div>