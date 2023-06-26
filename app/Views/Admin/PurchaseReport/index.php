<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Purchase</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="daterange">Filter Tanggal:</label>
                                <input type="text" id="daterange" class="form-control" />
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped purchase_report">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Penjualan</th>
                                    <th>Barang</th>
                                    <th>Pelayan/PIC</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($purchase as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $p['id_penjualan']; ?></td>
                                        <td><?= $p['kode_barang']; ?> - <?= $p['nama_barang']; ?></td>
                                        <td><?= $p['username']; ?></td>
                                        <td><?= $p['jumlah']; ?></td>
                                        <td><?= format_rupiah($p['total_harga']); ?></td>
                                        <td><?= $p['tanggal_penjualan']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</section>
<?= $this->endSection(); ?>