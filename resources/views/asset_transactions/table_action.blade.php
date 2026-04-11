<div class="form-button-action">
    <a class="btn btn-link btn-primary btn-lg" href="{{ route('asset_transactions.edit', $row->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    <button type="button" class="btn btn-link btn-danger"
        onclick="destroyAction(
            '{{ route('asset_transactions.destroy', $row->id) }}', 
            'Peran {{ $row->name }}'
        )">
        <i class="fa fa-times"></i>
    </button>
</div>
