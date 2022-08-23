<?php

class UploadNilai extends Controller
{

    public function index()
    {
        session_start();
        $data['judul'] = 'Upload Nilai';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['dosen'] = $this->model('Dosen_model')->getDosenById();
        $this->view('templates/header', $data);
        $this->view('uploadNilai/index', $data);
        $this->view('templates/footer');
    }

    public function nilai($id)
    {
        session_start();
        $data['judul'] = 'Nilai Mahasiswa';
        $data['nilai'] = $this->model('UploadNilai_model')->getNilai($id);
        $data['dosen'] = $this->model('Dosen_model')->getDosenById();
        $this->view('templates/header', $data);
        $this->view('uploadNilai/nilai', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        session_start();
        if ($this->model('UploadNilai_Model')->setNilai($_POST) > 0) {
            echo "
            <script>
            alert(nilai berhasil di tambahkan );
            </script>";
            header('Location: ' . BASEURL . 'uploadnilai');
            exit;
        }
    }
}
