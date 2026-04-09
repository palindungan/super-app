<div class="modal fade" id="fields_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="fields_form">
                @include('components.forms.data')
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="create_title">
                        <span class="fw-mediumbold">Buat</span>
                        <span class="fw-light">Mata Uang</span>
                    </h5>
                    <h5 class="modal-title" id="edit_title">
                        <span class="fw-mediumbold">Ubah</span>
                        <span class="fw-light" id="edit_title_data">Mata Uang</span>
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
                                <input type="text" class="form-control form-control" id="code" name="code" />
                                <small class="form-text text-muted text-danger" id="code_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="name_group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control form-control" id="name" name="name" />
                                <small class="form-text text-muted text-danger" id="name_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="symbol_group">
                                <label for="symbol">Simbol</label>
                                <input type="text" class="form-control form-control" id="symbol" name="symbol" />
                                <small class="form-text text-muted text-danger" id="symbol_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="minor_unit_group">
                                <label for="minor_unit">Satuan Pecahan</label>
                                <input type="number" class="form-control form-control" id="minor_unit"
                                    name="minor_unit" />
                                <small class="form-text text-muted text-danger" id="minor_unit_error"></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch" id="is_active_group">
                                <input type="hidden" name="is_active" value="0">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_active"
                                    name="is_active" value="1" checked>
                                <label class="form-check-label" for="is_active">
                                    Status Aktif
                                </label>
                                <br>
                                <small class="form-text text-muted">
                                    Aktifkan untuk menggunakan mata uang ini dalam transaksi.
                                </small>
                                <br>
                                <small class="form-text text-danger" id="is_active_error"></small>
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
