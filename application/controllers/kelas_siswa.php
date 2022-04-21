<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_siswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='kelas_siswa';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['kelas_siswa']=$this->m_admin->tampil($table)->result();
        $data['jurusan']=$this->m_admin->tampil('jurusan')->result();
        $data['kelas']=$this->m_admin->tampil('kelas')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('jadwal/kelas_siswa',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'id_jurusan' => $this->input->post('id_jurusan'),
            'id_kelas' => $this->input->post('id_kelas'),
            'nama_kelas_siswa' => $this->input->post('nama'),
        );
        $this->m_admin->tambah($data, 'kelas_siswa');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('kelas_siswa');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['kelas_siswa'] = $this->m_admin->edit(['id_kelas_siswa' => $id], 'kelas_siswa')->result();
        $data['jurusan']=$this->m_admin->tampil('jurusan')->result();
        $data['kelas']=$this->m_admin->tampil('kelas')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('jadwal/editKelas',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'id_jurusan' => $this->input->post('id_jurusan'),
            'id_kelas' => $this->input->post('id_kelas'),
            'nama_kelas_siswa' => $this->input->post('nama'),
        );
        $where = array('id_kelas_siswa' => $id);
        $this->m_admin->update($where, $data, 'kelas_siswa');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('kelas_siswa');
    }
    public function hapus($id)
    {
        $where = array('id_kelas_siswa' => $id);
        $this->m_admin->hapus($where, 'kelas_siswa');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('kelas_siswa');
    }
}
