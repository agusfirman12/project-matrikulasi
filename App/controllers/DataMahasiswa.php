<?php

class DataMahasiswa extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            header('Location: ' . BASEURL . 'log');
            exit;
        }
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['dosen'] = $this->model('Dosen_model')->getDosenById();
        $this->view('templates/header', $data);
        $this->view('dataMahasiswa/index', $data);
        $this->view('templates/footer');
    }
    public function uploadFoto()
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            header('Location: ' . BASEURL . 'log');
            exit;
        }
        if ($this->model('Mahasiswa_Model')->uploadFoto($_POST) > 0) {
            echo "
            <script>
            alert(nilai berhasil di tambahkan );
            </script>";
            header('Location: ' . BASEURL . 'datamahasiswa');
            exit;
        }
    }
}
