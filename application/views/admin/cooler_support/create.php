<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('admin/cooler_support/store') ?>">

                <div class="form-group">
                    <label>Cooler</label>
                    <select name="cooler_id" class="form-control select2-search" required>
                        <option value="">-- Cari Cooler --</option>
                        <?php foreach($coolers as $c): ?>
                            <?php if(!in_array($c->id, $configured_ids)): ?>
                                <option value="<?= $c->id ?>"><?= $c->name ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Support Socket (Centang yang didukung)</label>
                    <div class="row ml-1"> <?php foreach($sockets as $s): ?>
                            <div class="col-md-3 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" name="socket_ids[]" 
                                           value="<?= $s->id ?>" class="form-check-input" id="sock_<?= $s->id ?>">
                                    <label class="form-check-label" for="sock_<?= $s->id ?>">
                                        <?= $s->name ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button class="btn btn-success mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>