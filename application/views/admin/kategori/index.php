<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Kategori</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="m-b-30">
                        <a href="<?= base_url('admin/kategori/tambah_kategori') ?>" class="btn btn-round btn-primary">Tambah Data</a>
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data kategori -->
                            <?php $no = 1;
                            foreach ($kategori as $kat) : ?>
                                <tr>
                                    <td><?= $no++  ?></td>
                                    <td><?= $kat->nama_kategori  ?></td>
                                    <td><a href="<?= base_url('admin/kategori/edit_kategori/') . $kat->id_kategori ?>" class="btn btn-primary">Edit </a> <a href="<?= base_url('admin/kategori/hapus/') . $kat->id_kategori ?>" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>