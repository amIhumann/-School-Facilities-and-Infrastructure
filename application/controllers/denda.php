<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='denda';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['denda']=$this->m_admin->tampil($table)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('pinjam/denda',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'ket_denda' => $this->input->post('keterangan'),
            'biaya_denda' => $this->input->post('biaya'),
        );
        $this->m_admin->tambah($data, 'denda');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('denda');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_denda' => $id], 'denda')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('pinjam/editDenda',$data);
        $this->load->view('template/topbar');
    }
    public function update(){
        $id = $this->input->post('id');
        $data = array(
            'ket_denda' => $this->input->post('keterangan'),
            'biaya_denda' => $this->input->post('biaya'),
        );
        $where = array('id_denda' => $id);
        $this->m_admin->update($where, $data, 'denda');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('denda');
    }
    public function hapus($id)
    {
        $where = array('id_denda' => $id);
        $this->m_admin->hapus($where, 'denda');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('denda');
    }
}
