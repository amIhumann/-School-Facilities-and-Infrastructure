<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='jadwal';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['jadwal']=$this->m_admin->tampilJoinJadwal()->result();
        $data['pelajaran']=$this->m_admin->tampil('pelajaran')->result();
        $data['kelas_siswa']=$this->m_admin->tampil('kelas_siswa')->result();
        $data['hari']=$this->m_admin->tampil('hari')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('jadwal/jadwal',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'id_hari' => $this->input->post('id_hari'),
            'id_pelajaran' => $this->input->post('id_pelajaran'),
            'id_kelas_siswa' => $this->input->post('id_kelas_siswa'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_keluar' => $this->input->post('jam_keluar'),
            'semester' => $this->input->post('semester'),
        );
        $this->m_admin->tambah($data, 'jadwal');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('jadwal');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['pelajaran']=$this->m_admin->tampil('pelajaran')->result();
        $data['kelas_siswa']=$this->m_admin->tampil('kelas_siswa')->result();
        $data['hari']=$this->m_admin->tampil('hari')->result();
        $data['jadwal'] = $this->m_admin->edit(['id_jadwal' => $id], 'jadwal')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('jadwal/editJadwal',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'id_hari' => $this->input->post('id_hari'),
            'id_pelajaran' => $this->input->post('id_pelajaran'),
            'id_kelas_siswa' => $this->input->post('id_kelas_siswa'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_keluar' => $this->input->post('jam_keluar'),
            'semester' => $this->input->post('semester'),
        );
        $where = array('id_jadwal' => $id);
        $this->m_admin->update($where, $data, 'jadwal');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('jadwal');
    }
    public function hapus($id)
    {
        $where = array('id_jadwal' => $id);
        $this->m_admin->hapus($where, 'jadwal');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('jadwal');
    }
}
