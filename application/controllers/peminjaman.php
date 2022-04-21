<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function index()
    {
        $table = 'peminjaman';
        $params = 'guru';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['denda'] = $this->m_admin->tampil('denda')->result();
        $data['guru'] = $this->m_admin->tampil('guru')->result();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['peminjaman'] = $this->m_admin->peminjamanJoin($params)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/peminjaman_guru', $data);
        $this->load->view('template/topbar');
    }
    public function siswa()
    {
        $table = 'peminjaman';
        $params = 'siswa';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['denda'] = $this->m_admin->tampil('denda')->result();
        $data['siswa'] = $this->m_admin->tampil('siswa')->result();
        $data['peminjaman'] = $this->m_admin->peminjamanJoin($params)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/peminjaman_siswa', $data);
        $this->load->view('template/topbar');
    }
    public function tambah()
    {
        $data = array(
            'id_peminjam' => $this->input->post('id_peminjam'),
            'denda' => $this->input->post('denda'),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
            'status' => $this->input->post('status'),
        );
        $this->m_admin->tambah($data, 'peminjaman');
        $data = array(
            'id_peminjaman' => $this->db->insert_id(),
            'id_peralatan' => $this->input->post('id_peralatan')
        );
        $this->m_admin->tambah($data, 'peminjaman_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('peminjaman');
    }
    public function tambahSiswa()
    {
        $data = array(
            'id_peminjam' => $this->input->post('id_peminjam'),
            'denda' => $this->input->post('denda'),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
            'status' => $this->input->post('status'),
        );
        $this->m_admin->tambah($data, 'peminjaman');
        $data = array(
            'id_peminjaman' => $this->db->insert_id(),
            'id_peralatan' => $this->input->post('id_peralatan')
        );
        $this->m_admin->tambah($data, 'peminjaman_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('peminjaman/siswa');
    }
    public function edit($id)
    {
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peminjaman'] = $this->m_admin->edit(['id_peminjaman' => $id], 'peminjaman')->result();
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['denda'] = $this->m_admin->tampil('denda')->result();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['guru'] = $this->m_admin->tampil('guru')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/editPeminjamanGuru', $data);
        $this->load->view('template/topbar');
    }
    public function editSiswa($id)
    {
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peminjaman'] = $this->m_admin->edit(['id_peminjaman' => $id], 'peminjaman')->result();
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['denda'] = $this->m_admin->tampil('denda')->result();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['siswa'] = $this->m_admin->tampil('siswa')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/editPeminjamanSiswa', $data);
        $this->load->view('template/topbar');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'id_peminjam' => $this->input->post('id_peminjam'),
            'denda' => $this->input->post('denda'),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
            'status'=>$this->input->post('status')
        );
        $where = array('id_peminjaman' => $id);
        $this->m_admin->update($where, $data, 'peminjaman');
        $data = array(
            'id_peralatan'=>$this->input->post('id_peralatan')
        );
        $where = array('id_peminjaman' => $id);
        $this->m_admin->update($where, $data, 'peminjaman_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('peminjaman');
    }
    public function updateSiswa()
    {
        $id = $this->input->post('id');
        $data = array(
            'id_peminjam' => $this->input->post('id_peminjam'),
            'denda' => $this->input->post('denda'),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
            'status'=>$this->input->post('status')
        );
        $where = array('id_peminjaman' => $id);
        $this->m_admin->update($where, $data, 'peminjaman');
        $data = array(
            'id_peralatan'=>$this->input->post('id_peralatan')
        );
        $where = array('id_peminjaman' => $id);
        $this->m_admin->update($where, $data, 'peminjaman_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('peminjaman/siswa');
    }
    public function hapus($id)
    {
        $where = array('id_peminjaman' => $id);
        $this->m_admin->hapus($where, 'peminjaman');
        $where = array('id_peminjaman' => $id);
        $this->m_admin->hapus($where, 'peminjaman_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('peminjaman');
    }
    public function hapusSiswa($id)
    {
        $where = array('id_peminjaman' => $id);
        $this->m_admin->hapus($where, 'peminjaman');
        $where = array('id_peminjaman' => $id);
        $this->m_admin->hapus($where, 'peminjaman_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('peminjaman/siswa');
    }
    public function kembali($id){
        
        $today=date("Y-m-d");
        $query=$this->db->query('SELECT tgl_kembali,tgl_peminjaman FROM peminjaman WHERE id_peminjaman='.$id)->result();
        foreach($query as $a){
            $kembali=$a->tgl_kembali;
            $peminjaman=$a->tgl_peminjaman;
        }
        $denda=0;
        $date=abs(strtotime($today)-strtotime($kembali));
        $thn=floor($date/(365*60*60*24));
        $bln=floor(($date-$thn*365*60*60*24)/(30*60*60*24));
        $hari=floor(($date-$thn*365*60*60*24-$bln*30*60*60*24)/(60*60*24));
        if($kembali>$today){
            $denda=0;
        }else{
            $denda=$hari*5000;
        }
        $data=[
            'status'=>'kembali',
            'tgl_pengembalian'=>$today,
            'denda'=>$denda
        ];
        $where = array('id_peminjaman' => $id);
        $this->m_admin->update($where, $data, 'peminjaman');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('peminjaman');
    }
    public function kembaliSiswa($id){
        
        $today=date("Y-m-d");
        $query=$this->db->query('SELECT tgl_kembali,tgl_peminjaman FROM peminjaman WHERE id_peminjaman='.$id)->result();
        foreach($query as $a){
            $kembali=$a->tgl_kembali;
            $peminjaman=$a->tgl_peminjaman;
        }
        $denda=0;
        $date=abs(strtotime($today)-strtotime($kembali));
        $thn=floor($date/(365*60*60*24));
        $bln=floor(($date-$thn*365*60*60*24)/(30*60*60*24));
        $hari=floor(($date-$thn*365*60*60*24-$bln*30*60*60*24)/(60*60*24));
        if($kembali>$today){
            $denda=0;
        }else{
            $denda=$hari*5000;
        }
        $data=[
            'status'=>'kembali',
            'tgl_pengembalian'=>$today,
            'denda'=>$denda
        ];
        $where = array('id_peminjaman' => $id);
        $this->m_admin->update($where, $data, 'peminjaman');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('peminjaman/siswa');
    }
}
