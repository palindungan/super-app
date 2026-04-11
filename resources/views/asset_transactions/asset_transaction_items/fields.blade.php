<div class="modal fade" id="fields_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="fields_form">
                @include('components.forms.data')
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="create_title">
                        <span class="fw-mediumbold">Buat</span>
                        <span class="fw-light">Detail</span>
                    </h5>
                    <h5 class="modal-title" id="edit_title">
                        <span class="fw-mediumbold">Ubah</span>
                        <span class="fw-light" id="edit_title_data">Detail</span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <p class="small">Create a new row using this form, make sure you fill them all</p> --}}
                    <div class="row m-0">
                        <div class="col-md-12">
                            <div class="form-group" id="asset_item_id_group">
                                <label for="asset_item_id">Aset</label>
                                <select class="form-select form-control" id="asset_item_id" name="asset_item_id">
                                    <option value="">Pilih Aset</option>
                                    @foreach ($asset_items as $item)
                                        <option value="{{ $item->id }}"
                                            data-purchase-date="{{ $item->purchase_date }}"
                                            data-purchase-price="{{ $item->purchase_price }}"
                                            {{ $asset_transaction->asset_item_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted text-danger" id="asset_item_id_error"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" id="purchase_date_group">
                                <label for="purchase_date">Tanggal Beli</label>
                                <input type="text" class="form-control" id="purchase_date" name="purchase_date"
                                    readonly />
                                <small class="form-text text-muted text-danger" id="purchase_date_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="purchase_price_group">
                                <label for="purchase_price">Harga Beli</label>
                                <input type="number" class="form-control" id="purchase_price" name="purchase_price"
                                    readonly />
                                <small class="form-text text-muted text-danger" id="purchase_price_error"></small>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group" id="quantity_group">
                                <label for="quantity">Jumlah</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" />
                                <small class="form-text text-muted text-danger" id="quantity_error"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-warning" id="store_button"
                        onclick="createOnSubmit($('#fields_form'), $('#fields_modal'))">Buat</button>
                    <button type="button" class="btn btn-warning" id="update_button"
                        onclick="editOnSubmit($('#fields_form'), $('#fields_modal'), this)" data-url="">Ubah</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#asset_item_id').on('change', function() {
            const selected = $(this).find('option:selected');

            const purchaseDate = selected.data('purchase-date');
            const purchasePrice = selected.data('purchase-price');

            console.log('Purchase Date:', purchaseDate); // "2026-04-01"
            console.log('Purchase Price:', purchasePrice); // "10000000.00"

            $('#purchase_date').val(purchaseDate);
            $('#purchase_price').val(purchasePrice);
        });
    </script>
@endpush
