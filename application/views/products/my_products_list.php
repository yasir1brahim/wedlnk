<?php
$user_type = auth()->user_type;
 ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Products</a></li>
            <li class="breadcrumb-item active">My Products List</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                .
            </div>
        </div>
        <?php if($message = $this->session->flashdata('message')): ?>
        <div class="alert alert-<?=$message['class'];?>"><?=$message['message'];?></div>
        <?php endif; ?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Qty.</th>
                            <th>Price</th>
                            <th>Product Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Qty.</th>
                            <th>Price</th>
                            <th>Product Total</th>
                            
                        </tr>
                    </tfoot>
                  <tbody>
                      <?php
                      $grand_total = 0;
                      foreach($products as $product):
                      $grand_total+=$product->qty*$product->price;  
                      ?>
                      <td><?=$product->title;?></td>
                      <td><?=$product->description;?></td>
                      <td>
                          <img src="<?=base_url('public_html/uploads/img/'.$product->image);?>" alt="Image not found" style="width:100px;">
                        </td>
                        <td><?=$product->qty;?></td>
                        <td><?=$product->price;?>$</td>
                        <td><?=$product->qty*$product->price;?>$</td>
                      <tr>
                      <?php endforeach;?>
                      <tr>
                          <td colspan="5">Grand Total</td>
                          <td><?=$grand_total;?>$</td>
                      </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</main>