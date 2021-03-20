<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <form action="" method="POST">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="col-md-7 col-sm-7 col-xs-7">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Barang</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content mt-5">
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tampilkan data wilayah -->
                                <?php $no = 1;
                                foreach ($barang as $data) : ?>
                                    <tr>
                                        <td><?= $no++  ?></td>
                                        <input type="hidden" name="id_barang" value="<?= $data->id_barang ?>">
                                        <td><?= $data->nama_barang ?></td>
                                        <td><?= "Rp. " . number_format($data->harga_jual, 0, ',', '.') ?></td>
                                        <td><?= $data->stock ?></td>
                                        <td class="text-center"><button type="submit" class="btn btn-primary">Pilih</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-5">
                <div class="x_panel">
                    <label>List Barang</label>
                </div>
                <div class="x_panel text-center">
                    <div class="form-group">
                        <h4 class="control-label col-md-3 col-sm-3 col-xs-12">Toko</h4>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <select name="toko" class="form-control" required>
                                <option value="">-- Pilih Toko --</option>
                                <?php
                                foreach ($toko as $tk) : ?>
                                    <option value="<?= $tk->id_toko ?>"><?= $tk->nama_toko ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="x_panel text-center">
                    <button class="btn btn-primary">Selesai</button>
                </div>
            </div>
        </form>
    </div>
</div>