<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Socket</label>
                    <select name="socket_id" class="form-control select2" required>
                        <?php foreach($sockets as $s): ?>
                            <option value="<?= $s->id ?>" 
                                <?= $chipset->socket_id == $s->id ? 'selected' : '' ?>>
                                <?= $s->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Chipset Name</label>
                    <input type="text" name="name" 
                        value="<?= $chipset->name ?>" 
                        class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="<?= base_url('admin/chipsets') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>