<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::textarea($name, $value, ['class' => 'form-control']) }}
    @include('components.forms.error', ['name' => $name])
    <span class="label label-{{ $errors->has($name) ? 'danger' : 'primary' }}">{{ title_case($name) }}</span>
</div>
