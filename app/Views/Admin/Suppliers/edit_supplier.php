<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form method="POST" action="/supplier/update" id="quickForm">
                        <input name="id" type="text" hidden value="<?= $supplier['id_supplier']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_supplier">Nama Supplier</label>
                                <input type="text" readonly class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $supplier['nama_supplier']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $supplier['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">No Telepon</label>
                                <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="<?= $supplier['telepon']; ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right toastrDefaultSuccess">Ubah Data</button>
                            <a href="/manage_supplier" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>