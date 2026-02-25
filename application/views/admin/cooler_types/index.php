<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Cooler Types</h1>

    <a href="<?= site_url('admin/cooler_types/create') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Cooler Type
    </a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($cooler_types as $c): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $c->name ?></td>
                        <td>
                            <a href="<?= site_url('admin/cooler_types/edit/'.$c->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('admin/cooler_types/delete/'.$c->id) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus data ini?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>