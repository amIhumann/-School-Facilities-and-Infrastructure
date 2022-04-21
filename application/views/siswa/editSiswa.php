<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('siswa/update');?>">
                    <?php foreach($siswa as $ad){?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $ad->id_siswa?>">
                            <input type="text" name="nama" class="form-control" value="<?= $ad->nama_siswa?>">
                        </div>
                        <div class="form-group">
                            <label>nis</label>
                            <input type="text" name="nis" class="form-control" value="<?= $ad->nis?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                            </div>
                            <select class="custom-select" name="id_kelas" id="inputGroupSelect01">
                                <?php foreach ($kelas as $jur) : ?>
                                    <option value="<?php echo $jur->id_kelas_siswa; ?>" <?php if ($jur->id_kelas_siswa == $ad->id_kelas_siswa ) echo "selected" ?>><?php echo $jur->nama_kelas_siswa; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label>alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $ad->alamat_siswa?>">
                        </div>
                        <div class="form-group">
                            <label>angkatan</label>
                            <input type="text" name="angkatan" class="form-control" value="<?= $ad->angkatan_siswa?>">
                        </div>
                        <div class="form-group">
                            <label>keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?= $ad->ket_siswa?>">
                        </div>
                    <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
                    <?php }?>
            </div>
        </div>
    </div>