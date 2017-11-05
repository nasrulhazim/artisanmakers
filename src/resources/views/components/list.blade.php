<div class="container">
		<div class="panel panel-default">
		    <div class="panel-heading">
		      <h4><span class="glyphicon glyphicon-list"></span>&nbsp;{{ title_case(str_singular($route)) }} List
				<div class="pull-right">
					<a href="{{ route($route . '.create') }}"
						class="btn btn-success pull-right"
						data-toggle="tooltip" data-placement="top"
				        title="New Record">
						<span class="glyphicon glyphicon-plus"></span>
					</a>
				</div>
		      </h4>
		    </div>
		    <div class="panel-body">

				@if($appends)
					{{ $resources->appends($appends)->links() }}
				@else
					{{ $resources->links() }}
				@endif

				<div class="table-responsive">
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							@foreach($headings as $heading)
								<th>{{ $heading['label'] }}</th>
							@endforeach
							<th class="col-md-3">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($resources as $resource)
							<tr>
								@foreach($headings as $heading)
									<td>{{ (strpos($heading['attr'],'_at') === false) ? str_limit($resource->{$heading['attr']}, 50) : $resource->{$heading['attr']}->diffForHumans() }}</td>
								@endforeach
								<td>
									@include('components.actions', ['route' => $route, 'resource' => $resource])
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>

				@if($appends)
					{{ $resources->appends($appends)->links() }}
				@else
					{{ $resources->links() }}
				@endif
		</div>
	</div>
</div>
