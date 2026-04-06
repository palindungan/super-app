@include('components.resources.assets.index')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Cabang</h4>
                    <a class="btn btn-primary btn-round ms-auto" href="">
                        <i class="fa fa-plus"></i>
                        Buat Cabang
                    </a>
                </div>
            </div>
            <div class="card-body">
                @include('administratormodule::companies.branches.table')
            </div>
        </div>
    </div>
</div>
