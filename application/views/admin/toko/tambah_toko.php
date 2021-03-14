<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Toko</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="<?= base_url('admin/toko/store') ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="wilayah" class="form-control" required>
                                        <option value="">-- Pilih Kota --</option>
                                        <?php
                                        foreach ($wilayah as $wil) : ?>
                                            <option value="<?= $wil->id_wilayah ?>"><?= $wil->nama_kota ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_toko">Nama Toko <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_toko" id="nama_toko" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan nama toko">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_toko">Alamat Toko <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="alamat_toko" id="alamat_toko" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan alamat toko">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pemilik">Nama Pemilik <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_pemilik" id="nama_pemilik" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan nama pemilik toko">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_telp">Nomor Hp <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_telp" id="no_telp" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan nomor hp">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?= base_url('admin/toko') ?>" class="btn btn-danger">Batal</a>
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