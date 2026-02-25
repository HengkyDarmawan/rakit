<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">RAM Speeds</h1>

    <a href="<?= site_url('admin/ram_speeds/create') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah RAM Speed
    </a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>RAM Type</th>
                        <th>Speed (MHz)</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($ram_speeds as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r->ram_type_name ?></td>
                        <td><?= $r->speed_mhz ?> MHz</td>
                        <td>
                            <a href="<?= site_url('admin/ram_speeds/edit/'.$r->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('admin/ram_speeds/delete/'.$r->id) ?>" 
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