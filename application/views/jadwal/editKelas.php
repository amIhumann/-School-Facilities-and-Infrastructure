<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('jenis/update');?>">
                    <?php foreach($kelas_siswa as $ad){?>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $ad->id_kelas_siswa?>">
                            <input type="text" name="nama" class="form-control" value="<?= $ad->nama_kelas_siswa?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
                            </div>
                            <select class="custom-select" name="id_jurusan" id="inputGroupSelect01">
                                <?php foreach ($jurusan as $jur) : ?>
                                    <option value="<?php echo $jur->id_jurusan?>" <?php if ($jur->id_jurusan == $ad->id_jurusan ) echo "selected" ?>><?php echo $jur->nama_jurusan?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Kelas</label>
                            </div>
                            <select class="custom-select" name="id_kelas" id="inputGroupSelect02">
                                <?php foreach ($kelas as $sch) : ?>
                                    <option value="<?php echo $sch->id_kelas?>" <?php if ($sch->id_kelas == $ad->id_kelas ) echo "selected" ?>><?php echo $sch->nama_kelas?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
                    <?php }?>
            </div>
        </div>
    </div>