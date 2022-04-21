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
                        <th>HARI</th>
                        <th>MAPEL</th>
                        <th>KELAS</th>
                        <th>JAM MASUK</th>
                        <th>JAM KELUAR</th>
                        <th>SEMESTER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal as $ad) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ad->nama_hari ?></td>
                            <td><?php echo $ad->nama_pelajaran ?></td>
                            <td><?php echo $ad->nama_kelas_siswa ?></td>
                            <td><?php echo $ad->jam_masuk ?></td>
                            <td><?php echo $ad->jam_keluar ?></td>
                            <td><?php echo $ad->semester ?></td>
                            <td>
                                <a href="<?php echo base_url('jadwal/edit/' . $ad->id_jadwal); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                    <a href="<?php echo base_url('jadwal/hapus/' . $ad->id_jadwal); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                       
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
                    <form action="<?= base_url('jadwal/tambah') ?>" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Pelajaran</label>
                            </div>
                            <select class="custom-select" name="id_pelajaran" id="inputGroupSelect01">
                                <?php foreach ($pelajaran as $jur) : ?>
                                    <option value="<?php echo $jur->id_pelajaran; ?>"><?php echo $jur->nama_pelajaran; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Kelas</label>
                            </div>
                            <select class="custom-select" name="id_kelas_siswa" id="inputGroupSelect02">
                                <?php foreach ($kelas_siswa as $sch) : ?>
                                    <option value="<?php echo $sch->id_kelas_siswa; ?>"><?php echo $sch->nama_kelas_siswa; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Hari</label>
                            </div>
                            <select class="custom-select" name="id_hari" id="inputGroupSelect03">
                                <?php foreach ($hari as $sch) : ?>
                                    <option value="<?php echo $sch->id_hari; ?>"><?php echo $sch->nama_hari; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label>Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jam Keluar</label>
                            <input type="time" name="jam_keluar" class="form-control">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect04">Semester</label>
                            </div>
                            <select class="custom-select" name="semester" id="inputGroupSelect04">
                                <option value="1">Semester I</option>
                                <option value="2">Semester II</option>
                            </select>
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