<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Storage Types</h1>

    <a href="<?= site_url('admin/storage_types/create') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Storage Type
    </a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Interface</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($storage_types as $s): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $s->name ?></td>
                        <td><?= $s->interface_type ?></td>
                        <td>
                            <a href="<?= site_url('admin/storage_types/edit/'.$s->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('admin/storage_types/delete/'.$s->id) ?>" 
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