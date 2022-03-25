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
                        <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
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
                        <h1><?=$qtyActiveAttachedProducts;?></h1>
                        <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Qty. Active & Attached Products</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h1><?=$sum_price_aa_prods;?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div> -->
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
                    <?php
                    $i = 0;
                    foreach($user_products as $user_id=>$user_product):
                    $user = $this->Dashboard_model->getSpecificColsv2([
                        'columns'=>'first_name,last_name',
                        'condition'=>['id'=>$user_id],
                        'table'=>TBL_USERS,
                        'row'=>TRUE
                    ]);
                    ?>
                    <tr>
                        <td><?=++$i;?></td>
                        <td><?=$user->first_name.' '.$user->last_name;?></td>
                        <td><?=array_sum($user_product);?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</main>