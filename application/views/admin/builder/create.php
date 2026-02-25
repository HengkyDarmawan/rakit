<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Simulasi PC Builder</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pilih Komponen</h6>
                </div>
                <div class="card-body">
                    <form id="form-builder">
                        
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Nama Customer (Untuk Draft)</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Masukkan nama pemesan..." required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>1. Processor (CPU)</label>
                            <select class="form-control build-select select2" name="cpu_id" id="cpu">
                                <option value="">-- Pilih CPU --</option>
                                <?php foreach($cpus as $c): ?>
                                    <option value="<?= $c->id ?>" 
                                        data-price="<?= $c->selling_price ?>" 
                                        data-watt="<?= $c->watt ?>" 
                                        data-socket="<?= $c->socket_id ?>">
                                        <?= $c->name ?> (Rp <?= number_format($c->selling_price,0,',','.') ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>2. Motherboard</label>
                            <select class="form-control build-select select2" name="mobo_id" id="motherboard" disabled>
                                <option value="">-- Pilih CPU Terlebih Dahulu --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>3. RAM / Memory</label>
                            <select class="form-control build-select select2" name="ram_id" id="ram" disabled>
                                <option value="">-- Pilih Motherboard Terlebih Dahulu --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>4. Graphic Card (VGA)</label>
                            <select class="form-control build-select select2" name="vga_id" id="vga">
                                <option value="">-- Tanpa VGA / Pilih VGA --</option>
                                <?php foreach($vgas as $v): ?>
                                    <option value="<?= $v->id ?>" data-price="<?= $v->selling_price ?>" data-watt="<?= $v->watt ?>">
                                        <?= $v->name ?> (Rp <?= number_format($v->selling_price,0,',','.') ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>5. Storage (SSD/HDD)</label>
                            <select class="form-control build-select select2" name="storage_id" id="storage">
                                <option value="">-- Pilih Storage --</option>
                                <?php foreach($storages as $s): ?>
                                    <option value="<?= $s->id ?>" data-price="<?= $s->selling_price ?>" data-watt="<?= $s->watt ?>">
                                        <?= $s->name ?> (Rp <?= number_format($s->selling_price,0,',','.') ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>6. CPU Cooler</label>
                            <select class="form-control build-select select2" name="cooler_id" id="cooler" disabled>
                                <option value="">-- Pilih CPU / Motherboard Terlebih Dahulu --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>7. Casing</label>
                            <select class="form-control build-select select2" name="case_id" id="casing" disabled>
                                <option value="">-- Pilih Motherboard Terlebih Dahulu --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>8. Power Supply (PSU)</label>
                            <select class="form-control build-select select2" name="psu_id" id="psu">
                                <option value="">-- Pilih PSU --</option>
                                <?php foreach($psus as $p): ?>
                                    <option value="<?= $p->id ?>" data-price="<?= $p->selling_price ?>" data-watt="<?= $p->watt ?>" data-maxwatt="<?= $p->max_watt ?>">
                                        <?= $p->name ?> (Rp <?= number_format($p->selling_price,0,',','.') ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger d-none" id="psu-warning">Peringatan: Daya PSU lebih rendah dari Total Kebutuhan Watt PC!</small>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4" style="position: sticky; top: 20px;">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Estimasi Build</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Watt:</span>
                        <strong id="total-watt" class="text-warning">0 W</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span>Total Harga:</span>
                        <strong id="total-price" class="text-success h5">Rp 0</strong>
                    </div>
                    <button type="button" id="btn-save-draft" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan ke Draft</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // 1. Format Rupiah
    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);
    }

    // 2. Kalkulasi Total Harga dan Watt secara Live
    function calculateTotals() {
        let totalPrice = 0;
        let totalWatt = 0;
        let selectedPsuMaxWatt = 0;

        $('.build-select').each(function() {
            let option = $(this).find('option:selected');
            if (option.val()) {
                let price = parseFloat(option.data('price')) || 0;
                let watt = parseFloat(option.data('watt')) || 0;
                
                totalPrice += price;
                totalWatt += watt;

                // Cek jika ini adalah dropdown PSU
                if($(this).attr('id') === 'psu') {
                    selectedPsuMaxWatt = parseFloat(option.data('maxwatt')) || 0;
                }
            }
        });

        $('#total-price').text(formatRupiah(totalPrice));
        $('#total-watt').text(totalWatt + ' W');

        // Peringatan jika PSU tidak kuat
        if(selectedPsuMaxWatt > 0 && totalWatt > selectedPsuMaxWatt) {
            $('#psu-warning').removeClass('d-none');
        } else {
            $('#psu-warning').addClass('d-none');
        }
    }

    // Event listener setiap ada perubahan di semua select2
    $('.build-select').on('change', function() {
        calculateTotals();
    });

    // 3. Logic Filter Beruntun (Hierarki)
    
    // --> KETIKA CPU BERUBAH
    $('#cpu').on('change', function() {
        let cpuId = $(this).val();
        let socketId = $(this).find('option:selected').data('socket');

        // RESET DROPDOWN DI BAWAHNYA
        $('#motherboard').html('<option value="">-- Pilih Motherboard --</option>').prop('disabled', true);
        $('#ram').html('<option value="">-- Pilih Motherboard Terlebih Dahulu --</option>').prop('disabled', true);
        $('#casing').html('<option value="">-- Pilih Motherboard Terlebih Dahulu --</option>').prop('disabled', true);
        $('#cooler').html('<option value="">-- Pilih CPU Cooler --</option>').prop('disabled', true);

        if (cpuId) {
            // A. Fetch Motherboards via AJAX
            $.ajax({
                url: '<?= base_url("admin/builder/ajax_get_motherboards") ?>',
                type: 'POST',
                dataType: 'json',
                data: { socket_id: socketId },
                success: function(data) {
                    $('#motherboard').prop('disabled', false);
                    $.each(data, function(key, val) {
                        $('#motherboard').append(`<option value="${val.id}" data-price="${val.selling_price}" data-watt="${val.watt}" data-ramtype="${val.ram_type_id}" data-formfactor="${val.form_factor_id}">${val.name} (Rp ${new Intl.NumberFormat('id-ID').format(val.selling_price)})</option>`);
                    });
                }
            });

            // B. Fetch CPU Coolers via AJAX
            $.ajax({
                url: '<?= base_url("admin/builder/ajax_get_coolers") ?>',
                type: 'POST',
                dataType: 'json',
                data: { socket_id: socketId },
                success: function(data) {
                    $('#cooler').prop('disabled', false);
                    $.each(data, function(key, val) {
                        $('#cooler').append(`<option value="${val.id}" data-price="${val.selling_price}" data-watt="${val.watt}">${val.name} (Rp ${new Intl.NumberFormat('id-ID').format(val.selling_price)})</option>`);
                    });
                }
            });
        }
        calculateTotals();
    });


    // --> KETIKA MOTHERBOARD BERUBAH
    $('#motherboard').on('change', function() {
        let moboId = $(this).val();
        let ramTypeId = $(this).find('option:selected').data('ramtype');
        let formFactorId = $(this).find('option:selected').data('formfactor');

        // RESET DROPDOWN DI BAWAHNYA
        $('#ram').html('<option value="">-- Pilih RAM --</option>').prop('disabled', true);
        $('#casing').html('<option value="">-- Pilih Casing --</option>').prop('disabled', true);

        if (moboId) {
            // A. Fetch RAM
            $.ajax({
                url: '<?= base_url("admin/builder/ajax_get_rams") ?>',
                type: 'POST',
                dataType: 'json',
                data: { ram_type_id: ramTypeId },
                success: function(data) {
                    $('#ram').prop('disabled', false);
                    $.each(data, function(key, val) {
                        $('#ram').append(`<option value="${val.id}" data-price="${val.selling_price}" data-watt="${val.watt}">${val.name} (Rp ${new Intl.NumberFormat('id-ID').format(val.selling_price)})</option>`);
                    });
                }
            });

            // B. Fetch Casing
            $.ajax({
                url: '<?= base_url("admin/builder/ajax_get_cases") ?>',
                type: 'POST',
                dataType: 'json',
                data: { form_factor_id: formFactorId },
                success: function(data) {
                    $('#casing').prop('disabled', false);
                    $.each(data, function(key, val) {
                        $('#casing').append(`<option value="${val.id}" data-price="${val.selling_price}" data-watt="${val.watt}">${val.name} (Rp ${new Intl.NumberFormat('id-ID').format(val.selling_price)})</option>`);
                    });
                }
            });
        }
        calculateTotals();
    });

    // 4. Save Draft via AJAX
    $('#btn-save-draft').click(function(e) {
        e.preventDefault();
        
        let formData = $('#form-builder').serialize();

        if($('#customer_name').val() === '') {
            alert('Mohon isi nama Customer terlebih dahulu!');
            $('#customer_name').focus();
            return;
        }

        $.ajax({
            url: '<?= base_url("admin/builder/ajax_save_draft") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $('#btn-save-draft').prop('disabled', true).text('Menyimpan...');
            },
            success: function(res) {
                if(res.status === 'success') {
                    alert(res.msg);
                    window.location.reload(); // Refresh setelah berhasil
                } else {
                    alert(res.msg);
                    $('#btn-save-draft').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan ke Draft');
                }
            },
            error: function() {
                alert('Terjadi kesalahan pada server!');
                $('#btn-save-draft').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan ke Draft');
            }
        });
    });

});
</script>