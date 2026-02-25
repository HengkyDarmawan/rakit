<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah RAM Speed</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>RAM Type</label>
                    <select name="ram_type_id" class="form-control select2" required>
                        <option value="">-- Pilih RAM Type --</option>
                        <?php foreach($ram_types as $rt): ?>
                            <option value="<?= $rt->id ?>"><?= $rt->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Speed (MHz)</label>
                    <input type="number" name="speed_mhz" class="form-control" required>
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="<?= site_url('admin/ram_speeds') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>