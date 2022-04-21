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
                        <th>JABATAN</th>
                        <th>JADWAL</th>
                        <th>PEMINJAM</th>
                        <th>NIK</th>
                        <th>ALAMAT</th>
                        <th>TGL LAHIR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($guru as $ad) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ad->nama_guru ?></td>
                            <td><?php echo $ad->id_jabatan ?></td>
                            <td><?php echo $ad->id_jadwal ?></td>
                            <td><?php echo $ad->id_peminjam ?></td>
                            <td><?php echo $ad->nik ?></td>
                            <td><?php echo $ad->alamat_guru ?></td>
                            <td><?php echo $ad->tgl_lahir_guru ?></td>
                            <td>
                                <a href="<?php echo base_url('guru/edit/' . $ad->id_guru); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                    <a href="<?php echo base_url('guru/hapus/' . $ad->id_guru); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
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
                            <input type="hidden" name="level" class="form-control" value="guru">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Jabatan</label>
                            </div>
                            <select class="custom-select" name="id_jabatan" id="inputGroupSelect01">
                                <?php foreach ($jabatan as $jur) : ?>
                                    <option value="<?php echo $jur->id_jabatan; ?>"><?php echo $jur->nama_jabatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Jadwal</label>
                            </div>
                            <select class="custom-select" name="id_jadwal" id="inputGroupSelect02">
                                <?php foreach ($jadwal as $sch) : ?>
                                    <option value="<?php echo $sch->id_jadwal; ?>">
                                        <?php foreach ($pelajaran as $pel) {
                                            if ($sch->id_pelajaran == $pel->id_pelajaran) {
                                                echo $pel->nama_pelajaran;
                                            }
                                        } ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" name="nik" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tgl" class="form-control">
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