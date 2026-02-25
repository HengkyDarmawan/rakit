<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Brands</h1>

    <a href="<?= site_url('admin/brands/create') ?>" 
       class="btn btn-primary mb-3">
       + Add Brand
    </a>

    <div class="card shadow">
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
                    <?php foreach($brands as $b): ?>
                    <tr>
                        <td><?= $b->name ?></td>
                        <td><?= $b->slug ?></td>
                        <td>
                            <a href="<?= site_url('admin/brands/edit/'.$b->id) ?>"
                               class="btn btn-warning btn-sm">Edit</a>

                            <a href="<?= site_url('admin/brands/delete/'.$b->id) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this brand?')">
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