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
                    <form method="POST" action="/manage_request/save" class="formTransaksi" id="quickForm">
                        <?php $barang = null ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Barang</label>
                                <select class="form-control select2" name="id_barang" id="pilihan_barang" style="width: 100%;">
                                    <option selected="selected">- pilih barang -</option>
                                    <?php foreach ($items as $item) : ?>
                                        <option value="<?= $item['id_barang']; ?>"><?= $item['kode_barang']; ?>-<?= $item['nama_barang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span id="jumlah_stok"></span>
                            </div>
                            <input type="text" class="form-control" hidden id="harga_barang">
                            <div class="form-group">
                                <label for="jumlah_barang">Jumlah Barang</label>
                                <input type="number" class="form-control" name="jumlah_barang" min="1" value="1" id="jumlah_barang">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <p id="formatted_total_harga" class="form-control d-block"></p>
                                <input type="hidden" name="total_harga" id="total_harga">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Penjualan:</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" name="tanggal_penjualan" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" id="prosesTransaksiBtn" class="btn btn-primary float-right toastrDefaultSuccess">Tambah Data</button>
                            <a href="/manage_request" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>