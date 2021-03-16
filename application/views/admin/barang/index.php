<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Barang</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="m-b-30">
                        <a href="<?= base_url('admin/barang/tambah_barang') ?>" class="btn btn-round btn-primary">Tambah Data</a>
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- tampilkan data wilayah -->
                            <?php $no = 1;
                            foreach ($barang as $data) : ?>
                                <tr>
                                    <td><?= $no++  ?></td>
                                    <td><?= $data->nama_kategori  ?></td>
                                    <td><?= $data->nama_barang ?></td>
                                    <td><?= "Rp. " . number_format($data->harga_beli, 0, ',', '.') ?></td>
                                    <td><?= "Rp. " . number_format($data->harga_jual, 0, ',', '.') ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td><a href="<?= base_url('admin/barang/edit_barang/') . $data->id_barang ?>" class="btn btn-primary">Edit </a> <a href="<?= base_url('admin/barang/hapus/') . $data->id_barang ?>" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>