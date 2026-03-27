<div class="form-button-action">
    <a class="btn btn-link btn-primary btn-lg" href="{{ route('administrator-roles.edit', $row->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <button type="button" class="btn btn-link btn-danger"
        onclick="action_destroy(
        '{{ route('administrator-roles.destroy', $row->id) }}', 
        '{{ $row->name }}'
    )">
        <i class="fa fa-times"></i>
    </button>
</div>
