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
                    <form method="POST" action="/manage_request/update" class="formTransaksi" id="quickForm">
                        <input name="id" type="text" hidden value="<?= $request['id_penjualan']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Barang</label>
                                <input type="number" hidden class="form-control" name="id_barang" value="<?= $request['id_barang']; ?>" id="pilihan_barang">
                                <input type="text" class="form-control" value="<?= ($request['id_barang'] == $items['id_barang']) ? $items['kode_barang'] . '-' . $items['nama_barang'] : ""; ?>">
                                <span id="jumlah_stok"></span>
                            </div>
                            <input type="text" class="form-control" hidden id="harga_barang">
                            <div class="form-group">
                                <label for="jumlah_barang">Jumlah Barang</label>
                                <input type="number" class="form-control" name="jumlah_barang" value="<?= $request['jumlah']; ?>" id="jumlah_barang">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <p id="formatted_total_harga" class="form-control d-block"></p>
                                <input type="hidden" name="total_harga" id="total_harga">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Penjualan:</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" name="tanggal_penjualan" value="<?= $request['tanggal_penjualan']; ?>" placeholder="<?= $request['tanggal_penjualan']; ?>" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" id="prosesTransaksiBtn" class="btn btn-primary float-right toastrDefaultSuccess">Ubah Data</button>
                            <a href="/manage_request" class="btn btn-secondary float-right mr-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>