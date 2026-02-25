<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

    <div class="card shadow">
        <div class="card-body">

            <form method="post" action="<?= site_url('admin/categories/update/'.$category->id) ?>">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           value="<?= $category->name ?>"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-success">Update</button>
                <a href="<?= site_url('admin/categories') ?>" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>
</div>