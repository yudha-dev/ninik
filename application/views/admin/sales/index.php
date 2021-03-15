<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Sales</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="m-b-30">
                        <a href="<?= base_url('admin/sales/tambah_sales') ?>" class="btn btn-round btn-primary">Tambah Data</a>
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Hp</th>
                                <th>foto Profil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data kategori -->
                            <?php $no = 1;
                            foreach ($sales as $sale) : ?>
                                <tr>
                                    <td><?= $no++  ?></td>
                                    <td><?= $sale->username  ?></td>
                                    <td><?= $sale->nama_lengkap  ?></td>
                                    <td><?= $sale->alamat  ?></td>
                                    <td><?= $sale->no_hp  ?></td>
                                    <td><a href="<?= base_url('assets/media/avatars/' . $sale->foto_profil) ?>" target="_blank"><img src="<?= base_url('assets/media/avatars/' . $sale->foto_profil) ?>" width="30px" height="30px" alt=""></a></td>
                                    <td><a href="<?= base_url('admin/sales/edit_sales/') . $sale->id_user ?>" class="btn btn-primary">Edit </a> <a href="<?= base_url('admin/sales/hapus/') . $sale->id_user ?>" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>