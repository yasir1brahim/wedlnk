<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Active & Verified Users</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1><?=count($users['active_verified']);?></h1>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Active & Verified Users by Product</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    <h1><?=$users['by_active_products'];?></h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Active Products</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1><?=$active_products;?></h1>
                    </div>
                </div>
            </div>
             <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Products Not Attached</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1><?=$products_not_attached;?></h1>
                        
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Qty. Active & Attached Products</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1><?=$qtyActiveAttachedProducts->qty??$qtyActiveAttachedProducts->qty;?></h1>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Amount Sum for Active Products Qty.</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1><?=$sum_price_aa_prods->amount??$sum_price_aa_prods->amount;?></h1>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User's Data
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Serial #</th>
                            <th>Name</th>
                            <th>Sum</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Serial #</th>
                            <th>Name</th>
                            <th>Sum</th>
                        </tr>
                    </tfoot>
                <tbody>
                    <?php foreach($user_products as $key=>$user_product): ?>
                    <tr>
                        <td><?=++$key;?></td>
                        <td><?=$user_product->first_name.' '.$user_product->last_name;?></td>
                        <td><?=$user_product->amount;?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</main>