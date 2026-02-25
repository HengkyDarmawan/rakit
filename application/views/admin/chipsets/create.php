<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>Socket</label>
                    <select name="socket_id" class="form-control select2" required>
                        <option value="">Pilih Socket</option>
                        <?php foreach($sockets as $s): ?>
                            <option value="<?= $s->id ?>"><?= $s->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Chipset Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('admin/chipsets') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>