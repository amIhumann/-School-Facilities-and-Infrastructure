<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?= base_url('peralatan/update') ?>" method="POST">
                    <?php foreach ($admin as $ad) { ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $ad->id_peralatan?>">
                            <input type="text" name="nama" class="form-control" value="<?= $ad->nama_peralatan?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Jenis</label>
                            </div>
                            <select class="custom-select" name="id_jenis" id="inputGroupSelect01">
                                <?php foreach ($jenis as $jur) : ?>
                                    <option value="<?php echo $jur->id_jenis?>" <?php if ($jur->id_jenis == $ad->id_jenis ) echo "selected" ?>><?php echo $jur->nama_jenis?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Merk</label>
                            </div>
                            <select class="custom-select" name="id_merk" id="inputGroupSelect02">
                                <?php foreach ($merk as $sch) : ?>
                                    <option value="<?php echo $sch->id_merk?>" <?php if ($sch->id_merk == $ad->id_merk ) echo "selected" ?>><?php echo $sch->nama_merk?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Warna</label>
                            </div>
                            <select class="custom-select" name="id_warna" id="inputGroupSelect03">
                                <?php foreach ($warna as $sch) : ?>
                                    <option value="<?php echo $sch->id_warna?>" <?php if ($sch->id_warna == $ad->id_warna ) echo "selected" ?>><?php echo $sch->nama_warna?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect04">Kategori</label>
                            </div>
                            <select class="custom-select" name="id_kategori" id="inputGroupSelect04">
                                <?php foreach ($kategori as $sch) : ?>
                                    <option value="<?php echo $sch->id_kategori?>" <?php if ($sch->id_kategori == $ad->id_kategori ) echo "selected" ?>><?php echo $sch->nama_kategori?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl" class="form-control" value="<?= $ad->tgl_beli_peralatan?>">
                        </div>
                        <div class="form-group">
                            <label>Status Alat</label>
                            <input type="text" name="status" class="form-control" value="<?= $ad->status_peralatan?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Rusak</label>
                            <input type="text" name="jml_rusak" class="form-control" value="<?= $ad->jml_kerusakan_alat?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Status</label>
                            </div>
                            <select class="custom-select" name="tersedia" id="inputGroupSelect03">
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak tersedia">Tdk Tersedia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Aturan Service</label>
                            <input type="text" name="service" class="form-control" value="<?= $ad->aturan_service_alat?>">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" value="<?= $ad->image_peralatan?>">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>