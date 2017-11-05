{!! Form::open($options) !!}
	{!! Form::token() !!}
	@if($options['_method'] == 'DELETE' || $options['_method'] == 'PUT')
		{{ method_field($options['_method']) }}
	@endif
    @yield('form-components')
{!! Form::close() !!}
