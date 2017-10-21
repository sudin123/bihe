<div class="icheck-list">
    <label>
    {!! Form::checkbox('roles[]',1,in_array('admin', $roles) ? 'checked' : '',['class'=>'icheck'] ) !!} Administrator
    </label>

    <label>
    {!! Form::checkbox('roles[]',2,in_array('editor', $roles) ? 'checked' : '',['class'=>'icheck']) !!} Editor
    </label>

    <label>
    {!! Form::checkbox('roles[]',3,in_array('applicant', $roles) ? 'checked' : '',['class'=>'icheck']) !!} Applicant
    </label>

    <label>
    {!! Form::checkbox('roles[]',4,in_array('superadmin', $roles) ? 'checked' : '',['class'=>'icheck']) !!} Super Admin
    </label>

    <div class="form-group">
    {!! Form::button("Update", array('class' => 'btn blue','type' => 'submit')) !!}
    </div>
</div>