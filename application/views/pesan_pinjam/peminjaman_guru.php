<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button class="btn btn-primary float-right " data-toggle="modal" data-target="#Modaltambah"><i class="fa fa-plus"></i> Tambah </button>
        </h4>
    </div>
    <div class="card-body">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PEMINJAM</th>
                        <th>PERALATAN</th>
                        <th>DENDA</th>
                        <th>TANGGAL PEMINJAMAN</th>
                        <th>TANGGAL KEMBALI</th>
                        <th>TANGGAL PENGEMBALIAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($peminjaman as $ad) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ad->nama_guru ?></td>
                            <td><?php echo $ad->nama_peralatan ?></td>
                            <td><?php echo $ad->denda ?></td>
                            <td><?php echo $ad->tgl_peminjaman ?></td>
                            <td><?php echo $ad->tgl_kembali ?></td>
                            <td><?php echo $ad->tgl_pengembalian ?></td>
                            <td><?php echo $ad->status ?><?php if($ad->status=='pinjam'){ ?> <a href="<?php echo base_url('peminjaman/kembali/' . $ad->id_peminjaman); ?>"><button class="btn-info btn"><i class="fa fa-archive"></i></button></a><?php }?></td>
                            <td>
                                <a href="<?php echo base_url('peminjaman/edit/' . $ad->id_peminjaman); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                    <a href="<?php echo base_url('peminjaman/hapus/' . $ad->id_peminjaman); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Modaltambah" tabindex="-1" aria-labelledby="ModaltambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModaltambahLabel">Tambah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="<?= base_url('peminjaman/tambah') ?>" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Nama</label>
                            </div>
                            <select class="custom-select" name="id_peminjam" id="inputGroupSelect01">
                                    <?php foreach ($guru as $jur) : ?>
                                        <option value="<?php echo $jur->id_peminjam; ?>"><?php echo $jur->nama_guru; ?></option>
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
                            <input type="number" name="denda" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_peminjaman" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_pengembalian" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Status</label>
                            </div>
                            <select class="custom-select" name="status" id="inputGroupSelect03">
                                    <option value="kembali">Kembali</option>
                                    <option value="pinjam">Pinjam</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  