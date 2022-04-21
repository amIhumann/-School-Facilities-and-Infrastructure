<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peralatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index()
    {
        $table = 'peralatan';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peralatan'] = $this->m_admin->tampilJoinPeralatan()->result();
        $data['jenis'] = $this->m_admin->tampil('jenis')->result();
        $data['merk'] = $this->m_admin->tampil('merk')->result();
        $data['warna'] = $this->m_admin->tampil('warna')->result();
        $data['kategori'] = $this->m_admin->tampil('kategori')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('peralatan/peralatan', $data);
        $this->load->view('template/topbar');
    }
    public function tambah()
    {
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './src/img';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG ';
            $config['max_size'] = 2048;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'id_jenis' => $this->input->post('id_jenis'),
            'id_warna' => $this->input->post('id_warna'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_merk' => $this->input->post('id_merk'),
            'nama_peralatan' => $this->input->post('nama'),
            'tgl_beli_peralatan' => $this->input->post('tgl'),
            'status_peralatan' => $this->input->post('status'),
            'jml_kerusakan_alat' => $this->input->post('jml_rusak'),
            'status_ketersediaan_alat' => $this->input->post('tersedia'),
            'aturan_service_alat' => $this->input->post('service'),
            'image_peralatan' => $foto
        );
        $this->m_admin->tambah($data, 'peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('peralatan');
    }
    public function edit($id)
    {
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['jenis'] = $this->m_admin->tampil('jenis')->result();
        $data['merk'] = $this->m_admin->tampil('merk')->result();
        $data['warna'] = $this->m_admin->tampil('warna')->result();
        $data['kategori'] = $this->m_admin->tampil('kategori')->result();
        $data['admin'] = $this->m_admin->edit(['id_peralatan' => $id], 'peralatan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('peralatan/editPeralatan', $data);
        $this->load->view('template/topbar');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $data = array(
                'id_jenis' => $this->input->post('id_jenis'),
                'id_warna' => $this->input->post('id_warna'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_merk' => $this->input->post('id_merk'),
                'nama_peralatan' => $this->input->post('nama'),
                'tgl_beli_peralatan' => $this->input->post('tgl'),
                'status_peralatan' => $this->input->post('status'),
                'jml_kerusakan_alat' => $this->input->post('jml_rusak'),
                'status_ketersediaan_alat' => $this->input->post('tersedia'),
                'aturan_service_alat' => $this->input->post('service'),
            );
            $where = array('id_peralatan' => $id);
            $this->m_admin->update($where, $data, 'peralatan');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
            redirect('peralatan');
        } else {
            $foto = $_FILES['foto'];
            $foto = $this->upload->data('file_name');
            $data = array(
                'id_jenis' => $this->input->post('id_jenis'),
                'id_warna' => $this->input->post('id_warna'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_merk' => $this->input->post('id_merk'),
                'nama_peralatan' => $this->input->post('nama'),
                'tgl_beli_peralatan' => $this->input->post('tgl'),
                'status_peralatan' => $this->input->post('status'),
                'jml_kerusakan_alat' => $this->input->post('jml_rusak'),
                'status_ketersediaan_alat' => $this->input->post('tersedia'),
                'aturan_service_alat' => $this->input->post('service'),
                'image_peralatan' => $foto
            );
            $where = array('id_peralatan' => $id);
            $this->m_admin->update($where, $data, 'peralatan');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil diubah
      </div>');
            redirect('peralatan');
        }
    }
    public function hapus($id)
    {
        $where = array('id_peralatan' => $id);
        $this->m_admin->hapus($where, 'peralatan');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('peralatan');
    }
    public function detail($id)
    {
        $detail = $this->m_admin->detailPeralatan($id)->row();
        $table = 'peralatan';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['detail'] = $detail;
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('peralatan/detailPeralatan', $data);
        $this->load->view('template/topbar');
    }
}
