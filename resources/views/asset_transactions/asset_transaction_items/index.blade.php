<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Detail</h4>
                    <a class="btn btn-primary btn-round ms-auto" href="">
                        <i class="fa fa-plus"></i>
                        Buat Detail
                    </a>
                </div>
            </div>
            <div class="card-body">
                @include('asset_transactions.asset_transaction_items.table')
            </div>
        </div>
    </div>
</div>

@include('components.resources.assets.v1.simple_modal_destroy')
