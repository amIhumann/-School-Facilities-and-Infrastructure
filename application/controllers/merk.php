<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='merk';
        $data['admin']=$this->m_admin->tampil($table)->result();
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('peralatan/merk',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'nama_merk' => $this->input->post('nama')
        );
        $this->m_admin->tambah($data, 'merk');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('merk');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_merk' => $id], 'merk')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('peralatan/editMerk',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'nama_merk' => $this->input->post('nama')
        );
        $where = array('id_merk' => $id);
        $this->m_admin->update($where, $data, 'merk');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('merk');
    }
    public function hapus($id)
    {
        $where = array('id_merk' => $id);
        $this->m_admin->hapus($where, 'merk');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('merk');
    }
}
