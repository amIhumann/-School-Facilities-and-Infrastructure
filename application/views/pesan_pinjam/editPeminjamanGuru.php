<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="<?= base_url('peminjaman/update'); ?>">
                    <?php foreach ($peminjaman as $ad) { ?>
                        <input type="hidden" name="id" class="form-control" value="<?= $ad->id_peminjaman ?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                            </div>
                            <select class="custom-select" name="id_peminjam" id="inputGroupSelect01">
                                <?php foreach ($guru as $jur) : ?>
                                    <option value="<?php echo $jur->id_peminjam; ?>" <?php if ($jur->id_peminjam == $ad->id_peminjam) echo 'selected'; ?>><?php echo $jur->nama_guru; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Peralatan</label>
                            </div>
                            <select class="custom-select" name="id_peralatan" id="inputGroupSelect02">
                                <?php foreach ($peralatan as $jur) : ?>
                                    <option value="<?php echo $jur->id_peralatan; ?>"><?php echo $jur->nama_peralatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Denda</label>
                            <input type="number" name="denda" class="form-control" value="<?= $ad->denda ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_peminjaman" class="form-control" value="<?= $ad->tgl_peminjaman ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control" value="<?= $ad->tgl_kembali ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_pengembalian" class="form-control" value="<?= $ad->tgl_pengembalian    ?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Status</label>
                            </div>
                            <select class="custom-select" name="status" id="inputGroupSelect03">
                                <option value="kembali" <?php if ('kembali' == $ad->denda) echo 'selected'; ?>>Kembali</option>
                                <option value="pinjam" <?php if ('pinjam' == $ad->denda) echo 'selected'; ?>>Pinjam</option>
                            </select>
                        </div>
                        <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>