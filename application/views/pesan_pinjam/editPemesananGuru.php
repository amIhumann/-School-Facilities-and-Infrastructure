<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('pemesanan/update'); ?>">
                    <?php foreach ($pemesanan as $ad) { ?>
                        <input type="hidden" name="id" class="form-control" value="<?= $ad->id_pemesanan?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Peralatan</label>
                            </div>
                            <select class="custom-select" name="id_peralatan" id="inputGroupSelect01">
                                <?php foreach ($peralatan as $jur) : ?>
                                    <option value="<?php echo $jur->id_peralatan; ?>" ><?= $jur->nama_peralatan;?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                            </div>
                            <select class="custom-select" name="id_peminjam" id="inputGroupSelect01">
                                <?php foreach ($guru as $jur) : ?>
                                    <option value="<?php echo $jur->id_peminjam; ?>" 
                                    <?php 
                                        if ($jur->id_peminjam == $ad->id_peminjam) {
                                            echo 'selected';
                                        } ?>><?= $jur->nama_guru;?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $ad->tgl_pemesanan?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect011">Status</label>
                            </div>
                            <select class="custom-select" name="status" id="inputGroupSelect011">
                                    <option value="Accepted" <?php if($ad->status_pemesanan=='Accepted') echo 'selected'?>>Accepted</option>
                                    <option value="Request" <?php if($ad->status_pemesanan=='Request') echo 'selected'?>>Request</option>
                            </select>
                        </div>
                        <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>