<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data All Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <a href="/supplier/add" class="btn btn-primary mb-3">Tambah Data</a>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($supplier as $s) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $s['nama_supplier']; ?></td>
                                        <td><?= $s['alamat']; ?></td>
                                        <td><?= $s['telepon']; ?></td>
                                        <td>
                                            <a href="<?= site_url('supplier/edit/' . $s['id_supplier']); ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= site_url('supplier/delete/' . $s['id_supplier']); ?>" class="btn btn-danger delete-button" data-toggle="modal" data-target="#modal-warning">Hapus</a>
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