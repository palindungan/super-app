@extends('components.layouts.master_1.main')

@section('sidebar.administrator.roles.active', 'active')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Buat Peran</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Peran', 'url' => route('administrator-roles.index')],
                ['label' => 'Buat'],
            ],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="largeInput">Nama</label>
                                <input type="text" class="form-control form-control" id="name" name="name" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="largeInput">Nama Penjaga</label>
                                <input type="text" class="form-control form-control" id="guard_name" name="guard_name" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Pilih Semua</label>
                                    <br>
                                    <small id="emailHelp2" class="form-text text-muted">Aktifkan semua izin yang Tersedia
                                        untuk Peran ini.</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-success">Buat</button>
            <button class="btn btn-danger">Batal</button>
        </div>
    </div>
@endsection
