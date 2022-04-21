<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Hari extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='hari';
        $data['admin']=$this->m_admin->tampil($table)->result();
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('jadwal/hari',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'nama_hari' => $this->input->post('nama')
        );
        $this->m_admin->tambah($data, 'hari');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('hari');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_hari' => $id], 'hari')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('jadwal/editHari',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'nama_hari' => $this->input->post('nama')
        );
        $where = array('id_hari' => $id);
        $this->m_admin->update($where, $data, 'hari');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('hari');
    }
    public function hapus($id)
    {
        $where = array('id_hari' => $id);
        $this->m_admin->hapus($where, 'hari');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('hari');
    }
}
