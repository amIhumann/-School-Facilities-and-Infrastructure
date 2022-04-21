<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='kelas';
        $data['admin']=$this->m_admin->tampil($table)->result();
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('kelas/kelas',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'nama_kelas' => $this->input->post('nama'),
            'kode_kelas' => $this->input->post('kode')
        );
        $this->m_admin->tambah($data, 'kelas');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('kelas');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_kelas' => $id], 'kelas')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('kelas/editKelas',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'nama_kelas' => $this->input->post('nama'),
            'kode_kelas' => $this->input->post('kode')
        );
        $where = array('id_kelas' => $id);
        $this->m_admin->update($where, $data, 'kelas');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('kelas');
    }
    public function hapus($id)
    {
        $where = array('id_kelas' => $id);
        $this->m_admin->hapus($where, 'kelas');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('kelas');
    }
}
