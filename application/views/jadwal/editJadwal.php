<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('jadwal/update'); ?>">
                    <?php foreach ($jadwal as $ad) { ?>
                        <input type="hidden" name="id" class="form-control" value="<?= $ad->id_jadwal ?>">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pelajaran</label>
                                </div>
                                <select class="custom-select" name="id_pelajaran" id="inputGroupSelect01">
                                    <?php foreach ($pelajaran as $jur) : ?>
                                        <option value="<?php echo $jur->id_pelajaran; ?>" <?php if($jur->id_pelajaran==$ad->id_pelajaran) echo'selected';?>><?php echo $jur->nama_pelajaran; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect02">Kelas</label>
                                </div>
                                <select class="custom-select" name="id_kelas_siswa" id="inputGroupSelect02">
                                    <?php foreach ($kelas_siswa as $sch) : ?>
                                        <option value="<?php echo $sch->id_kelas_siswa; ?>" <?php if($sch->id_kelas_siswa==$ad->id_kelas_siswa) echo'selected';?>><?php echo $sch->nama_kelas_siswa; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect03">Hari</label>
                                </div>
                                <select class="custom-select" name="id_hari" id="inputGroupSelect03">
                                    <?php foreach ($hari as $sch) : ?>
                                        <option value="<?php echo $sch->id_hari; ?>" <?php if($sch->id_hari==$ad->id_hari) echo'selected';?>><?php echo $sch->nama_hari; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label>Jam Masuk</label>
                                <input type="time" name="jam_masuk" class="form-control" value="<?= $ad->jam_masuk ?>">
                            </div>
                            <div class="form-group">
                                <label>Jam Keluar</label>
                                <input type="time" name="jam_keluar" class="form-control" value="<?= $ad->jam_keluar ?>">
                            </div><br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect04">Semester</label>
                                </div>
                                <select class="custom-select" name="semester" id="inputGroupSelect04">
                                    <option value="1" <?php if($ad->semester==1) echo 'selected';?>>Semester I</option>
                                    <option value="2" <?php if($ad->semester==2) echo 'selected';?>>Semester II</option>
                                </select>
                            </div>
                        </div>
                        <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>