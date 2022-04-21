<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index()
    {
        $table = 'peminjam';
        $params = 'guru';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['guru'] = $this->m_admin->tampil('guru')->result();
        $data['peminjam'] = $this->m_admin->peminjamJoin($params)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pinjam/peminjam_guru', $data);
        $this->load->view('template/topbar');
    }
    public function siswa()
    {
        $table = 'peminjam';
        $params = 'siswa';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['siswa'] = $this->m_admin->tampil('siswa')->result();
        $data['peminjam'] = $this->m_admin->peminjamJoin($params)->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pinjam/peminjam_siswa', $data);
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
            'id_peminjam' => $this->input->post('id_peminjam'),
            'status_peminjam' => $this->input->post('status'),
            'keterangan_peminjam' => $this->input->post('keterangan'),
            'image_peminjam' => $foto,
        );
        $this->m_admin->tambah($data, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('peminjam');
    }
    public function tambahSiswa()
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
            'id_peminjam' => $this->input->post('id_peminjam'),
            'status_peminjam' => $this->input->post('status'),
            'keterangan_peminjam' => $this->input->post('keterangan'),
            'image_peminjam' => $foto,
        );
        $this->m_admin->tambah($data, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
        Data berhasil ditambahkan
      </div>');
        redirect('peminjam/siswa');
    }
    public function edit($id)
    {
        $data['guru'] = $this->m_admin->tampil('guru')->result();
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peminjam'] = $this->m_admin->edit(['id_peminjam' => $id], 'peminjam')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pinjam/editPeminjamGuru', $data);
        $this->load->view('template/topbar');
    }
    public function editSiswa($id)
    {
        $data['siswa'] = $this->m_admin->tampil('siswa')->result();
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['peminjam'] = $this->m_admin->edit(['id_peminjam' => $id], 'peminjam')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pinjam/editPeminjamSiswa', $data);
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
                'status_peminjam' => $this->input->post('status'),
                'keterangan_peminjam' => $this->input->post('keterangan'),
            );
            $where = array('id_peminjam' => $id);
            $this->m_admin->update($where, $data, 'peminjam');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('peminjam');
        } else {
            $foto = $_FILES['foto'];
            $foto = $this->upload->data('file_name');
            $data = array(
                'status_peminjam' => $this->input->post('status'),
                'keterangan_peminjam' => $this->input->post('keterangan'),
                'image_peminjam' => $foto,
            );
            $where = array('id_peminjam' => $id);
            $this->m_admin->update($where, $data, 'peminjam');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('peminjam');
        }
    }
    public function updateSiswa()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $data = array(
                'status_peminjam' => $this->input->post('status'),
                'keterangan_peminjam' => $this->input->post('keterangan'),
            );
            $where = array('id_peminjam' => $id);
            $this->m_admin->update($where, $data, 'peminjam');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('peminjam/siswa');
        } else {
            $foto = $_FILES['foto'];
            $foto = $this->upload->data('file_name');
            $data = array(
                'status_peminjam' => $this->input->post('status'),
                'keterangan_peminjam' => $this->input->post('keterangan'),
                'image_peminjam' => $foto,
            );
            $where = array('id_peminjam' => $id);
            $this->m_admin->update($where, $data, 'peminjam');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('peminjam/siswa');
        }
    }
    public function hapus($id)
    {
        $where = array('id_peminjam' => $id);
        $this->m_admin->hapus($where, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('peminjam');
    }
    public function hapusSiswa($id)
    {
        $where = array('id_peminjam' => $id);
        $this->m_admin->hapus($where, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('peminjam/siswa');
    }
}
