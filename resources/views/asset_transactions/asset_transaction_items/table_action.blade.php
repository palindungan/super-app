<div class="form-button-action">
    <button type="button" class="btn btn-link btn-primary btn-lg"
        onclick="editAction(
            $('#fields_form'), $('#fields_modal'),
            '{{ route('asset_transactions.asset_transaction_items.update', [$row->asset_transaction_id, $row->id]) }}'
        )">
        <i class="fa fa-edit"></i>
    </button>
    <button type="button" class="btn btn-link btn-danger"
        onclick="destroyAction(
            '{{ route('asset_transactions.asset_transaction_items.destroy', [$row->asset_transaction_id, $row->id]) }}', 
            'Detail {{ $row->id }}'
        )">
        <i class="fa fa-times"></i>
    </button>
</div>
