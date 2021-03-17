<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Toko</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="<?= base_url('sales/toko/update') ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" value="<?= $toko->id_toko ?>" name="id">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="wilayah" class="form-control" required>
                                        <option value="<?= $toko->id_wilayah ?>"><?= $toko->nama_kota ?></option>
                                        <?php foreach ($wilayah as $w) : ?>
                                            <option value="<?= $w->id_wilayah ?>"><?= $w->nama_kota ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_toko">Nama Toko <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_toko" value="<?= $toko->nama_toko ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan nama toko">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_toko">Alamat Toko <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="alamat_toko" value="<?= $toko->alamat_toko ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan alamat toko">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pemilik">Nama Pemilik <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_pemilik" value="<?= $toko->nama_pemilik ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan nama pemilik toko">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_telp">Nomor Hp <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_telp" value="<?= $toko->no_telp ?>" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan nomor hp">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?= base_url('sales/toko') ?>" class="btn btn-danger">Batal</a>
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