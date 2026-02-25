<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Categories</h1>

    <a href="<?= site_url('admin/categories/create') ?>" 
       class="btn btn-primary mb-3">
       + Add Category
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $c): ?>
                    <tr>
                        <td><?= $c->name ?></td>
                        <td><?= $c->slug ?></td>
                        <td>
                            <a href="<?= site_url('admin/categories/edit/'.$c->id) ?>"
                               class="btn btn-warning btn-sm">Edit</a>

                            <a href="<?= site_url('admin/categories/delete/'.$c->id) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this category?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>