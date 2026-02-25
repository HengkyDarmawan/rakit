<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Products</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
            <a href="<?= site_url('admin/products/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Product
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Budget</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; foreach($products as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <strong><?= $p->name ?></strong><br>

                                <?php if(!empty($p->sku)): ?>
                                    <small class="text-muted">SKU: <?= $p->sku ?></small><br>
                                <?php endif; ?>

                                <?php
                                $specs = [];

                                if(!empty($p->socket_name))       $specs[] = "Socket: {$p->socket_name}";
                                if(!empty($p->chipset_name))      $specs[] = "Chipset: {$p->chipset_name}";
                                if(!empty($p->ram_type_name))     $specs[] = "RAM Type: {$p->ram_type_name}";
                                if(!empty($p->ram_speed_mhz))     $specs[] = "RAM Speed: {$p->ram_speed_mhz} MHz";
                                if(!empty($p->form_factor_name))  $specs[] = "Form Factor: {$p->form_factor_name}";
                                if(!empty($p->storage_type_name)) $specs[] = "Storage: {$p->storage_type_name}";
                                if(!empty($p->cooler_type_name))  $specs[] = "Cooling: {$p->cooler_type_name}";
                                if(!empty($p->fan_type_name))     $specs[] = "Airflow: {$p->fan_type_name}";
                                if(!empty($p->watt) && $p->watt > 0) $specs[] = "TDP: {$p->watt}W";
                                if(!empty($p->max_watt))          $specs[] = "Max Watt: {$p->max_watt}W";

                                foreach($specs as $spec){
                                    echo '<small class="text-muted">'.$spec.'</small><br>';
                                }
                                ?>
                            </td>

                            <td><?= $p->category_name ?></td>
                            <td><?= $p->brand_name ?></td>

                            <td>
                                Rp <?= number_format($p->selling_price,0,',','.') ?>
                                <?php if($p->discount_price): ?>
                                    <br>
                                    <small class="text-danger">
                                        Disc: Rp <?= number_format($p->discount_price,0,',','.') ?>
                                    </small>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($p->stock > 0): ?>
                                    <span class="badge badge-success">
                                        <?= $p->stock ?>
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-danger">
                                        Out
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($p->budget == 'low'): ?>
                                    <span class="badge badge-success">Low</span>
                                <?php elseif($p->budget == 'medium'): ?>
                                    <span class="badge badge-warning">Medium</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">High</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($p->is_active): ?>
                                    <span class="badge badge-primary">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="<?= site_url('admin/products/edit/'.$p->id) ?>" 
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="<?= site_url('admin/products/delete/'.$p->id) ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin hapus product ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>