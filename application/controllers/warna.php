<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Warna extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='warna';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin']=$this->m_admin->tampil($table)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('peralatan/warna',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'nama_warna' => $this->input->post('nama')
        );
        $this->m_admin->tambah($data, 'warna');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('warna');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_warna' => $id], 'warna')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('peralatan/editWarna',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'nama_warna' => $this->input->post('nama')
        );
        $where = array('id_warna' => $id);
        $this->m_admin->update($where, $data, 'warna');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('warna');
    }
    public function hapus($id)
    {
        $where = array('id_warna' => $id);
        $this->m_admin->hapus($where, 'warna');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('warna');
    }
}
