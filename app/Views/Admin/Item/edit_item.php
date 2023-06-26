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
                    <form method="POST" action="/item/update" id="quickForm">
                        <input name="id" type="text" hidden value="<?= $item['id_barang']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_barag">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?= $item['kode_barang']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $item['nama_barang']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Katagori</label>
                                <select class="form-control select2" name="katagori" style="width: 100%;">
                                    <option>- pilih katagori -</option>
                                    <?php foreach ($katagori as $k) : ?>
                                        <option <?= ($item['id_katagori'] == $k['id_katagori']) ? "selected" : ''; ?> value="<?= $k['id_katagori']; ?>"><?= $k['katagori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="satuan" value="<?= $item['satuan']; ?>" placeholder="pcs">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" value="<?= $item['harga']; ?>" placeholder="50000">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $item['keterangan']; ?>" placeholder="Perkakas">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right toastrDefaultSuccess">Ubah Data</button>
                            <a href="/item" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>