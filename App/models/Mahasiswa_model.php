<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDosen()
    {
        $id = $_SESSION['id'];
        $this->db->query('SELECT id FROM pendaftaran_kp WHERE dosen_id =
        (SELECT id FROM dosen WHERE user_id = ' . $id . ')');
        return $this->db->single();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ID_Anggota=:ID_Anggota');
        $this->db->bind('ID_Anggota', $id);
        return $this->db->single();
    }

    public function getAllMahasiswa()
    {
        $id = $this->getDosen();
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE anggota_kelompok_id =:id');
        $this->db->bind('id', $id['id']);
        return $this->db->resultSet();
    }

    public function uploadFoto($data)
    {
        $id = $this->getDosen();
        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }

        $query = "UPDATE dosen SET gambar = :gambar WHERE id =:id";

        $this->db->query($query);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('id', $id['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function upload()
    {
        $namaFile = $_FILES['upload_foto']['name'];
        $ukuranFile = $_FILES['upload_foto']['size'];
        $error = $_FILES['upload_foto']['error'];
        $tmpName = $_FILES['upload_foto']['tmp_name'];

        //cek apakah sudah upload gambar
        if ($error === 4) {
            echo "<script>
            alert ('silahkan upload gambar terlebih dahulu');
            </script>";
            return false;
        }

        //cek apakah yamg di upoad adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
            alert ('ekstensi gambar salah (jpg,jpeg,png)');
            </script>";
        }

        //cek ukurannya
        if ($ukuranFile > 1000000) {
            echo "<script>
            alert ('ukuran gambar max : 1 mb');
            </script>";
        }

        //jika lolos pengecekan gambar siap di upolad
        move_uploaded_file($tmpName, '../Public/img/' . $namaFile);

        return $namaFile;
    }
}
