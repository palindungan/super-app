<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="modal-logout" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold" id="modal-title-logout">
                    Perhatian Anda diperlukan.
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fas fa-bell" style="font-size: 24px"></i>
                    <h4 class="text-danger mt-4">Apakah Anda yakin ingin keluar?</h4>
                    <p>
                        Klik "Keluar" di bawah jika Anda ingin mengakhiri sesi Anda saat ini.
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="POST" onsubmit="formOnSubmitButton(this)">
                    @include('components.forms.data', ['method' => 'POST'])
                    <button type="submit" class="btn btn-danger">Keluar</button>
                </form>
                <button type="button" class="btn btn-link text-primary text-decoration-none" data-bs-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
