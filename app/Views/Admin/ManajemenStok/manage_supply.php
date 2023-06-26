<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data All Supply</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <a href="/manage_supply/add" class="btn btn-primary mb-3">Tambah Data</a>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Transaksi</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Suppier</th>
                                    <th>Stok Barang</th>
                                    <th>Barang Keluar</th>
                                    <th>Sisa Barang</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $t['id_transaksi']; ?></td>
                                        <td><?= $t['kode_barang']; ?></td>
                                        <td><?= $t['nama_barang']; ?></td>
                                        <td><?= $t['nama_supplier']; ?></td>
                                        <td><?= $t['stok_barang']; ?></td>
                                        <td><?= $t['barang_keluar']; ?></td>
                                        <td><?= $t['sisa_barang']; ?></td>
                                        <td><?= $t['keterangan']; ?></td>
                                        <td><?= $t['tanggal_masuk']; ?></td>
                                        <td>
                                            <a href="<?= site_url('manage_supply/edit/' . $t['id_transaksi']); ?>" class="btn btn-info btn-block">Edit</a>
                                            <a href="<?= site_url('manage_supply/delete/' . $t['id_transaksi']); ?>" class="btn btn-danger delete-button btn-block" data-title="Warning!" data-toggle="modal" data-target="#modal-warning">Hapus</a>
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