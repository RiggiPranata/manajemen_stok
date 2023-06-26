<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data All Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>E-mails</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['name']; ?></td>
                                        <td><a href="<?= site_url('admin/' . $user['userid']); ?>" class="btn btn-info">Detail</a>
                                            <a href="<?= site_url('admin/delete_user/' . $user['userid']); ?>" class="btn btn-danger" data-toggle="modal" data-target="#modal-warning">Hapus</a>
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
    <div class="modal fade" id="modal-warning">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title text-warning">Warning</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apa anda yakin menghapus data ini&hellip;?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <a href="<?= site_url('admin/delete_user/' . $user['userid']); ?>" class="btn btn-outline-light">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<?= $this->endSection(); ?>