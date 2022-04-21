<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button class="btn btn-primary float-right " data-toggle="modal" data-target="#Modaltambah"><i class="fa fa-plus"></i> Tambah </button>
        </h4>
    </div>
    <div class="card-body">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <th>JENIS</th>
                        <td><?php echo $detail->nama_jenis ?></td>
                    </tr>
                    <tr>
                        <th>MERK</th>
                        <td><?php echo $detail->nama_merk ?></td>
                    </tr>
                    <tr>
                        <th>WARNA</th>
                        <td><?php echo $detail->nama_warna ?></td>
                    </tr>
                    <tr>
                        <th>KATEGORI</th>
                        <td><?php echo $detail->nama_kategori ?></td>
                    </tr>
                    <tr>
                        <th>TANGGAL BELI</th>
                        <td><?php echo $detail->tgl_beli_peralatan ?></td>
                    </tr>
                    <tr>
                        <th>ATURAN SERVICE</th>
                        <td><?php echo $detail->aturan_service_alat ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>