<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <a href="<?= base_url('admin/chipsets/create') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Chipset
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Chipset</th>
                            <th>Socket</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($chipsets as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->name ?></td>
                            <td><?= $row->socket_name ?></td>
                            <td>
                                <a href="<?= base_url('admin/chipsets/edit/'.$row->id) ?>" 
                                class="btn btn-warning btn-sm">Edit</a>

                                <a href="<?= base_url('admin/chipsets/delete/'.$row->id) ?>" 
                                onclick="return confirm('Yakin hapus?')" 
                                class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>