<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $table = 'guru';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['jabatan'] = $this->m_admin->tampil('jabatan')->result();
        $data['jadwal'] = $this->m_admin->tampil('jadwal')->result();
        $data['pelajaran'] = $this->m_admin->tampil('pelajaran')->result();
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['guru'] = $this->m_admin->tampil($table)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('guru/guru', $data);
        $this->load->view('template/topbar');
    }
    public function edit($id)
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['jabatan'] = $this->m_admin->tampil('jabatan')->result();
        $data['pelajaran'] = $this->m_admin->tampil('pelajaran')->result();
        $data['jadwal'] = $this->m_admin->tampil('jadwal')->result();
        $data['peminjam'] = $this->m_admin->tampil('peminjam')->result();
        $data['admin'] = $this->m_admin->edit(['id_guru' => $id], 'guru')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('guru/editGuru', $data);
        $this->load->view('template/topbar');
    }
    public function update()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $id = $this->input->post('id');
        $data = array(
            'nama_guru' => $this->input->post('nama'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_peminjam' => $this->input->post('id_peminjam'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            'nik' => $this->input->post('nik'),
            'alamat_guru' => $this->input->post('alamat'),
            'tgl_lahir_guru' => $this->input->post('tgl'),
        );
        $where = array('id_guru' => $id);
        $this->m_admin->update($where, $data, 'guru');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('guru');
    }
    public function hapus($id)
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $where = array('id_guru' => $id);
        $this->m_admin->hapus($where, 'guru');
        $where = array('id_admin' => $id);
        $this->m_admin->hapus($where, 'admin');
        $where = array('id_peminjam' => $id);
        $this->m_admin->hapus($where, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('guru');
    }
    public function pinjam(){
        if ($this->session->userdata('level') == "admin") redirect('auth/error');
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peralatan'] = $this->m_admin->tampilJoinPeralatan()->result();
        $data['jenis'] = $this->m_admin->tampil('jenis')->result();
        $data['merk'] = $this->m_admin->tampil('merk')->result();
        $data['warna'] = $this->m_admin->tampil('warna')->result();
        $data['kategori'] = $this->m_admin->tampil('kategori')->result();
    
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('guru/pinjam');
        $this->load->view('template/topbar');
        
    }
    public function pesan($id,$alat){
        if ($this->session->userdata('level') == "admin") redirect('auth/error');

        $query = $this->db->query('SELECT id_pemesanan FROM pemesanan ORDER BY id_pemesanan DESC LIMIT 1')->row_array();
        foreach ($query as $a) {
            $no = $a;
        }
        $data = array(
            'id_pemesanan' => ++$no,
            'id_peralatan' => $alat
        );
        $this->m_admin->tambah($data, 'pemesanan_peralatan');
        $data = array(
            'id_pemesanan' => $no,
            'id_peminjam' => $id,
            'tgl_pemesanan' => date("Y-m-d"),
            'status_pemesanan' => 'Request'
        );
        $this->m_admin->tambah($data, 'pemesanan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('guru/pinjam');
    }
    public function peminjaman(){
        if ($this->session->userdata('level') == "admin") redirect('auth/error');
    }
}
