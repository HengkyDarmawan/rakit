<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('admin/cooler_support/update/'.$cooler_id) ?>">

                <div class="form-group">
                    <label>Cooler</label>
                    <select class="form-control select2-search" disabled>
                        <?php foreach($coolers as $c): ?>
                        <option value="<?= $c->id ?>" <?= ($c->id == $cooler_id) ? 'selected' : '' ?>>
                            <?= $c->name ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="cooler_id" value="<?= $cooler_id ?>">
                </div>

                <div class="form-group mt-3">
                    <label>Support Socket</label>
                    <div class="row ml-1">
                        <?php foreach($sockets as $s): ?>
                        <div class="col-md-3 mb-2">
                            <div class="form-check">
                                <input type="checkbox" 
                                       name="socket_ids[]" 
                                       value="<?= $s->id ?>"
                                       id="sock_<?= $s->id ?>"
                                       <?= in_array($s->id, $selected) ? 'checked' : '' ?>
                                       class="form-check-input">
                                <label class="form-check-label" for="sock_<?= $s->id ?>"><?= $s->name ?></label>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button class="btn btn-success mt-3">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>