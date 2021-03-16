<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Barang</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="<?= base_url('admin/barang/update') ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="id" value="<?= $barang->id_barang ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kategori" class="form-control" required>
                                        <option value="<?= $barang->id_kategori ?>"><?= $barang->nama_kategori ?></option>
                                        <?php foreach ($kategori as $kat) : ?>
                                            <option value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_barang" required="required" class="form-control col-md-7 col-xs-12" value="<?= $barang->nama_barang ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="harga_beli" id="rupiah" required="required" class="form-control col-md-7 col-xs-12" value="<?= "Rp. " . number_format($barang->harga_beli, 0, ',', '.') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Jual <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="harga_jual" id="harga" required="required" class="form-control col-md-7 col-xs-12" value="<?= "Rp. " . number_format($barang->harga_jual, 0, ',', '.') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pemilik">Stok Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="1" name="stock" id="stock" required="required" class="form-control col-md-7 col-xs-12" value="<?= $barang->stock ?>">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?= base_url('admin/barang') ?>" class="btn btn-danger">Batal</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //format rupiah
    var rupiah = document.getElementById("rupiah");
    if (rupiah) {
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });
    }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
    //format rupiah2
    var harga = document.getElementById("harga");
    if (harga) {
        harga.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            harga.value = formatHarga(this.value, "Rp. ");
        });
    }
    /* Fungsi formatRupiah */
    function formatHarga(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            harga = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            harga += separator + ribuan.join(".");
        }

        harga = split[1] != undefined ? harga + "," + split[1] : harga;
        return prefix == undefined ? harga : harga ? "Rp. " + harga : "";
    }
    //
</script>