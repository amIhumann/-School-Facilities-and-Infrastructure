<div class="card shadow mb-4">
    <div class="card-header py-3"></div>
    <div class="card-body">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>JUMLAH RUSAK</th>
                        <th>TERSEDIA</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($peralatan as $ad) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ad->nama_peralatan ?></td>
                            <td><?php echo $ad->status_peralatan ?></td>
                            <td><?php echo $ad->jml_kerusakan_alat ?></td>
                            <td><?php echo $ad->status_ketersediaan_alat ?></td>
                            <td><img src="<?php echo base_url(); ?>src/img/<?= $ad->image_peralatan ?>" style="width:200px;"></td>
                            <td>
                                <a href="<?php echo base_url('guru/pesan/' . $users['id_admin'] . '/' . $ad->id_peralatan); ?>"><button style="margin:5px;" title="pesan" class="btn-warning btn"><i class="fa fa-box"></i></button>
                                    <a href="<?php echo base_url('peralatan/detail/' . $ad->id_peralatan); ?>"><button style="margin:5px;" title="Detail" class="btn-info btn">Detail</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>