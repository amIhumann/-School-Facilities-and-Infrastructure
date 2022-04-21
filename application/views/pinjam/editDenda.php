<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('denda/update');?>">
                    <?php foreach($admin as $ad){?>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="hidden" name="id" class="form-control" value="<?= $ad->id_denda?>">
                            <input type="text" name="keterangan" class="form-control" value="<?= $ad->ket_denda?>">
                        </div>
                        <div class="form-group">
                            <label>Biaya</label>
                            <input input type="number" step="any" name="biaya" class="form-control" value="<?= $ad->biaya_denda?>">
                        </div>
                    <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
                    <?php }?>
            </div>
        </div>
    </div>