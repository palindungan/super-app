<div class="form-button-action">
    <button type="button" class="btn btn-link btn-primary btn-lg"
        onclick="editAction(
            '{{ route('asset_items.update', $row->id) }}'
        )">
        <i class="fa fa-edit"></i>
    </button>
    <button type="button" class="btn btn-link btn-danger"
        onclick="destroyAction(
            '{{ route('asset_items.destroy', $row->id) }}', 
            'Barang {{ $row->name }}'
        )">
        <i class="fa fa-times"></i>
    </button>
</div>
