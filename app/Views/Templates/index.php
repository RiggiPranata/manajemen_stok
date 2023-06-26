<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <base href="<?= base_url('adminlte'); ?>/">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed dark-mode" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $this->include('Templates/navbar'); ?>

        <!-- Main Sidebar Container -->
        <?= $this->include('Templates/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb float-right">
                                    <?php if ($segment == 1) : ?>
                                        <li class="breadcrumb-item"><a href="<?= site_url(); ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                                    <?php elseif ($segment > 1) : ?>
                                        <li class="breadcrumb-item"><a href="<?= site_url(); ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="<?= site_url($link_bc); ?>"><?= $bc; ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                                    <?php elseif ($segment == 0) : ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                                    <?php endif; ?>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?= $this->renderSection('pages-content') ?>
        </div>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?= $this->include('Templates/footer'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="text-red font-weight-bold">Warning! </span>Konfirmasi Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="delete-confirm-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- jquery-validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            // validation form
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                    nama_supplier: {
                        required: true
                    },
                    alamat: {
                        required: true
                    },
                    no_telepon: {
                        required: true,
                        number: true,
                    },
                    catagory: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms",
                    nama_supplier: "Please enter a name of supplier",
                    alamat: "Please enter your address",
                    no_telepon: {
                        required: "Please enter your no telepon",
                        number: "Please enter just a number"
                    },
                    catagory: "Please enter the catagory",
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
            // Notif Toast
            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Data berhasil ditambah/diubah.')
            });
            // Datatable
            var menu = 'purchase_report';
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: 'copy',
                        exportOptions: function(dataTable) {
                            if ($(dataTable.table().node()).hasClass('purchase_report')) {
                                // Menu "purchase_report"
                                return {
                                    columns: ':not(:first-child)'
                                };
                            } else {
                                // Menu lainnya
                                return {
                                    columns: ':not(:first-child):not(:last-child)'
                                };
                            }
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: function(dataTable) {
                            if ($(dataTable.table().node()).hasClass('purchase_report')) {
                                // Menu "purchase_report"
                                return {
                                    columns: ':not(:first-child)'
                                };
                            } else {
                                // Menu lainnya
                                return {
                                    columns: ':not(:first-child):not(:last-child)'
                                };
                            }
                        },
                        title: function() {
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            var formattedDate = day + '_' + month + '_' + year;

                            return '*' + "_" + formattedDate;
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: function(dataTable) {
                            if ($(dataTable.table().node()).hasClass('purchase_report')) {
                                // Menu "purchase_report"
                                return {
                                    columns: ':not(:first-child)'
                                };
                            } else {
                                // Menu lainnya
                                return {
                                    columns: ':not(:first-child):not(:last-child)'
                                };
                            }
                        },
                        customizeData: function(data) {
                            // Mengubah format kolom Total Harga menjadi angka
                            for (var i = 0; i < data.body.length; i++) {
                                var totalHarga = data.body[i][4]; // Kolom indeks 4 (Total Harga)
                                data.body[i][4] = totalHarga.replace('Rp. ', '').replace('.', '');
                            }
                        },
                        title: function() {
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            var formattedDate = day + '_' + month + '_' + year;

                            return '*' + "_" + formattedDate;
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: function(dataTable) {
                            if ($(dataTable.table().node()).hasClass('purchase_report')) {
                                // Menu "purchase_report"
                                return {
                                    columns: ':visible'
                                };
                            } else {
                                // Menu lainnya
                                return {
                                    columns: ':not(:last-child)'
                                };
                            }
                        },
                        title: function() {
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            var formattedDate = day + '_' + month + '_' + year;

                            return '*' + "_" + formattedDate;
                        }
                    },
                    {
                        // error colom export
                        extend: 'print',
                        exportOptions: function(dataTable) {
                            if ($(dataTable.table().node()).hasClass('purchase_report')) {
                                // Menu "purchase_report"
                                return {
                                    columns: ':visible'
                                };
                            } else {
                                // Menu lainnya
                                return {
                                    columns: ':not(:last-child)'
                                };
                            }
                        },
                        title: function() {
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth() + 1;
                            var year = date.getFullYear();
                            var formattedDate = day + '_' + month + '_' + year;

                            return '*' + " " + formattedDate;
                        }
                    },
                    'colvis'
                ],

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


            // Menampilkan semua kolom ketika berada di menu tertentu
            if (menu === 'purchase_report') {
                table.columns().visible(true);
            }

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
            // Filter date range
            // Inisialisasi DataTable
            var dataTable = $('#example1').DataTable();

            // Tambahkan Date Range Picker
            $('#daterange').daterangepicker({
                autoUpdateInput: false,
                timePicker: true,
                timePicker24Hour: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            // Menangani perubahan tanggal pada Date Range Picker
            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' - ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
                dataTable.draw(); // Memperbarui tampilan DataTable
            });

            // Menangani tombol "Clear"
            $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                dataTable.draw(); // Memperbarui tampilan DataTable
            });

            // Menerapkan custom filter pada DataTable
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var dateRange = $('#daterange').val();
                    if (!dateRange) {
                        return true;
                    }

                    var startDate = dateRange.split(' - ')[0];
                    var endDate = dateRange.split(' - ')[1];
                    var tanggalPenjualan = data[6]; // Kolom indeks 5 (Tanggal Penjualan)

                    if (tanggalPenjualan >= startDate && tanggalPenjualan <= endDate) {
                        return true;
                    }

                    return false;
                }
            );

            // Jquery Confirm delete
            $(document).ready(function() {
                $('.delete-button').click(function(e) {
                    e.preventDefault();
                    var deleteUrl = $(this).attr('href');
                    $('#confirm-delete').modal('show');

                    $('#delete-confirm-btn').click(function() {
                        window.location.href = deleteUrl;
                    });
                });
            });
            // perhitungan total harga add
            $(document).ready(function() {
                $('#pilihan_barang').change(function() {
                    var selectedId = $(this).val();
                    getHargaBarang(selectedId);
                });

                $('#jumlah_barang').keyup(function() {
                    hitungTotalHarga();
                });

                function getHargaBarang(id) {
                    $.ajax({
                        url: '<?= site_url('/item/get_harga') ?>',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var hargaBarang = parseFloat(response);
                            $('#harga_barang').val(hargaBarang);
                            hitungTotalHarga();

                        }

                    });

                }

                function formatRupiah(nominal) {
                    var formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    });

                    return formatter.format(nominal);
                }

                function hitungTotalHarga() {
                    var hargaBarang = parseFloat($('#harga_barang').val());
                    var jumlahBarang = parseInt($('#jumlah_barang').val());
                    var totalHarga = hargaBarang * jumlahBarang;

                    $('#formatted_total_harga').val(formatRupiah(totalHarga));

                    var formattedTotalHarga = formatRupiah(totalHarga);
                    $('#formatted_total_harga').text(formattedTotalHarga);
                    $('#total_harga').val(totalHarga);
                }
            });

            //hitung harga edit
            $(document).ready(function() {
                var id_barang = parseFloat($('#pilihan_barang').val());
                var hargaBarang = getHargaBarang(id_barang);

                $('#jumlah_barang').keyup(function() {
                    hitungTotalHarga();
                });


                function getHargaBarang(id) {
                    $.ajax({
                        url: '<?= site_url('/item/get_harga') ?>',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var hargaBarang = parseFloat(response);
                            $('#harga_barang').val(hargaBarang);
                            hitungTotalHarga();

                        }

                    });

                }

                function formatRupiah(nominal) {
                    var formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    });

                    return formatter.format(nominal);
                }

                function hitungTotalHarga() {
                    var hargaBarang = parseFloat($('#harga_barang').val());
                    var jumlahBarang = parseInt($('#jumlah_barang').val());
                    var totalHarga = hargaBarang * jumlahBarang;

                    $('#formatted_total_harga').val(formatRupiah(totalHarga));

                    var formattedTotalHarga = formatRupiah(totalHarga);
                    $('#formatted_total_harga').text(formattedTotalHarga);
                    $('#total_harga').val(totalHarga);
                }
            });

            //validasi add
            $(document).ready(function() {
                $('#prosesTransaksiBtn').click(function(e) {
                    e.preventDefault();
                    var selectedId = parseInt($('#pilihan_barang').val());
                    var jumlah_beli = parseInt($('#jumlah_barang').val());



                    $.ajax({
                        url: "<?php echo base_url('manage_supply/check-stok'); ?>",
                        method: "POST",
                        data: {
                            nama_barang: selectedId,
                            jumlah_pembelian: jumlah_beli,
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === "success") {
                                // Lanjutkan proses transaksi
                                $('.formTransaksi').submit();
                            } else {
                                // Tampilkan pesan kesalahan
                                console.log(response.message);
                                alert(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });
            });

        });
    </script>

</body>

</html>