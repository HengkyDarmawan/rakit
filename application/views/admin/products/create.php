<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Product</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post">

                <!-- BASIC INFO -->
                <h5 class="mb-3">Basic Information</h5>

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control select2" required>
                            <option value="">-- Select Category --</option>
                            <?php foreach($categories as $c): ?>
                                <option value="<?= $c->id ?>" data-slug="<?= $c->slug ?>">
                                    <?= $c->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Brand</label>
                        <select name="brand_id" class="form-control select2" required>
                            <option value="">-- pilih --</option>
                            <?php foreach($brands as $b): ?>
                            <option value="<?= $b->id ?>"><?= $b->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" class="form-control">
                    </div>

                    <div class="col-md-4 form-group">
                        <label>Barcode</label>
                        <input type="text" name="barcode" class="form-control">
                    </div>

                    <div class="col-md-4 form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" value="99">
                    </div>
                </div>

                <hr>

                <!-- PRICING -->
                <h5 class="mb-3">Pricing</h5>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Cost Price</label>
                        <input type="number" name="cost_price" class="form-control" value="0">
                    </div>

                    <div class="col-md-4 form-group">
                        <label>Selling Price</label>
                        <input type="number" name="selling_price" class="form-control">
                    </div>

                    <div class="col-md-4 form-group">
                        <label>Discount Price</label>
                        <input type="number" name="discount_price" class="form-control" value="0">
                    </div>
                </div>

                <div class="form-group">
                    <label>Budget</label>
                    <select name="budget" class="form-control">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high" selected>High</option>
                    </select>
                </div>

                <hr>

                <!-- SPECIFICATIONS -->
                <h5 class="mb-3">Specifications</h5>

                <div class="row">

                    <div class="col-md-4 form-group" id="field_socket">
                        <label>Socket</label>
                        <select name="socket_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($sockets as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_chipset">
                        <label>Chipset</label>
                        <select name="chipset_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($chipsets as $c): ?>
                                <option value="<?= $c->id ?>"><?= $c->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_ram_type">
                        <label>RAM Type</label>
                        <select name="ram_type_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($ram_types as $r): ?>
                                <option value="<?= $r->id ?>"><?= $r->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_ram_speed">
                        <label>RAM Speed</label>
                        <select name="ram_speed_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($ram_speeds as $r): ?>
                                <option value="<?= $r->id ?>"><?= $r->speed_mhz ?> MHz</option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_form_factor">
                        <label>Form Factor</label>
                        <select name="form_factor_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($form_factors as $f): ?>
                                <option value="<?= $f->id ?>"><?= $f->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_storage_type">
                        <label>Storage Type</label>
                        <select name="storage_type_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($storage_types as $s): ?>
                                <option value="<?= $s->id ?>"><?= $s->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_cooler_type">
                        <label>Cooler Type</label>
                        <select name="cooler_type_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($cooler_types as $c): ?>
                                <option value="<?= $c->id ?>"><?= $c->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_fan_type">
                        <label>Fan Type</label>
                        <select name="fan_type_id" class="form-control select2">
                            <option value="">--</option>
                            <?php foreach($fan_types as $f): ?>
                                <option value="<?= $f->id ?>"><?= $f->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-4 form-group" id="field_watt">
                        <label>Watt (TDP)</label>
                        <input type="number" name="watt" class="form-control">
                    </div>

                    <div class="col-md-4 form-group" id="field_max_watt">
                        <label>Max Watt (PSU)</label>
                        <input type="number" name="max_watt" class="form-control">
                    </div>
                    <div class="col-md-4 form-group d-none" id="field_nvme_slot">
                        <label>NVMe Slot</label>
                        <input type="number" name="nvme_slot" class="form-control">
                    </div>

                    <div class="col-md-4 form-group d-none" id="field_sata_port">
                        <label>SATA Port</label>
                        <input type="number" name="sata_port" class="form-control">
                    </div>

                    <div class="col-md-4 form-group d-none" id="field_mb_fan_header">
                        <label>Motherboard Fan Header (PWN)</label>
                        <input type="number" name="mb_fan_header" class="form-control">
                    </div>
                    <div class="col-md-4 form-group d-none" id="field_rgb_header">
                        <label>RGB Header</label>
                        <input type="number" name="rgb_header" class="form-control">
                    </div>

                    <div class="col-md-4 form-group d-none" id="field_case_fan_support">
                        <label>Case Fan Support</label>
                        <input type="number" name="case_fan_support" class="form-control">
                    </div>

                    <div class="col-md-4 form-group d-none" id="field_fan_count">
                        <label>VGA Fan Count</label>
                        <input type="number" name="fan_count" class="form-control">
                    </div>

                    <div class="col-md-4 form-group d-none" id="field_psu_certification">
                        <label>PSU Certification</label>
                        <input type="text" name="psu_certification" class="form-control">
                    </div>

                    <div class="col-md-4 form-group d-none" id="field_psu_modular_type">
                        <label>PSU Modular Type</label>
                        <select name="psu_modular_type" class="form-control">
                            <option value="">--</option>
                            <option value="non-modular">Non Modular</option>
                            <option value="semi-modular">Semi Modular</option>
                            <option value="full-modular">Full Modular</option>
                        </select>
                    </div>

                </div>

                <hr>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label><br>
                    <input type="checkbox" name="is_active" value="1" checked> Active
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="<?= site_url('admin/products') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>