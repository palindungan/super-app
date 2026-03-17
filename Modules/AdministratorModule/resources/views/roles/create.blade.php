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
            <div class="card">
                <div class="card-body" style="padding-top: 0px;">
                    <div class="col-md-12" style="padding: 10px;">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="line-1-tab" data-bs-toggle="pill" href="#line-1"
                                    role="tab" aria-controls="pills-1" aria-selected="true">Utama</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="line-2-tab" data-bs-toggle="pill" href="#line-2" role="tab"
                                    aria-controls="pills-2" aria-selected="false">Laporan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="line-3-tab" data-bs-toggle="pill" href="#line-3" role="tab"
                                    aria-controls="pills-3" aria-selected="false">Data Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="line-4-tab" data-bs-toggle="pill" href="#line-4" role="tab"
                                    aria-controls="pills-4" aria-selected="false">Data Master</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="line-5-tab" data-bs-toggle="pill" href="#line-5" role="tab"
                                    aria-controls="pills-5" aria-selected="false">Lain-Lain</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="line-6-tab" data-bs-toggle="pill" href="#line-6" role="tab"
                                    aria-controls="pills-6" aria-selected="false">Administrator</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3 mb-3" id="line-tabContent">
                            <div class="tab-pane fade show active" id="line-1" role="tabpanel"
                                aria-labelledby="line-1-tab">
                                <p>Utama</p>
                            </div>
                            <div class="tab-pane fade" id="line-2" role="tabpanel" aria-labelledby="line-2-tab">
                                <p>Laporan</p>
                            </div>
                            <div class="tab-pane fade" id="line-3" role="tabpanel" aria-labelledby="line-3-tab">
                                <p>Data Produk</p>
                            </div>
                            <div class="tab-pane fade" id="line-4" role="tabpanel" aria-labelledby="line-4-tab">
                                <p>Data Master</p>
                            </div>
                            <div class="tab-pane fade" id="line-5" role="tabpanel" aria-labelledby="line-5-tab">
                                <p>Lain-Lain</p>
                            </div>
                            <div class="tab-pane fade" id="line-6" role="tabpanel" aria-labelledby="line-6-tab">
                                <p>Administrator</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="accordion accordion-secondary">
                <div class="card">
                    <div class="card-header" id="heading1" data-bs-toggle="collapse" data-bs-target="#collapse1"
                        aria-expanded="true" aria-controls="collapse1">
                        <div class="span-title">
                            Lorem Ipsum #1
                        </div>
                        <div class="span-mode"></div>
                    </div>

                    <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                        <div class="card-body">
                            1111111111111111111111
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header collapsed" id="heading2" data-bs-toggle="collapse"
                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <div class="span-title">
                            Lorem Ipsum #2
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                        <div class="card-body">
                            2222222222222222222222
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header collapsed" id="heading3" data-bs-toggle="collapse"
                        data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        <div class="span-title">
                            Lorem Ipsum #3
                        </div>
                        <div class="span-mode"></div>
                    </div>
                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                        <div class="card-body">
                            3333333333333333333333
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">Buat</button>
            <button class="btn btn-danger">Batal</button>
        </div>
    </div>
@endsection
