<div class="btn-group">
    <a href="{{ route($route.'.show', ['id' => $resource->id]) }}"
        class="btn btn-default"
        data-toggle="tooltip" data-placement="top"
        title="Details">
        <span class="glyphicon glyphicon-search"></span>
    </a>

    <a href="{{ route($route.'.edit', ['id' => $resource->id]) }}"
        class="btn btn-primary"
        data-toggle="tooltip" data-placement="top"
        title="Edit">
        <span class="glyphicon glyphicon-pencil"></span>
    </a>

    <a href="{{ route($route.'.destroy', ['id' => $resource->id]) }}"
        class="btn btn-danger"
        data-toggle="tooltip" data-placement="top"
        title="Delete"
        onclick="event.preventDefault();
                if(confirm('{!! $confirm or 'Are you sure want to delete this record?' !!}')){document.getElementById('action-resource-form-{{ $resource->id }}').submit();}">
        <span class="glyphicon glyphicon-trash"></span>
    </a>

    <form id="action-resource-form-{{ $resource->id }}"
        action="{{ route($route.'.destroy', ['id' => $resource->id]) }}"
        method="POST" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>

</div>
