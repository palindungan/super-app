<div class="modal fade" id="fields_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="fields_form">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">Buat</span>
                        <span class="fw-light">Mata Uang</span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <p class="small">Create a new row using this form, make sure you fill them all</p> --}}
                    <div class="row m-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Kode</label>
                                <input type="text" class="form-control form-control" autocomplete="off"
                                    id="code" name="code" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control form-control" autocomplete="off"
                                    id="name" name="name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="symbol">Simbol</label>
                                <input type="text" class="form-control form-control" autocomplete="off"
                                    id="symbol" name="symbol" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="minor_unit">Satuan Pecahan</label>
                                <input type="number" class="form-control form-control" autocomplete="off"
                                    id="minor_unit" name="minor_unit" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_active"
                                    name="is_active">
                                <label class="form-check-label" for="is_active">
                                    Status Aktif
                                </label>
                                <br>
                                <small class="form-text text-muted">
                                    Aktifkan untuk menggunakan mata uang ini dalam transaksi.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-warning">Buat</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
