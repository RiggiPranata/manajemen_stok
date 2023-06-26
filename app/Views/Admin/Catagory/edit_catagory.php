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
                    <form method="POST" action="/catagory/update" id="quickForm">
                        <input name="id" type="text" hidden value="<?= $catagory['id_katagori']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="catagory">Catagory</label>
                                <input type="text" class="form-control" name="catagory" id="catagory" value="<?= $catagory['katagori']; ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right toastrDefaultSuccess">Ubah Data</button>
                            <a href="/catagory" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>