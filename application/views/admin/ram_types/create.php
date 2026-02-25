<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>RAM Type Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('admin/ram_types') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>