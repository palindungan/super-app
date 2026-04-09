<div class="form-button-action">
    @can('administrator.currencies.edit')
        <button type="button" class="btn btn-link btn-primary btn-lg"
            onclick="editAction(
            $('#fields_form'), $('#fields_modal'),
            '{{ route('administrator.currencies.update', $row->id) }}'
        )">
            <i class="fa fa-edit"></i>
        </button>
    @endcan
    @can('administrator.currencies.destroy')
        <button type="button" class="btn btn-link btn-danger"
            onclick="destroyAction(
            '{{ route('administrator.currencies.destroy', $row->id) }}', 
            'Mata Uang {{ $row->name }}'
        )">
            <i class="fa fa-times"></i>
        </button>
    @endcan
</div>
