<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="<?= base_url('peminjam/updateSiswa'); ?>">
                    <?php foreach ($peminjam as $ad) { ?>
                        <input type="hidden" name="id" class="form-control" value="<?= $ad->id_peminjam?>">
                        <div class="input-group mb-3">
                            <select class="custom-select" name="id_peminjam" id="inputGroupSelect01">
                                <?php foreach ($siswa as $jur) : ?>
                                    <option value="<?php echo $jur->id_peminjam; ?>" 
                                    <?php 
                                        if ($jur->id_peminjam == $ad->id_peminjam) {
                                            echo 'selected';
                                        } ?>><?= $jur->nama_siswa;?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="<?= $ad->status_peminjam?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?= $ad->keterangan_peminjam?>">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>