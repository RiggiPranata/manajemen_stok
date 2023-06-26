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
                    <form method="POST" action="/manage_supply/save" id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Barang</label>
                                <select class="form-control select2" name="id_barang" style="width: 100%;">
                                    <option selected="selected">- pilih barang -</option>
                                    <?php foreach ($items as $item) : ?>
                                        <option value="<?= $item['id_barang']; ?>"><?= $item['kode_barang']; ?>-<?= $item['nama_barang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control select2" name="id_supplier" style="width: 100%;">
                                    <option selected="selected">- pilih supplier -</option>
                                    <?php foreach ($supplier as $s) : ?>
                                        <option value="<?= $s['id_supplier']; ?>"><?= $s['nama_supplier']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok_barang">Stok Barang</label>
                                <input type="number" class="form-control" name="stok_barang" id="stok_barang">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Guting">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk:</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" name="tanggal_masuk" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right toastrDefaultSuccess">Tambah Data</button>
                            <a href="/manage_supply" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>