

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/')?>js/demo/datatables-demo.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            // =====================================
            // INIT SELECT2
            // =====================================
            if ($('.select2').length) {
                $('.select2').select2({
                    width: '100%'
                });
            }

            // =====================================
            // BUDGET BADGE
            // =====================================
            if ($('#budget').length) {

                function updateBudgetBadge(val) {
                    let badge = $('#budgetPreview');
                    badge.removeClass().addClass('badge mt-2');

                    if (val === 'low') {
                        badge.addClass('badge-success').text('Low');
                    } 
                    else if (val === 'medium') {
                        badge.addClass('badge-warning').text('Medium');
                    } 
                    else if (val === 'high') {
                        badge.addClass('badge-danger').text('High');
                    }
                }

                updateBudgetBadge($('#budget').val());

                $('#budget').on('change', function() {
                    updateBudgetBadge($(this).val());
                });
            }


            // =====================================
            // CATEGORY SPEC FIELD CONTROL (FIXED)
            // =====================================

            if ($('#category_id').length) {

                const categorySpecMap = {

                    'cpu': ['socket','watt'],

                    'motherboard': [
                        'socket','chipset','ram_type','form_factor',
                        'nvme_slot','sata_port','mb_fan_header', 'rgb_header'
                    ],

                    'ram': ['ram_type','ram_speed'],

                    'vga': ['watt','fan_count'],

                    'psu': ['max_watt','psu_certification','psu_modular_type'],

                    'storage': ['storage_type'],

                    'casing': ['form_factor','case_fan_support'],

                    'cpu-cooler': ['cooler_type'],

                    'fan-cooler': ['fan_type']
                };


                const allFields = [
                    'socket',
                    'chipset',
                    'ram_type',
                    'ram_speed',
                    'form_factor',
                    'storage_type',
                    'cooler_type',
                    'fan_type',
                    'watt',
                    'max_watt',
                    'nvme_slot',
                    'sata_port',
                    'mb_fan_header',
                    'case_fan_support',
                    'fan_count',
                    'psu_certification',
                    'psu_modular_type'
                ];


                function renderFields(slug) {

                    // hide semua dulu
                    allFields.forEach(function(field) {
                        $('#field_' + field).addClass('d-none');
                    });

                    if (!slug || !categorySpecMap[slug]) return;

                    // show sesuai category
                    categorySpecMap[slug].forEach(function(field) {
                        $('#field_' + field).removeClass('d-none');
                    });
                }


                function getSelectedSlug() {
                    return $('#category_id option:selected').data('slug');
                }


                // Trigger saat load (EDIT SAFE)
                renderFields(getSelectedSlug());

                // Trigger saat change
                $('#category_id').on('change', function() {
                    renderFields(getSelectedSlug());
                });

            }

        });
    </script>
    <script>
        $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            width: '100%',
            placeholder: "-- Pilih Komponen --",
            allowClear: true
        });

        let state = { cpuWatt: 0, vgaWatt: 0, mbWatt: 20, ramWatt: 10, driveWatt: 10 };

        function calculateTotal() {
            let totalWatt = state.cpuWatt + state.vgaWatt + state.mbWatt + state.ramWatt + state.driveWatt;
            let totalHarga = 0;

            $('.select2').each(function() {
                let price = $(this).find(':selected').data('price') || 0;
                totalHarga += parseInt(price);
            });

            $('#totalWatt').text(totalWatt);
            $('#totalPrice').text(totalHarga.toLocaleString('id-ID'));
            return totalWatt;
        }

        // 1. Pilih CPU -> Ambil Motherboard & Cooler
        $('#cpu').on('change', function() {
            let selected = $(this).find(':selected');
            let socketId = selected.data('socket');
            state.cpuWatt = parseInt(selected.data('watt')) || 0;

            if (!socketId) return;

            // AJAX Motherboard berdasarkan Socket
            $.post('<?= site_url("builder/get_motherboard") ?>', { socket_id: socketId }, function(res) {
                let data = JSON.parse(res);
                let $mb = $('#motherboard');
                $mb.empty().append('<option value="">-- Pilih Motherboard --</option>');
                $.each(data, function(i, v) {
                    // Simpan ram_type_id di data-attribute untuk filter RAM nanti
                    $mb.append(`<option value="${v.id}" data-ram="${v.ram_type_id}" data-price="${v.selling_price}">${v.name}</option>`);
                });
                $mb.trigger('change');
            });
            
            calculateTotal();
        });

        // 2. Pilih Motherboard -> Ambil RAM berdasarkan ram_type_id
        $('#motherboard').on('change', function() {
            let ramType = $(this).find(':selected').data('ram');
            
            // Jika ram_type di mobo kosong, kita tampilkan semua RAM agar tidak stuck
            let postData = ramType ? { ram_type_id: ramType } : {};

            $.post('<?= site_url("builder/get_ram") ?>', postData, function(res) {
                let data = JSON.parse(res);
                let $ram = $('#ram');
                $ram.empty().append('<option value="">-- Pilih RAM --</option>');
                $.each(data, function(i, v) {
                    $ram.append(`<option value="${v.id}" data-price="${v.selling_price}">${v.name}</option>`);
                });
                $ram.trigger('change');
            });
            calculateTotal();
        });

        // 3. Pilih Casing -> Ambil VGA
        // Jika data casing tidak punya 'case_fan_support', tampilkan semua VGA
        $('#casing').on('change', function() {
            $.post('<?= site_url("builder/get_vga") ?>', {}, function(res) {
                let data = JSON.parse(res);
                let $vga = $('#vga');
                $vga.empty().append('<option value="">-- Pilih VGA --</option>');
                $.each(data, function(i, v) {
                    $vga.append(`<option value="${v.id}" data-watt="${v.watt}" data-price="${v.selling_price}">${v.name} (${v.watt}W)</option>`);
                });
                $vga.trigger('change');
            });
            calculateTotal();
        });

        // 4. Pilih VGA -> Ambil PSU
        $('#vga').on('change', function() {
            state.vgaWatt = parseInt($(this).find(':selected').data('watt')) || 0;
            let currentTotal = calculateTotal();

            $.post('<?= site_url("builder/get_psu") ?>', { total_watt: currentTotal }, function(res) {
                let data = JSON.parse(res);
                let $psu = $('#psu');
                $psu.empty().append('<option value="">-- Pilih PSU --</option>');
                $.each(data, function(i, v) {
                    $psu.append(`<option value="${v.id}" data-price="${v.selling_price}">${v.name} (${v.max_watt}W)</option>`);
                });
                $psu.trigger('change');
            });
        });

        // Event listener untuk harga komponen lain
        $('#ram, #psu, #storage, #cooler').on('change', function() {
            calculateTotal();
        });
    });
    </script>

</body>

</html>