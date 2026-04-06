<div class="form-button-action">
    @can('administrator.roles.edit')
        <a class="btn btn-link btn-primary btn-lg" href="{{ route('administrator.roles.edit', $row->id) }}">
            <i class="fa fa-edit"></i>
        </a>
    @endcan
    @can('administrator.roles.destroy')
        <button type="button" class="btn btn-link btn-danger"
            onclick="destroyAction(
            '{{ route('administrator.roles.destroy', $row->id) }}', 
            'Peran {{ $row->name }}'
        )">
            <i class="fa fa-times"></i>
        </button>
    @endcan
</div>
