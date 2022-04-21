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
                        <th>NAMA</th>
                        <th>NIS</th>
                        <th>KELAS</th>
                        <th>ALAMAT</th>
                        <th>ANGKATAN</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $ad) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ad->nama_siswa ?></td>
                            <td><?php echo $ad->nis ?></td>
                            <td><?php echo $ad->id_kelas_siswa ?></td>
                            <td><?php echo $ad->alamat_siswa ?></td>
                            <td><?php echo $ad->angkatan_siswa ?></td>
                            <td><?php echo $ad->ket_siswa ?></td>
                            <td>
                                <a href="<?php echo base_url('siswa/edit/' . $ad->id_siswa); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                    <a href="<?php echo base_url('siswa/hapus/' . $ad->id_siswa); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
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
                    <form enctype="multipart/form-data" action="<?= base_url('admin/tambah') ?>" method="POST">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                            <input type="hidden" name="level" class="form-control" value="siswa">
                        </div>
                        <div class="form-group">
                            <label>nis</label>
                            <input type="text" name="nis" class="form-control">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                            </div>
                            <select class="custom-select" name="id_kelas" id="inputGroupSelect01">
                                <?php foreach ($kelas as $jur) : ?>
                                    <option value="<?php echo $jur->id_kelas; ?>"><?php echo $jur->nama_kelas_siswa; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label>alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>angkatan</label>
                            <input type="text" name="angkatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
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