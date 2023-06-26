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
                    <form method="POST" action="/item/save" id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" placeholder="0001" id="kode_barang">
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Guting">
                            </div>
                            <div class="form-group">
                                <label>Katagori</label>
                                <select class="form-control select2" name="katagori" style="width: 100%;">
                                    <option selected="selected">- pilih katagori -</option>
                                    <?php foreach ($katagori as $k) : ?>
                                        <option value="<?= $k['id_katagori']; ?>"><?= $k['katagori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="pcs">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" placeholder="50000">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Perkakas">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right toastrDefaultSuccess">Tambah Data</button>
                            <a href="/item" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>