@push('styles')
    <style>
        #nav-scroll {
            scroll-behavior: smooth;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            var container = $('#nav-scroll');
            var activeTab = container.find('.nav-link.active');
            if (activeTab.length) {
                container.animate({
                    scrollLeft: activeTab.position().left + container.scrollLeft() - container.width() / 2 +
                        activeTab.outerWidth() / 2
                }, 400);
            }
        });

        $('#nav-scroll .nav-link').on('shown.bs.tab', function() {
            var container = $('#nav-scroll');
            var activeTab = $(this);
            container.animate({
                scrollLeft: activeTab.position().left + container.scrollLeft() - container.width() / 2 +
                    activeTab.outerWidth() / 2
            }, 400);
        });
    </script>
@endpush

@php
    $tab = request()->get('tab', 'branches');
@endphp

<div class="text-center">
    <div class="card d-inline-block" style="max-width: 100%;">
        <div class="card-body pt-3 pb-0">
            <div style="overflow-x: auto;" id="nav-scroll">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-pills-icons flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link m-0 mb-3 {{ $tab == 'branches' ? 'active' : '' }}"
                            href="{{ url()->current() }}?tab=branches">
                            Cabang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-0 mb-3 {{ $tab == 'users' ? 'active' : '' }}"
                            href="{{ url()->current() }}?tab=users">
                            Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-0 mb-3 {{ $tab == 'balances' ? 'active' : '' }}"
                            href="{{ url()->current() }}?tab=balances">
                            Saldo
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- <div class="tab-content mt-3 mb-3" id="nav-tabContent">
    <div role="tabpanel" id="nav-index-0" aria-labelledby="nav-index-0-tab" class="tab-pane fade show active">
        Cabang
    </div>
    <div role="tabpanel" id="nav-index-1" aria-labelledby="nav-index-1-tab" class="tab-pane fade ">
        Pengguna
    </div>
    <div role="tabpanel" id="nav-index-2" aria-labelledby="nav-index-2-tab" class="tab-pane fade ">
        Saldo
    </div>
</div> --}}
