<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index()
    {
        $params = 'guru';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['guru'] = $this->m_admin->tampil('guru')->result();
        $data['pemesanan'] = $this->m_admin->pemesanan($params)->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/pemesanan', $data);
        $this->load->view('template/topbar', $data);
    }
    public function siswa()
    {
        $params = 'siswa';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['siswa'] = $this->m_admin->tampil('siswa')->result();
        $data['pemesanan'] = $this->m_admin->pemesanan($params)->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/pemesananSiswa', $data);
        $this->load->view('template/topbar', $data);
    }
    public function tambah()
    {
        $query = $this->db->query('SELECT id_pemesanan FROM pemesanan ORDER BY id_pemesanan DESC LIMIT 1')->row_array();
        foreach ($query as $a) {
            $no = $a;
        }
        $data = array(
            'id_pemesanan' => ++$no,
            'id_peralatan' => $this->input->post('id_peralatan')
        );
        $this->m_admin->tambah($data, 'pemesanan_peralatan');
        $data = array(
            'id_pemesanan' => $no,
            'id_peminjam' => $this->input->post('id_peminjam'),
            'tgl_pemesanan' => $this->input->post('tanggal'),
            'status_pemesanan' => $this->input->post('status')
        );
        $this->m_admin->tambah($data, 'pemesanan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('pemesanan');
    }
    public function tambahSiswa()
    {
        $query = $this->db->query('SELECT id_pemesanan FROM pemesanan_peralatan ORDER BY id_pemesanan DESC LIMIT 1')->row_array();
        foreach ($query as $a) {
            $no = $a;
        }
        $data = array(
            'id_pemesanan' => ++$no,
            'id_peralatan' => $this->input->post('id_peralatan')
        );
        $this->m_admin->tambah($data, 'pemesanan_peralatan');
        $data = array(
            'id_pemesanan' => $no,
            'id_peminjam' => $this->input->post('id_peminjam'),
            'tgl_pemesanan' => $this->input->post('tanggal'),
            'status_pemesanan' => $this->input->post('status')
        );
        $this->m_admin->tambah($data, 'pemesanan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('pemesanan/siswa');
    }
    public function edit($id)
    {
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['guru'] = $this->m_admin->tampil('guru')->result();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['pemesanan'] = $this->m_admin->edit(['id_pemesanan' => $id], 'pemesanan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/editPemesananGuru', $data);
        $this->load->view('template/topbar');
    }
    public function editSiswa($id)
    {
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['siswa'] = $this->m_admin->tampil('siswa')->result();
        $data['peralatan'] = $this->m_admin->tampil('peralatan')->result();
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['pemesanan'] = $this->m_admin->edit(['id_pemesanan' => $id], 'pemesanan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pesan_pinjam/editPemesananSiswa', $data);
        $this->load->view('template/topbar');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'id_peminjam' => $this->input->post('id_peminjam'),
            'tgl_pemesanan' => $this->input->post('tanggal'),
            'status_pemesanan' => $this->input->post('status')
        );
        $where = array('id_pemesanan' => $id);
        $this->m_admin->update($where, $data, 'pemesanan');
        $data = array(
            'id_peralatan' => $this->input->post('id_peralatan'),
        );
        $where = array('id_pemesanan' => $id);
        $this->m_admin->update($where, $data, 'pemesanan_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('pemesanan');
    }
    public function updateSiswa()
    {
        $id = $this->input->post('id');
        $data = array(
            'id_peminjam' => $this->input->post('id_peminjam'),
            'tgl_pemesanan' => $this->input->post('tanggal'),
            'status_pemesanan' => $this->input->post('status')
        );
        $where = array('id_pemesanan' => $id);
        $this->m_admin->update($where, $data, 'pemesanan');
        $data = array(
            'id_peralatan' => $this->input->post('id_peralatan'),
        );
        $where = array('id_pemesanan' => $id);
        $this->m_admin->update($where, $data, 'pemesanan_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('pemesanan/siswa');
    }

    public function hapus($id)
    {
        $where = array('id_pemesanan' => $id);
        $this->m_admin->hapus($where, 'pemesanan');
        $where = array('id_pemesanan' => $id);
        $this->m_admin->hapus($where, 'pemesanan_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('pemesanan');
    }
    public function hapusSiswa($id)
    {
        $where = array('id_pemesanan' => $id);
        $this->m_admin->hapus($where, 'pemesanan');
        $where = array('id_pemesanan' => $id);
        $this->m_admin->hapus($where, 'pemesanan_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('pemesanan/siswa');
    }
    public function acc($id)
    {
        $peminjam=$this->db->query('SELECT id_peminjam FROM pemesanan WHERE id_pemesanan='.$id)->row_array();
        $peralatan=$this->db->query('SELECT id_peralatan FROM pemesanan_peralatan WHERE id_pemesanan='.$id)->row_array();
        foreach($peminjam as $e)$user=$e;
        foreach($peralatan as $e)$peralatan=$e;
        $day = date("d") + 7;
        $kembali = date("Y-m-".$day);
        $today = date("Y-m-d");
        $data = array(
            'id_peminjam' => $user,
            'tgl_peminjaman' => $today,
            'tgl_kembali'=>$kembali,
            'status'=>'pinjam'
        );
        $this->m_admin->tambah($data, 'peminjaman');
        $data = array(
            'id_peminjaman' => $this->db->insert_id(),
            'id_peralatan'=>$peralatan
        );
        $this->m_admin->tambah($data, 'peminjaman_peralatan');
        $this->m_admin->hapus(['id_pemesanan'=>$id], 'pemesanan');
        $this->m_admin->hapus(['id_pemesanan'=>$id], 'pemesanan_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('pemesanan');
    }
    public function accS($id)
    {
        $peminjam=$this->db->query('SELECT id_peminjam FROM pemesanan WHERE id_pemesanan='.$id)->row_array();
        $peralatan=$this->db->query('SELECT id_peralatan FROM pemesanan_peralatan WHERE id_pemesanan='.$id)->row_array();
        foreach($peminjam as $e)$user=$e;
        foreach($peralatan as $e)$peralatan=$e;
        $day = date("d") + 7;
        $kembali = date("Y-m-".$day);
        $today = date("Y-m-d");
        $data = array(
            'id_peminjam' => $user,
            'tgl_peminjaman' => $today,
            'tgl_kembali'=>$kembali,
            'status'=>'pinjam'
        );
        $this->m_admin->tambah($data, 'peminjaman');
        $data = array(
            'id_peminjaman' => $this->db->insert_id(),
            'id_peralatan'=>$peralatan
        );
        $this->m_admin->tambah($data, 'peminjaman_peralatan');
        $this->m_admin->hapus(['id_pemesanan'=>$id], 'pemesanan');
        $this->m_admin->hapus(['id_pemesanan'=>$id], 'pemesanan_peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('pemesanan/siswa');
    }
}
