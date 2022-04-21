<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='kategori';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin']=$this->m_admin->tampil($table)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('peralatan/kategori',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->m_admin->tambah($data, 'kategori');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('kategori');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_kategori' => $id], 'kategori')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('peralatan/editKategori',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $where = array('id_kategori' => $id);
        $this->m_admin->update($where, $data, 'kategori');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('kategori');
    }
    public function hapus($id)
    {
        $where = array('id_kategori' => $id);
        $this->m_admin->hapus($where, 'kategori');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('kategori');
    }
}
