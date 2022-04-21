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
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>JUMLAH RUSAK</th>
                        <th>TERSEDIA</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($peralatan as $ad) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ad->nama_peralatan ?></td>
                            <td><?php echo $ad->status_peralatan ?></td>
                            <td><?php echo $ad->jml_kerusakan_alat ?></td>
                            <td><?php echo $ad->status_ketersediaan_alat ?></td>
                            <td><img src="<?php echo base_url(); ?>src/img/<?= $ad->image_peralatan ?>" style="width:200px;"></td>
                            <td>
                                <a href="<?php echo base_url('peralatan/edit/' . $ad->id_peralatan); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                    <a href="<?php echo base_url('peralatan/hapus/' . $ad->id_peralatan); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                        <a href="<?php echo base_url('peralatan/detail/' . $ad->id_peralatan); ?>"><button style="margin:5px;" title="Detail" class="btn-info btn">Detail</button>
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
                    <form enctype="multipart/form-data" action="<?= base_url('peralatan/tambah') ?>" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Jenis</label>
                            </div>
                            <select class="custom-select" name="id_jenis" id="inputGroupSelect01">
                                <?php foreach ($jenis as $jur) : ?>
                                    <option value="<?php echo $jur->id_jenis; ?>"><?php echo $jur->nama_jenis; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Merk</label>
                            </div>
                            <select class="custom-select" name="id_merk" id="inputGroupSelect02">
                                <?php foreach ($merk as $sch) : ?>
                                    <option value="<?php echo $sch->id_merk; ?>"><?php echo $sch->nama_merk; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">Warna</label>
                            </div>
                            <select class="custom-select" name="id_warna" id="inputGroupSelect03">
                                <?php foreach ($warna as $sch) : ?>
                                    <option value="<?php echo $sch->id_warna; ?>"><?php echo $sch->nama_warna; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect04">Kategori</label>
                            </div>
                            <select class="custom-select" name="id_kategori" id="inputGroupSelect04">
                                <?php foreach ($kategori as $sch) : ?>
                                    <option value="<?php echo $sch->id_kategori; ?>"><?php echo $sch->nama_kategori; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status Alat</label>
                            <input type="text" name="status" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Rusak</label>
                            <input type="text" name="jml_rusak" class="form-control">
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
                            <input type="text" name="service" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
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