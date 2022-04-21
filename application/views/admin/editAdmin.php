<div class="card mb-5" style="max-width: 540px; margin:auto; ">
    <div class="row no-gutters">

        <div class="col-md-12">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="<?= base_url('admin/update'); ?>">
                    <?php foreach ($admin as $ad) { ?>
                        <div class="form-group">
                            <h5 class="card-title"><b>Email</b></h5>.
                            <input type="hidden" name="id" class="form-control" value="<?= $ad->id_admin ?>">
                            <input type="email" name="email" class="form-control" value="<?= $ad->email ?>">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Level</label>
                            </div>
                            <select class="custom-select" name="level" id="inputGroupSelect01">
                                <option value="admin" <?php if ($ad->level == "admin") echo "selected" ?>>Admin</option>
                                <option value="guru" <?php if ($ad->level == "guru") echo "selected" ?>>Guru</option>
                                <option value="siswa" <?php if ($ad->level == "siswa") echo "selected" ?>>Siswa</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <h5 class="card-title"><b>Password</b></h5>
                            <input type="password" name="password" class="form-control" value="<?= $ad->password ?>">
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