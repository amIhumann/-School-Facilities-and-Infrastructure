<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('perbaikan/update'); ?>">
                    <?php foreach ($admin as $ad) { ?>
                        <input type="hidden" name="id" class="form-control" value="<?= $ad->id_perbaikan ?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                            </div>
                            <select class="custom-select" name="id_guru" id="inputGroupSelect01">
                                <?php foreach ($guru as $jur) : ?>
                                    <option value="<?php echo $jur->id_guru; ?>" <?php if($jur->id_guru==$ad->id_guru) echo "selected"?>>
                                        <?= $jur->nama_guru ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl" class="form-control" value="<?= $ad->tgl_perbaikan ?>">
                        </div>
                        <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>