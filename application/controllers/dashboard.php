<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function index(){
        $data['peralatan']=$this->db->query('SELECT COUNT(id_peralatan) AS jumlah FROM Peralatan;')->row_array();
        $data['admin']=$this->db->query('SELECT COUNT(id_admin) AS jumlah FROM admin;')->row_array();
        $data['peminjaman']=$this->db->query('SELECT COUNT(id_peminjaman) AS jumlah FROM peminjaman;')->row_array();
        $data['pemesanan']=$this->db->query('SELECT COUNT(id_pemesanan) AS jumlah FROM pemesanan;')->row_array();
        $data['users']=$this->m_admin->user($this->session->userdata('email'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('template/topbar');
    }
}