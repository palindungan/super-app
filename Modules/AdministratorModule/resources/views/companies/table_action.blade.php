<div class="form-button-action">
    @can('administrator.companies.edit')
        <a class="btn btn-link btn-primary btn-lg" href="{{ route('administrator.companies.edit', $row->id) }}">
            <i class="fa fa-edit"></i>
        </a>
    @endcan
    @can('administrator.companies.destroy')
        <button type="button" class="btn btn-link btn-danger"
            onclick="destroyAction(
            '{{ route('administrator.companies.destroy', $row->id) }}', 
            'Perusahaan {{ $row->name }}'
        )">
            <i class="fa fa-times"></i>
        </button>
    @endcan
</div>
