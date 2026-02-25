<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Fan Type</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name"
                           value="<?= $fan->name ?>"
                           class="form-control" required>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="<?= site_url('admin/fan_types') ?>" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>