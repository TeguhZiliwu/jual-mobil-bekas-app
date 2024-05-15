<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link custom-tab active" data-bs-toggle="tab" data-bs-target="#nav-data" aria-current="page" href="#orders"><b>Data</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-tab" data-bs-toggle="tab" data-bs-target="#nav-form" href="#accepted"><b>Form</b></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active p-0 border-0" id="nav-data" role="tabpanel">
                        {{ $tabMasterDataRender }}
                    </div>
                    <div class="tab-pane p-0 border-0" id="nav-form" role="tabpanel">
                        {{ $tabMasterFormRender }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>