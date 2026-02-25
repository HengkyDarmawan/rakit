<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cooler Socket Support</h1>
        <a href="<?= site_url('admin/cooler_support/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Konfigurasi
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dukungan Socket per Cooler</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="35%">Nama Cooler</th>
                            <th width="45%">Supported Sockets</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($supports as $s): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="font-weight-bold text-dark"><?= $s->cooler_name ?></td>
                            <td>
                                <?php 
                                if($s->socket_list):
                                    $sockets = explode(',', $s->socket_list);
                                    foreach($sockets as $sock): 
                                        // Memberikan warna berbeda untuk Intel/AMD (Opsional)
                                        $badgeColor = (strpos(strtolower($sock), 'lga') !== false) ? 'badge-primary' : 'badge-danger';
                                ?>
                                    <span class="badge <?= $badgeColor ?> px-2 py-1 mb-1 shadow-sm" style="font-size: 0.85rem;">
                                        <i class="fas fa-microchip fa-sm mr-1"></i> <?= trim($sock) ?>
                                    </span>
                                <?php 
                                    endforeach; 
                                else:
                                    echo '<span class="text-muted small italic">Belum ada socket diinput</span>';
                                endif;
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="<?= site_url('admin/cooler_support/edit/'.$s->cooler_id) ?>" 
                                       class="btn btn-warning btn-sm shadow-sm" title="Edit Sockets">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= site_url('admin/cooler_support/delete/'.$s->cooler_id) ?>" 
                                       class="btn btn-danger btn-sm shadow-sm"
                                       onclick="return confirm('Menghapus data ini akan menghilangkan semua list socket untuk cooler ini. Yakin?')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>