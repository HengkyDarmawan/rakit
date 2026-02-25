

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

    </body>

</html>