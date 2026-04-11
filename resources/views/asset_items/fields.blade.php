<div class="modal fade" id="fields_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="fields_form" enctype="multipart/form-data">
                @include('components.forms.data')
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="create_title">
                        <span class="fw-mediumbold">Buat</span>
                        <span class="fw-light">Aset</span>
                    </h5>
                    <h5 class="modal-title" id="edit_title">
                        <span class="fw-mediumbold">Ubah</span>
                        <span class="fw-light" id="edit_title_data">Aset</span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <p class="small">Create a new row using this form, make sure you fill them all</p> --}}
                    <div class="row m-0">
                        <div class="col-md-6">
                            <div class="form-group" id="code_group">
                                <label for="code">Kode</label>
                                <input type="text" class="form-control" id="code" name="code" />
                                <small class="form-text text-muted text-danger" id="code_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="name_group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" />
                                <small class="form-text text-muted text-danger" id="name_error"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" id="asset_category_id_group">
                                <label for="asset_category_id">Kategori</label>
                                <select class="form-select form-control" id="asset_category_id"
                                    name="asset_category_id">
                                    @foreach ($asset_categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted text-danger" id="asset_category_id_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="asset_status_id_group">
                                <label for="asset_status_id">Status</label>
                                <select class="form-select form-control" id="asset_status_id" name="asset_status_id">
                                    @foreach ($asset_statuses as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted text-danger" id="asset_status_id_error"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" id="purchase_date_group">
                                <label for="purchase_date">Tanggal Beli</label>
                                <input type="date" class="form-control" id="purchase_date" name="purchase_date" />
                                <small class="form-text text-muted text-danger" id="purchase_date_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="purchase_price_group">
                                <label for="purchase_price">Harga Beli</label>
                                <input type="number" class="form-control" id="purchase_price" name="purchase_price" />
                                <small class="form-text text-muted text-danger" id="purchase_price_error"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" id="photo_group">
                                <label for="photo">Foto</label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                    accept="image/*" />
                                <small class="form-text text-muted text-danger" id="photo_error"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" id="latitude_group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" />
                                <small class="form-text text-muted text-danger" id="latitude_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="longitude_group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" />
                                <small class="form-text text-muted text-danger" id="longitude_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="accuracy_group">
                                <label for="accuracy">Accuracy</label>
                                <input type="text" class="form-control" id="accuracy" name="accuracy" />
                                <small class="form-text text-muted text-danger" id="accuracy_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-warning" onclick="getCurrentPosition()">Ambil
                                Lokasi</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-warning" id="store_button"
                        onclick="createOnSubmit($('#fields_form'), $('#fields_modal'))">Buat</button>
                    <button type="button" class="btn btn-warning" id="update_button"
                        onclick="editOnSubmit($('#fields_form'), $('#fields_modal'), this)"
                        data-url="">Ubah</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function getCurrentPosition() {
            navigator.geolocation.getCurrentPosition(
                ({
                    coords
                }) => {
                    console.log("Lat:", coords.latitude);
                    console.log("Lng:", coords.longitude);
                    console.log("Akurasi:", coords.accuracy, "meter");

                    $('#latitude').val(coords.latitude);
                    $('#longitude').val(coords.longitude);
                    $('#accuracy').val(coords.accuracy);
                },
                (err) => console.error("Error:", err.message)
            );
        }
    </script>
@endpush
