<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button class="btn btn-primary float-right " data-toggle="modal" data-target="#Modaltambah"><i class="fa fa-plus"></i> Tambah </button>
        </h4>
    </div>
    <div class="card-body">
    <?php echo $this->session->flashdata('pesan'); ?>
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>JURUSAN</th>
                        <th>KODE</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($admin as $ad) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $ad->nama_jurusan ?></td>
                                <td><?php echo $ad->kode_jurusan ?></td>
                                <td>
                                    <a href="<?php echo base_url('jurusan/hapus/'.$ad->id_jurusan); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Modaltambah" tabindex="-1" aria-labelledby="ModaltambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModaltambahLabel">Tambah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('jurusan/tambah') ?>" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>