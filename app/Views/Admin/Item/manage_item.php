<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data All Item</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <a href="/item/add" class="btn btn-primary mb-3">Tambah Data</a>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Katagori</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($items as $item) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $item['kode_barang']; ?></td>
                                        <td><?= $item['nama_barang']; ?></td>
                                        <td><?= $item['katagori']; ?></td>
                                        <td><?= $item['satuan']; ?></td>
                                        <td><?= format_rupiah($item['harga']); ?></td>
                                        <td><?= $item['keterangan']; ?></td>
                                        <td>
                                            <a href="<?= site_url('item/edit/' . $item['id_barang']); ?>" class="btn btn-info btn-block mb-2">Edit</a>
                                            <a href="<?= site_url('item/delete/' . $item['id_barang']); ?>" class="btn btn-danger delete-button btn-block" data-toggle="modal" data-target="#modal-warning">Hapus</a>
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