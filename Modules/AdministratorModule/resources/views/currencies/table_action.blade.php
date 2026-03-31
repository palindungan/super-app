<div class="form-button-action">
    <button type="button" class="btn btn-link btn-primary btn-lg"
        onclick="editAction(
        '{{ route('administrator-currencies.update', $row->id) }}'
    )">
        <i class="fa fa-edit"></i>
    </button>
    <button type="button" class="btn btn-link btn-danger">
        <i class="fa fa-times"></i>
    </button>
</div>
