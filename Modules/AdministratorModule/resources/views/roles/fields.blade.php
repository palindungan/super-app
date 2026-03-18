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
                            <input class="form-check-input" type="checkbox" role="switch" id="select_all"
                                name="select_all">
                            <label class="form-check-label" for="select_all">
                                Pilih Semua
                            </label>
                            <br>
                            <small id="emailHelp2" class="form-text text-muted">
                                Aktifkan semua izin yang Tersedia untuk Peran ini.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body pb-0" style="padding-top: 0px;">
            <div class="col-md-12 pb-0" style="padding: 10px;">
                <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                    @foreach ($roles_data as $index => $item)
                        @php
                            $link_active = '';
                            $aria_selected = 'false';
                            if ($index == 0) {
                                $link_active = 'active';
                                $aria_selected = 'true';
                            }
                        @endphp
                        <li class="nav-item">
                            <a data-bs-toggle="pill" role="tab" class="nav-link {{ $link_active }}"
                                aria-selected="{{ $aria_selected }}" id="line-{{ $index }}-tab"
                                href="#line-{{ $index }}" aria-controls="pills-{{ $index }}">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content mt-3 mb-3" id="line-tabContent">
                    @foreach ($roles_data as $index => $item)
                        @php
                            $link_active = '';
                            if ($index == 0) {
                                $link_active = 'show active';
                            }
                        @endphp
                        <div role="tabpanel" class="tab-pane fade {{ $link_active }}" id="line-{{ $index }}"
                            aria-labelledby="line-{{ $index }}-tab">
                            <div class="accordion accordion-secondary" style="padding-top: 10px;">
                                <div class="card">
                                    <div class="card-header" id="heading1" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <div class="span-title">
                                            Lorem Ipsum #1
                                        </div>
                                        <div class="span-mode"></div>
                                    </div>
                                    <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
