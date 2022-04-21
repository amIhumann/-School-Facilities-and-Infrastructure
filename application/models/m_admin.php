<?php

class M_admin extends CI_Model
{   
    public function user($email){
        $this->db->select('*');
        $this->db->from('admin a');
        $this->db->join('guru b', 'a.id_guru=b.id_guru','left',false);
        $this->db->join('siswa c', 'a.id_siswa=c.id_siswa','left',false);
        $this->db->where(['email'=>$email]);
        return $this->db->get();
    }
    public function tampil($table)
    {
        return $this->db->get($table);
    }
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampilJoinPeralatan()
    {
        $this->db->select('*');
        $this->db->from('peralatan a');
        $this->db->join('jenis b', 'a.id_jenis=b.id_jenis');
        $this->db->join('merk c', 'a.id_merk=c.id_merk');
        $this->db->join('warna d', 'a.id_warna=d.id_warna');
        $this->db->join('kategori e', 'a.id_kategori=e.id_kategori');
        return $this->db->get();
    }
    public function detailPeralatan($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('peralatan a');
        $this->db->join('jenis b', 'a.id_jenis=b.id_jenis');
        $this->db->join('merk c', 'a.id_merk=c.id_merk');
        $this->db->join('warna d', 'a.id_warna=d.id_warna');
        $this->db->join('kategori e', 'a.id_kategori=e.id_kategori');
        $this->db->where(['id_peralatan' => $id]);
        return $this->db->get();
    }
    public function tampilJoinJadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal a');
        $this->db->join('pelajaran b', 'a.id_pelajaran=b.id_pelajaran');
        $this->db->join('hari c', 'a.id_hari=c.id_hari');
        $this->db->join('kelas_siswa d', 'a.id_kelas_siswa=d.id_kelas_siswa');
        return $this->db->get();
    }
    public function pemesananJoin($params)
    {
        $this->db->select('*');
        $this->db->from('pemesanan a');
        $this->db->join($params . ' c', 'a.id_peminjam=c.id_peminjam');
        return $this->db->get();
    }
    public function peminjamJoin($params)
    {
        $this->db->select('*');
        $this->db->from('peminjam a');
        $this->db->join($params . ' c', 'a.id_peminjam=c.id_peminjam');
        return $this->db->get('');
    }
    public function tampilPerbaikan()
    {
        $this->db->select('*');
        $this->db->from('perbaikan a');
        $this->db->join('guru c', 'a.id_guru=c.id_guru');
        return $this->db->get();
    }

    public function peminjamanJoin($params)
    {
        $this->db->select('*');
        $this->db->from('peminjaman a');
        $this->db->join($params.' c', 'a.id_peminjam=c.id_peminjam');
        $this->db->join('peminjaman_peralatan e', 'a.id_peminjaman=e.id_peminjaman');
        $this->db->join('peralatan d', 'e.id_peralatan=d.id_peralatan');
        return $this->db->get();
    }
    public function pesanAlat()
    {
        $this->db->select('*');
        $this->db->from('pemesanan_peralatan a');
        $this->db->join('peralatan c', 'a.id_peralatan=c.id_peralatan');
        return $this->db->get();
    }
    public function pemesanan($params)
    {
        $this->db->select('*');
        $this->db->from('pemesanan_peralatan');
        $this->db->join('pemesanan','pemesanan_peralatan.id_pemesanan=pemesanan.id_pemesanan');
        $this->db->join('peralatan','peralatan.id_peralatan=pemesanan_peralatan.id_peralatan');
        $this->db->join($params, 'pemesanan.id_peminjam='.$params.'.id_peminjam');
        return $this->db->get();
    }
}
