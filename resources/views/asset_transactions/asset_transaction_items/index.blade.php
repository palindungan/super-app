@include('components.resources.assets.v1.index')

@push('scripts')
    @include('components.validation.script')
@endpush

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Detail</h4>
                    <button class="btn btn-primary btn-round ms-auto"
                        onclick="createAction($('#fields_form'), $('#fields_modal'))">
                        <i class="fa fa-plus"></i>
                        Buat Detail
                    </button>
                </div>
            </div>
            <div class="card-body">
                @include('asset_transactions.asset_transaction_items.table')
            </div>
        </div>
    </div>
</div>

@include('asset_transactions.asset_transaction_items.fields')

@include('components.resources.assets.v1.simple_modal_create', [
    'url' => route('asset_transactions.asset_transaction_items.store', $asset_transaction->id),
])
@include('components.resources.assets.v1.simple_modal_destroy')
@include('components.resources.assets.v1.simple_modal_edit')
@include('components.resources.assets.v1.simple_modal_show')
@push('scripts')
    <script>
        function editInput($form, response) {
            const data = response.data;
            $.each(data, function(key, value) {
                const $field = $form.find('[id="' + key + '"]');

                if (!$field.length) return;

                // jika input type file jangan diisi
                if ($field.attr('type') === 'file') {
                    return;
                }

                if ($field.attr('type') === 'checkbox') {
                    $field.prop('checked', value == 1 || value === true);
                } else {
                    $field.val(value);
                }
            });

            editTitleData(data);
        }
    </script>
    <script>
        function editTitleData(data) {
            $('#edit_title_data').text(data.code);
        }
    </script>
@endpush
