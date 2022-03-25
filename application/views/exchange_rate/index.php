<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Exhcange Rates</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Exchange Rates</li>
        </ol>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Base</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1>Euro</h1>
                        <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">USD</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    <h1><?=$exchange_rates['rates']['USD']??$exchange_rates['rates']['USD'];?></h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">RON</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    <h1><?=$exchange_rates['rates']['RON']??$exchange_rates['rates']['RON'];?></h1>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>