<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $table = 'siswa';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['siswa'] = $this->m_admin->tampil($table)->result();
        $data['kelas'] = $this->m_admin->tampil('kelas_siswa')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('siswa/siswa', $data);
        $this->load->view('template/topbar');
    }
    public function tambah()
    {
        $nis= $this->input->post('nis');
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'id_peminjam' => $nis,
            'nis' => $nis,
            'id_kelas_siswa' => $this->input->post('id_kelas'),
            'alamat_siswa' => $this->input->post('alamat'),
            'angkatan_siswa' => $this->input->post('angkatan'),
            'ket_siswa' => $this->input->post('keterangan'),
        );
        $this->m_admin->tambah($data, 'siswa');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('siswa');
    }
    public function edit($id)
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['siswa'] = $this->m_admin->edit(['id_siswa' => $id], 'siswa')->result();
        $data['kelas'] = $this->m_admin->tampil('kelas_siswa')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('siswa/editSiswa', $data);
        $this->load->view('template/topbar');
    }
    public function update()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $id = $this->input->post('id');
        $data = array(
            'nama_siswa' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'id_kelas_siswa' => $this->input->post('id_kelas'),
            'alamat_siswa' => $this->input->post('alamat'),
            'angkatan_siswa' => $this->input->post('angkatan'),
            'ket_siswa' => $this->input->post('keterangan'),
        );
        $where = array('id_siswa' => $id);
        $this->m_admin->update($where, $data, 'siswa');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
        redirect('siswa');
    }
    public function hapus($id)
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $where = array('id_siswa' => $id);
        $this->m_admin->hapus($where, 'siswa');
        $where = array('id_admin' => $id);
        $this->m_admin->hapus($where, 'admin');
        $where = array('id_peminjam' => $id);
        $this->m_admin->hapus($where, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('siswa');
    }
}
