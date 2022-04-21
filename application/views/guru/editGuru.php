<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('guru/update'); ?>">
                    <?php foreach ($admin as $ad) { ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $ad->id_guru?>">
                            <input type="text" name="nama" class="form-control" value="<?= $ad->nama_guru?>">
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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Peminjam</label>
                            </div>
                            <select class="custom-select" name="id_peminjam" id="inputGroupSelect03">
                                <?php foreach ($peminjam as $sch) : ?>
                                    <option value="<?php echo $sch->id_peminjam; ?>"><?php echo $sch->username_peminjam; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" name="nik" class="form-control" value="<?= $ad->nik?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $ad->alamat_guru?>">
                        </div>
                        <div class="form-group">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tgl" class="form-control" value="<?= $ad->tgl_lahir_guru?>">
                        </div>
                        <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>