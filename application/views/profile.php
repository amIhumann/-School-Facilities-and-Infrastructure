<div class="card mb-5" style="max-width: 540px; margin:auto; ">
  <div class="row no-gutters">
    
    <div class="col-md-12">
      <div class="card-body">
      <form enctype="multipart/form-data" method="post" action="<?= base_url('admin/editProfile/');?>">
      <center><img class="border border-secondary" src="<?php echo base_url('src/img/').$users['foto']; ?>" style="width:200px;"></center>
      <div class="form-group">
            <h5 class="card-title"><b>Email</b></h5>
            <input type="text" name="email" class="form-control" value="<?php echo $users['email'];?>">
            <input type="hidden" name="id" class="form-control" value="<?php echo $users['id_admin'];?>">
      </div>
      <div class="form-group">
            <h5 class="card-title"><b>password</b></h5>
            <input type="password" name="password" class="form-control">
      </div>
      <div class="form-group">
            <h5 class="card-title"><b>Foto</b></h5>
            <input type="file" name="foto" class="form-control" value="">
      </div>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
      <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
      </form>
    </div>
  </div>
</div>