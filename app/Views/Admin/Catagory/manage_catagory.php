<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Catagory</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <a href="/catagory/add" class="btn btn-primary mb-3">Tambah Data</a>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Catagory</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($katagori as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $k['katagori']; ?></td>
                                        <td>
                                            <a href="<?= site_url('catagory/edit/' . $k['id_katagori']); ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= site_url('catagory/delete/' . $k['id_katagori']); ?>" class="btn btn-danger delete-button" data-toggle="modal" data-target="#modal-warning">Hapus</a>
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