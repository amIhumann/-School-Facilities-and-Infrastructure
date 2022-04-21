<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('landingPage');
    }
    public function aksi()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $where = array(
        //     'email' => $email,
        // );
        $cek = $this->m_admin->user($email)->row_array();
        if ($cek) {
            if ($cek['password'] == $password) {

                $data = array(
                    'id_admin' => $cek['id_admin'],
                    'id_guru' => $cek['id_guru'],
                    'id_siswa' => $cek['id_siswa'],
                    'email' => $email,
                    'level' => $cek['level'],
                    'foto' => $cek['foto'],
                    'id_jabatan' => $cek['id_jabatan'],
                    'id_jadwal' => $cek['id_jadwal'],
                    'id_peminjam' => $cek['id_peminjam'],
                    'nik' => $cek['nik'],
                    'nis' => $cek['nis'],
                    'nama_guru' => $cek['nama_guru'],
                    'nama_siswa' => $cek['nama_siswa'],
                    'alamat_guru' => $cek['alamat_guru'],
                    'tgl_lahir_guru' => $cek['tgl_lahir_guru'],
                    'id_kelas_siswa' => $cek['id_kelas_siswa'],
                    'alamat_siswa' => $cek['alamat_siswa'],
                    'angkatan_siswa' => $cek['angkatan_siswa'],
                    'ket_siswa' => $cek['ket_siswa'],
                );

                $this->session->set_userdata($data);
                redirect("dashboard");
            } else {
                redirect("auth");
            }
        } else {
            redirect('auth');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
    function error()
    {
        $this->load->view('404');
    }
}
