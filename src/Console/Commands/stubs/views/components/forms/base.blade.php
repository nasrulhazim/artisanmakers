<div class="panel panel-default">
    <div class="panel-heading">
      <h4><span class="glyphicon glyphicon-user"></span>&nbsp;Edit User</h4>
    </div>
    <div class="panel-body">
		{!! Form::open($options) !!}
			{!! Form::token() !!}
			@if($options['_method'] && $options['_method'] == 'PUT')
				{{ method_field($options['_method']) }}
			@endif
		    @yield('form-components')
		{!! Form::close() !!}
	</div>
</div>
