<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Storage Type</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" 
                           placeholder="Contoh: NVMe / SSD SATA / HDD" required>
                </div>

                <div class="form-group">
                    <label>Interface</label>
                    <input type="text" name="interface_type" class="form-control" 
                           placeholder="Contoh: PCIe 4.0 / SATA III">
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="<?= site_url('admin/storage_types') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>