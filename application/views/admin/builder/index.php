<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">PC Builder</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label>CPU</label>
                    <select id="cpu" class="form-control select2">
                        <option value="">-- Select CPU --</option>
                        <?php foreach($cpus as $c): ?>
                        <option value="<?= $c->id ?>"
                                data-socket="<?= $c->socket_id ?>"
                                data-watt="<?= $c->watt ?>"
                                data-price="<?= $c->selling_price ?>"> <?= $c->name ?> (Stock: <?= $c->stock ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Motherboard</label>
                    <select id="motherboard" class="form-control select2"></select>
                </div>

                <div class="col-md-4">
                    <label>RAM</label>
                    <select id="ram" class="form-control select2"></select>
                </div>

                <div class="col-md-4 mt-3">
                    <label>Cooler</label>
                    <select id="cooler" class="form-control select2"></select>
                </div>

                <div class="col-md-4 mt-3">
                    <label>Casing</label>
                    <select id="casing" class="form-control select2">
                        <option value="">-- Select Casing --</option>
                        <?php foreach($casings as $c): ?>
                        <option value="<?= $c->id ?>"
                                data-fan="<?= $c->case_fan_support ?>"
                                data-price="<?= $c->selling_price ?>"> <?= $c->name ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4 mt-3">
                    <label>VGA</label>
                    <select id="vga" class="form-control select2"></select>
                </div>

                <div class="col-md-4 mt-3">
                    <label>PSU</label>
                    <select id="psu" class="form-control select2"></select>
                </div>
            </div>

            <hr>
            <h4>Total Watt: <span id="totalWatt">0</span> W</h4>
            <h4>Total Harga: Rp <span id="totalPrice">0</span></h4> </div>
    </div>
</div>