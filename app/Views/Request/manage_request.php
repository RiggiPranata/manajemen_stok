<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data All Request</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <a href="/manage_request/add" class="btn btn-primary mb-3">Tambah Data</a>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Penjualan</th>
                                    <th>Barang</th>
                                    <th>Pelayan/PIC</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($request as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $r['id_penjualan']; ?></td>
                                        <td><?= $r['kode_barang']; ?> - <?= $r['nama_barang']; ?></td>
                                        <td><?= $r['username']; ?></td>
                                        <td><?= $r['jumlah']; ?></td>
                                        <td><?= format_rupiah($r['total_harga']); ?></td>
                                        <td><?= $r['tanggal_penjualan']; ?></td>
                                        <td>
                                            <a href="<?= site_url('manage_request/edit/' . $r['id_penjualan']); ?>" class="btn btn-info btn-block">Edit</a>
                                            <a href="<?= site_url('manage_request/delete/' . $r['id_penjualan']); ?>" class="btn btn-danger delete-button btn-block" data-title="Warning!" data-toggle="modal" data-target="#modal-warning">Hapus</a>
                                        </td>
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