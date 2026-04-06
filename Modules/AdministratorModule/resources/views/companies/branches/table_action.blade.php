<div class="form-button-action">
    <a class="btn btn-link btn-primary btn-lg"
        href="{{ route('administrator.companies.branches.edit', [$row->company_id, $row->id]) }}">
        <i class="fa fa-edit"></i>
    </a>
    <button type="button" class="btn btn-link btn-danger"
        onclick="destroyAction(
            '{{ route('administrator.companies.branches.destroy', [$row->company_id, $row->id]) }}', 
            'Cabang {{ $row->name }}'
        )">
        <i class="fa fa-times"></i>
    </button>
</div>
