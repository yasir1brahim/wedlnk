<?php
$user_type = auth()->user_type;
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Products</a></li>
            <li class="breadcrumb-item active">Listing</li>
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
                            <?php if($user_type==ROLE_USER):?>
                            <th>Qty.</th>
                            <?php endif;?>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created on</th>
                            <?php if($user_type==ROLE_USER): ?>
                            <th>Actions</th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <?php if($user_type==ROLE_USER):?>
                            <th>Qty.</th>
                            <?php endif;?>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created on</th>
                            <?php if($user_type==ROLE_USER): ?>
                            <th>Actions</th>
                            <?php endif;?>
                        </tr>
                    </tfoot>
                  <tbody>
                      <?php foreach($products as $product):?>
                      <td><?=$product->title;?></td>
                      <td><?=$product->description;?></td>
                      <td>
                          <img src="<?=base_url('public_html/uploads/img/'.$product->image);?>" alt="Image not found" style="width:100px;">
                        </td>
                        <?php if($user_type==ROLE_USER):?>
                        <td><input type="number" value="1" class="product_qty_input"></td>
                        <?php endif;?>
                        <td>$ <?=$product->price;?></td>
                      <td>
                      <span class="badge bg-<?=$product->is_enabled ? 'success':'danger';?>"><?=$product->is_enabled ? 'Active':'Deactive';?></span>
                      </td>
                      <td>
                          <?=date('F m, Y H:i:s A',strtotime($product->created_at));?>
                      </td>
                      <?php if($user_type==ROLE_USER): ?>
                      <td>
                          <a class="btn btn-success" href="<?=base_url('add-to-my-list?qty=1&price='.$product->price.'&id='.$product->id);?>"> Add to My List</a>
                      </td>
                      <?php endif;?>
                      <tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</main>