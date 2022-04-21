<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='perbaikan';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['guru']=$this->m_admin->tampil('guru')->result();
        $data['perbaikan']=$this->m_admin->tampilPerbaikan()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('pinjam/perbaikan',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'id_guru' => $this->input->post('id_guru'),
            'tgl_perbaikan' => $this->input->post('tgl'),
        );
        $this->m_admin->tambah($data, 'perbaikan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('perbaikan');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_perbaikan' => $id], 'perbaikan')->result();
        $data['guru']=$this->m_admin->tampil('guru')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('pinjam/editPerbaikan',$data);
        $this->load->view('template/topbar');
    }
    public function update(){
        $id = $this->input->post('id');
        $data = array(
            'id_guru' => $this->input->post('id_guru'),
            'tgl_perbaikan' => $this->input->post('tgl'),
        );
        $where = array('id_perbaikan' => $id);
        $this->m_admin->update($where, $data, 'perbaikan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('perbaikan');
    }
    public function hapus($id)
    {
        $where = array('id_perbaikan' => $id);
        $this->m_admin->hapus($where, 'perbaikan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('perbaikan');
    }
}
