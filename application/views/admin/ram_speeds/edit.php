<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit RAM Speed</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>RAM Type</label>
                    <select name="ram_type_id" class="form-control select2" required>
                        <?php foreach($ram_types as $rt): ?>
                            <option value="<?= $rt->id ?>"
                                <?= $ram_speed->ram_type_id == $rt->id ? 'selected' : '' ?>>
                                <?= $rt->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Speed (MHz)</label>
                    <input type="number" name="speed_mhz"
                           value="<?= $ram_speed->speed_mhz ?>"
                           class="form-control" required>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="<?= site_url('admin/ram_speeds') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>