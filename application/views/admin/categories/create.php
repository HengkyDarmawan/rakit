<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Category</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post" action="<?= site_url('admin/categories/store') ?>">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <button class="btn btn-success">Save</button>
                <a href="<?= site_url('admin/categories') ?>" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>
</div>