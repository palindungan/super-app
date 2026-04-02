@include('components.resources.assets.fields')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="name"
                            name="name" value="{{ old('name', $role->name ?? '') }}" />
                        @error('name')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('guard_name') ? 'has-error has-feedback' : '' }}">
                        <label for="guard_name">Nama Penjaga</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="guard_name"
                            name="guard_name" value="{{ old('guard_name', $role->guard_name ?? 'web') }}" readonly />
                        @error('guard_name')
                            <small class="form-text text-muted text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="select_all"
                            name="select_all">
                        <label class="form-check-label" for="select_all">
                            Pilih Semua
                        </label>
                        <br>
                        <small class="form-text text-muted">
                            Aktifkan semua izin yang Tersedia untuk Peran ini.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $role_has_permissions = old('permissions', $role_has_permissions ?? []);
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-body pb-0" style="padding-top: 0px;">
            <div class="col-md-12 pb-0" style="padding: 10px;">
                <input type="hidden" name="nav_link_active_tab" id="nav_link_active_tab"
                    value="{{ old('nav_link_active_tab', 0) }}">
                <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                    @foreach ($permissions_data as $value_key => $value)
                        @php
                            $nav_link_active = '';
                            $nav_link_active_tab = old('nav_link_active_tab', 0);
                            $aria_selected = 'false';
                            if ($value_key == $nav_link_active_tab) {
                                $nav_link_active = 'active';
                                $aria_selected = 'true';
                            }
                            $permissions = [];
                            foreach ($value['menu'] as $menu_key => $menu) {
                                $permissions = array_merge($permissions, $menu['permissions']);
                            }
                        @endphp
                        @php
                            $index = "index-$value_key";
                        @endphp
                        <li class="nav-item">
                            <a data-bs-toggle="pill" role="tab" class="nav-link {{ $nav_link_active }}"
                                aria-selected="{{ $aria_selected }}" id="line-{{ $index }}-tab"
                                href="#line-{{ $index }}" aria-controls="pills-{{ $index }}">
                                {{ $value['label'] }}
                                <span class="badge badge-secondary">{{ count($permissions) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content mt-3 mb-3" id="line-tabContent">
                    @foreach ($permissions_data as $value_key => $value)
                        @php
                            $nav_link_active = '';
                            if ($value_key == $nav_link_active_tab) {
                                $nav_link_active = 'show active';
                            }
                        @endphp
                        @php
                            $index = "index-$value_key";
                        @endphp
                        <div role="tabpanel" class="tab-pane fade {{ $nav_link_active }}"
                            id="line-{{ $index }}" aria-labelledby="line-{{ $index }}-tab"
                            style="padding-top: 15px;">
                            @foreach ($value['menu'] as $menu_key => $menu)
                                @php
                                    $index = "index-$value_key-$menu_key";
                                @endphp
                                <div class="accordion accordion-secondary">
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $index }}"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="true" aria-controls="collapse{{ $index }}">
                                            <div class="span-title">
                                                {{ $menu['label'] }}
                                            </div>
                                            <div class="span-mode"></div>
                                        </div>
                                        <div id="collapse{{ $index }}" class="collapse show"
                                            aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach ($menu['permissions'] as $permission_key => $permission)
                                                        @php
                                                            $index = "index-$value_key-$menu_key-$permission_key";
                                                        @endphp
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input type="checkbox"
                                                                    class="form-check-input permissions"
                                                                    id="permissions{{ $index }}"
                                                                    name="permissions[]"
                                                                    value="{{ $permission['name'] }}"
                                                                    {{ in_array($permission['name'], $role_has_permissions) ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="permissions{{ $index }}">
                                                                    {{ $permission['label'] }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            function syncSelectAll() {
                let total = $('.permissions').length;
                let checked = $('.permissions:checked').length;

                $('#select_all').prop('checked', total === checked);
            }

            // Jalankan saat pertama load (INI YANG PENTING UNTUK EDIT)
            syncSelectAll();

            // Saat klik select_all
            $('#select_all').on('change', function() {
                $('.permissions').prop('checked', $(this).prop('checked'));
            });

            // Saat checkbox permissions berubah
            $('.permissions').on('change', function() {
                syncSelectAll();
            });
        });
    </script>
    <script>
        $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
            let id = $(e.target).attr('id'); // contoh: line-1-tab
            let index = id.split('-')[1]; // ambil "1"
            $('#nav_link_active_tab').val(index);
        });
    </script>
@endpush
