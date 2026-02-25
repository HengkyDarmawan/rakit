<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Storage Type</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name"
                           value="<?= $storage->name ?>"
                           class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Interface</label>
                    <input type="text" name="interface_type"
                           value="<?= $storage->interface_type ?>"
                           class="form-control">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="<?= site_url('admin/storage_types') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>