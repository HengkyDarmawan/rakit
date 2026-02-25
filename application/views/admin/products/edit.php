<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post">

            <!-- ================= BASIC INFO ================= -->

            <h5 class="mb-3">Basic Information</h5>

            <div class="row">

                <div class="col-md-6 form-group">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control select2" required>
                        <option value="">-- Select Category --</option>
                        <?php foreach($categories as $c): ?>
                            <option value="<?= $c->id ?>"
                                    data-slug="<?= $c->slug ?>"
                                    <?= $product->category_id == $c->id ? 'selected' : '' ?>>
                                <?= $c->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label>Brand</label>
                    <select name="brand_id" class="form-control select2" required>
                        <option value="">-- Select Brand --</option>
                        <?php foreach($brands as $b): ?>
                        <option value="<?= $b->id ?>"
                            <?= $product->brand_id == $b->id ? 'selected':'' ?>>
                            <?= $b->name ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control"
                       value="<?= $product->name ?>" required>
            </div>

            <hr>

            <!-- ================= PRICING ================= -->

            <h5 class="mb-3">Pricing</h5>

            <div class="row">

                <div class="col-md-4 form-group">
                    <label>Cost Price</label>
                    <input type="number" name="cost_price" class="form-control"
                           value="<?= $product->cost_price ?>">
                </div>

                <div class="col-md-4 form-group">
                    <label>Selling Price</label>
                    <input type="number" name="selling_price" class="form-control"
                           value="<?= $product->selling_price ?>">
                </div>

                <div class="col-md-4 form-group">
                    <label>Discount Price</label>
                    <input type="number" name="discount_price" class="form-control"
                           value="<?= $product->discount_price ?>">
                </div>

            </div>

            <div class="row">

                <div class="col-md-4 form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" class="form-control"
                           value="<?= $product->stock ?>">
                </div>

                <div class="col-md-4 form-group">
                    <label>Budget</label>
                    <select name="budget" id="budget" class="form-control">
                        <option value="low" <?= $product->budget=='low'?'selected':'' ?>>Low</option>
                        <option value="medium" <?= $product->budget=='medium'?'selected':'' ?>>Medium</option>
                        <option value="high" <?= $product->budget=='high'?'selected':'' ?>>High</option>
                    </select>
                </div>

                <div class="col-md-4 form-group align-self-end">
                    <span id="budgetPreview" class="badge mt-2"></span>
                </div>

            </div>

            <hr>

            <!-- ================= SPECIFICATIONS ================= -->

            <h5 class="mb-3">Specifications</h5>

            <div class="row">

                <!-- SOCKET -->
                <div class="col-md-4 form-group d-none" id="field_socket">
                    <label>Socket</label>
                    <select name="socket_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($sockets as $s): ?>
                            <option value="<?= $s->id ?>"
                                <?= $product->socket_id == $s->id ? 'selected':'' ?>>
                                <?= $s->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- CHIPSET -->
                <div class="col-md-4 form-group d-none" id="field_chipset">
                    <label>Chipset</label>
                    <select name="chipset_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($chipsets as $c): ?>
                            <option value="<?= $c->id ?>"
                                <?= $product->chipset_id == $c->id ? 'selected':'' ?>>
                                <?= $c->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- RAM TYPE -->
                <div class="col-md-4 form-group d-none" id="field_ram_type">
                    <label>RAM Type</label>
                    <select name="ram_type_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($ram_types as $r): ?>
                            <option value="<?= $r->id ?>"
                                <?= $product->ram_type_id == $r->id ? 'selected':'' ?>>
                                <?= $r->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- RAM SPEED -->
                <div class="col-md-4 form-group d-none" id="field_ram_speed">
                    <label>RAM Speed</label>
                    <select name="ram_speed_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($ram_speeds as $r): ?>
                            <option value="<?= $r->id ?>"
                                <?= $product->ram_speed_id == $r->id ? 'selected':'' ?>>
                                <?= $r->speed_mhz ?> MHz
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- FORM FACTOR -->
                <div class="col-md-4 form-group d-none" id="field_form_factor">
                    <label>Form Factor</label>
                    <select name="form_factor_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($form_factors as $f): ?>
                            <option value="<?= $f->id ?>"
                                <?= $product->form_factor_id == $f->id ? 'selected':'' ?>>
                                <?= $f->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- STORAGE TYPE -->
                <div class="col-md-4 form-group d-none" id="field_storage_type">
                    <label>Storage Type</label>
                    <select name="storage_type_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($storage_types as $s): ?>
                            <option value="<?= $s->id ?>"
                                <?= $product->storage_type_id == $s->id ? 'selected':'' ?>>
                                <?= $s->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- COOLER TYPE -->
                <div class="col-md-4 form-group d-none" id="field_cooler_type">
                    <label>Cooler Type</label>
                    <select name="cooler_type_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($cooler_types as $c): ?>
                            <option value="<?= $c->id ?>"
                                <?= $product->cooler_type_id == $c->id ? 'selected':'' ?>>
                                <?= $c->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- FAN TYPE -->
                <div class="col-md-4 form-group d-none" id="field_fan_type">
                    <label>Fan Type</label>
                    <select name="fan_type_id" class="form-control select2">
                        <option value="">--</option>
                        <?php foreach($fan_types as $f): ?>
                            <option value="<?= $f->id ?>"
                                <?= $product->fan_type_id == $f->id ? 'selected':'' ?>>
                                <?= $f->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- WATT -->
                <div class="col-md-4 form-group d-none" id="field_watt">
                    <label>Watt (TDP)</label>
                    <input type="number" name="watt" class="form-control"
                           value="<?= $product->watt ?>">
                </div>

                <!-- PSU MAX WATT -->
                <div class="col-md-4 form-group d-none" id="field_max_watt">
                    <label>Max Watt (PSU)</label>
                    <input type="number" name="max_watt" class="form-control"
                           value="<?= $product->max_watt ?>">
                </div>
                <div class="col-md-4 form-group" id="field_nvme_slot">
                    <label>NVMe Slot</label>
                    <input type="number" name="nvme_slot" class="form-control"
                        value="<?= $product->nvme_slot ?>">
                </div>

                <div class="col-md-4 form-group" id="field_sata_port">
                    <label>SATA Port</label>
                    <input type="number" name="sata_port" class="form-control"
                        value="<?= $product->sata_port ?>">
                </div>

                <div class="col-md-4 form-group" id="field_mb_fan_header">
                    <label>Motherboard Fan Header</label>
                    <input type="number" name="mb_fan_header" class="form-control"
                        value="<?= $product->mb_fan_header ?>">
                </div>
                <div class="col-md-4 form-group" id="field_rgb_header">
                    <label>RGB Header</label>
                    <input type="number" name="rgb_header" class="form-control"
                        value="<?= $product->rgb_header ?>">
                </div>

                <div class="col-md-4 form-group" id="field_case_fan_support">
                    <label>Case Fan Support</label>
                    <input type="number" name="case_fan_support" class="form-control"
                        value="<?= $product->case_fan_support ?>">
                </div>

                <div class="col-md-4 form-group" id="field_fan_count">
                    <label>VGA Fan Count</label>
                    <input type="number" name="fan_count" class="form-control"
                        value="<?= $product->fan_count ?>">
                </div>

                <div class="col-md-4 form-group" id="field_psu_certification">
                    <label>PSU Certification</label>
                    <input type="text" name="psu_certification" class="form-control"
                        value="<?= $product->psu_certification ?>">
                </div>

                <div class="col-md-4 form-group" id="field_psu_modular_type">
                    <label>PSU Modular Type</label>
                    <select name="psu_modular_type" class="form-control">
                        <option value="">--</option>
                        <option value="non-modular" <?= $product->psu_modular_type=='non-modular'?'selected':'' ?>>Non Modular</option>
                        <option value="semi-modular" <?= $product->psu_modular_type=='semi-modular'?'selected':'' ?>>Semi Modular</option>
                        <option value="full-modular" <?= $product->psu_modular_type=='full-modular'?'selected':'' ?>>Full Modular</option>
                    </select>
                </div>

            </div>

            <hr>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4"><?= $product->description ?></textarea>
            </div>

            <div class="form-group">
                <label>Status</label><br>
                <input type="checkbox" name="is_active" value="1"
                    <?= $product->is_active ? 'checked':'' ?>> Active
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="<?= site_url('admin/products') ?>" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>
</div>