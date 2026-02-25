<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Cooler Type</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" 
                           placeholder="Contoh: Air Cooling / Liquid Cooling" required>
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="<?= site_url('admin/cooler_types') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>