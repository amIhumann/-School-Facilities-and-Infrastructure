<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form method="POST" action="<?= base_url('warna/update');?>">
                    <?php foreach($admin as $ad){?>
                    <div class="form-group">
                        <h5 class="card-title"><b>Nama</b></h5>
                        <input type="hidden" name="id" class="form-control" value="<?= $ad->id_warna?>">
                        <input type="text" name="nama" class="form-control" value="<?= $ad->nama_warna?>">
                    </div>
                    <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
                </form>
                    <?php }?>
            </div>
        </div>
    </div>