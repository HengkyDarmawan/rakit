<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Brands</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post" action="<?= site_url('admin/brands/update/'.$brand->id) ?>">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           value="<?= $brand->name ?>"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-success">Update</button>
                <a href="<?= site_url('admin/brands') ?>" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>
</div>