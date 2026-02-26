<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Atur Chipset untuk Socket: <?= $socket->name ?></h1>
        <a href="<?= site_url('admin/compatibility') ?>" class="btn btn-sm btn-secondary shadow-sm">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Centang Chipset yang mendukung Socket ini</h6>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/compatibility/update/'.$socket->id) ?>" method="post">
                
                <div class="row">
                    <?php foreach($chipsets as $c): ?>
                    <div class="col-md-3 mb-3">
                        <div class="custom-control custom-checkbox border p-3 rounded shadow-sm">
                            <input type="checkbox" name="chipset_ids[]" 
                                   value="<?= $c->id ?>" 
                                   class="custom-control-input" 
                                   id="chip_<?= $c->id ?>"
                                   <?= in_array($c->id, $selected) ? 'checked' : '' ?>>
                            <label class="custom-control-label font-weight-bold" for="chip_<?= $c->id ?>">
                                <?= $c->name ?>
                            </label>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <hr>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary px-5 shadow">
                        <i class="fas fa-save mr-2"></i> Simpan Konfigurasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>