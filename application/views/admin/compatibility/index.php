<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th>No</th>
                <th>Nama Socket</th>
                <th>Chipset yang Mendukung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($sockets as $s): ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="font-weight-bold"><?= $s->name ?></td>
                <td>
                    <?php 
                    $query = $this->db->select('c.name')
                                      ->from('chipset_socket_rules csr')
                                      ->join('chipsets c', 'c.id = csr.chipset_id')
                                      ->where('csr.socket_id', $s->id)
                                      ->get()->result();
                    if($query):
                        foreach($query as $chip): ?>
                            <span class="badge badge-light border"><?= $chip->name ?></span>
                        <?php endforeach;
                    else:
                        echo '<small class="text-muted">Belum ada chipset diatur</small>';
                    endif;
                    ?>
                </td>
                <td class="text-center">
                    <a href="<?= site_url('admin/compatibility/manage/'.$s->id) ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-cog"></i> Atur Chipset
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>