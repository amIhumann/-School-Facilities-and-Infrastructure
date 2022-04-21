<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        who();
    }
    public function index()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $table = 'admin';
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->tampil($table)->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('template/topbar', $data);
    }
    public function profile()
    {
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('profile', $data);
        $this->load->view('template/topbar', $data);
    }
    public function editProfile()
    {
        $id=$this->input->post('id');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->input->post('password') != NULL) {
            if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                );
                $where = array('id_admin' => $id);
                $this->m_admin->update($where, $data, 'admin');
                $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
                Data berhasil diubah
              </div>');
                redirect('admin');
            } else {
                $foto = $_FILES['foto'];
                $foto = $this->upload->data('file_name');
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'foto' => $foto
                );
                $where = array('id_admin' => $id);
                $this->m_admin->update($where, $data, 'admin');
                $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
                Data berhasil diubah
              </div>');
                redirect('admin');
            }
        }else{
            if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'email' => $this->input->post('email'),
                );
                $where = array('id_admin' => $id);
                $this->m_admin->update($where, $data, 'admin');
                $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
                Data berhasil diubah
              </div>');
                redirect('admin');
            } else {
                $foto = $_FILES['foto'];
                $foto = $this->upload->data('file_name');
                $data = array(
                    'email' => $this->input->post('email'),
                    'foto' => $foto
                );
                $where = array('id_admin' => $id);
                $this->m_admin->update($where, $data, 'admin');
                $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
                Data berhasil diubah
              </div>');
                redirect('admin');
            }
        }
    }
    public function tambah()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $query = $this->db->query('SELECT id_admin FROM admin ORDER BY id_admin DESC LIMIT 1')->row_array();
        foreach ($query as $a) {
            $id = $a;
        }
        if ($foto = '') {
        } else {
            $config['upload_path'] = './src/img';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG ';
            $config['max_size'] = 2048;
            $config['full_path'] = './src/img/download.png';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        if ($this->input->post('level') == 'siswa') {
            $data = array(
                'id_admin' => ++$id,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'level' => 'siswa',
                'foto' => $foto,
                'id_siswa' => $id
            );
            $this->m_admin->tambah($data, 'admin');
            $data = [
                'id_siswa' => $id,
                'nama_siswa' => $this->input->post('nama'),
                'id_peminjam' => $id,
                'nis' => $this->input->post('nis'),
                'id_kelas_siswa' => $this->input->post('id_kelas'),
                'alamat_siswa' => $this->input->post('alamat'),
                'angkatan_siswa' => $this->input->post('angkatan'),
                'ket_siswa' => $this->input->post('keterangan'),
            ];
            $this->m_admin->tambah($data, 'siswa');
            $data = array(
                'id_peminjam' => $id,
                'status_peminjam' => 'Aktif',
                'keterangan_peminjam'=>'Baik'
            );
            $this->m_admin->tambah($data, 'peminjam');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil ditambahkan
          </div>');
            redirect('siswa');
        } elseif ($this->input->post('level') == 'guru') {
            $data = array(
                'id_admin' => ++$id,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'level' => 'guru',
                'foto' => $foto,
                'id_guru' => $id
            );
            $this->m_admin->tambah($data, 'admin');
            $data = array(
                'id_guru' => $id,
                'nama_guru' => $this->input->post('nama'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'id_peminjam' => $id,
                'id_jadwal' => $this->input->post('id_jadwal'),
                'nik' => $this->input->post('nik'),
                'alamat_guru' => $this->input->post('alamat'),
                'tgl_lahir_guru' => $this->input->post('tgl'),
            );
            $this->m_admin->tambah($data, 'guru');
            $data = array(
                'id_peminjam' => $id,
                'status_peminjam' => 'Aktif',
                'keterangan_peminjam'=>'Baik'
            );
            $this->m_admin->tambah($data, 'peminjam');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil ditambahkan
          </div>');
            redirect('guru');
        } else {
            $data = array(
                'id_admin' => ++$id,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'level' => 'admin',
                'foto' => $foto
            );
            $this->m_admin->tambah($data, 'admin');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil ditambahkan
          </div>');
            redirect('admin');
        }
    }
    public function edit($id)
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $data['users'] = $this->m_admin->user($this->session->userdata('email'))->row_array();
        $data['admin'] = $this->m_admin->edit(['id_admin' => $id], 'admin')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/editAdmin', $data);
        $this->load->view('template/topbar');
    }
    public function update()
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $id = $this->input->post('id');
        $config['upload_path'] = './src/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level')
            );
            $where = array('id_admin' => $id);
            $this->m_admin->update($where, $data, 'admin');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('admin');
        } else {
            $foto = $_FILES['foto'];
            $foto = $this->upload->data('file_name');
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level'),
                'foto' => $foto
            );
            $where = array('id_admin' => $id);
            $this->m_admin->update($where, $data, 'admin');
            $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-success" role="alert">
            Data berhasil diubah
          </div>');
            redirect('admin');
        }
    }
    public function hapus($id)
    {
        if ($this->session->userdata('level') != "admin") redirect('auth/error');
        $where = array('id_admin' => $id);
        $this->m_admin->hapus($where, 'admin');
        $where = array('id_guru' => $id);
        $this->m_admin->hapus($where, 'guru');
        $where = array('id_siswa' => $id);
        $this->m_admin->hapus($where, 'siswa');
        $where = array('id_peminjam' => $id);
        $this->m_admin->hapus($where, 'peminjam');
        $this->session->set_flashdata('pesan', '<div style="text-align:center;" class="alert alert-danger" role="alert">
        Data telah dihapus
      </div>');
        redirect('admin');
    }
}
