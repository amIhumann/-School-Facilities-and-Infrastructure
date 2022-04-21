<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index(){
        $table='jurusan';
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin']=$this->m_admin->tampil($table)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('kelas/jurusan',$data);
        $this->load->view('template/topbar');
    }
    public function tambah(){
        $data = array(
            'nama_jurusan' => $this->input->post('nama'),
            'kode_jurusan' => $this->input->post('kode')
        );
        $this->m_admin->tambah($data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('jurusan');
    }
    public function edit($id){
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_jurusan' => $id], 'jurusan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('kelas/editjurusan',$data);
        $this->load->view('template/topbar');
    }
    public function update($id){
        $id = $this->input->post('id');
        $data = array(
            'nama_jurusan' => $this->input->post('nama'),
            'kode_jurusan' => $this->input->post('kode')
        );
        $where = array('id_jurusan' => $id);
        $this->m_admin->update($where, $data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
      redirect('jurusan');
    }
    public function hapus($id)
    {
        $where = array('id_jurusan' => $id);
        $this->m_admin->hapus($where, 'jurusan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('jurusan');
    }
}
