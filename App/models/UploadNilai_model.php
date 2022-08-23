<?php

class UploadNilai_Model
{
    private $table2 = 'nilai';
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

    public function getNilai($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE pendaftaran_ujian_kp_id = 
        (SELECT id FROM pendaftaran_ujian_kp WHERE pendaftaran_kp_id = 
        (SELECT id FROM pendaftaran_kp WHERE anggota_kelompok_id = :id))');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function setNilai($data)
    {
        $id = $this->getDosen();
        $bukti_nilai = $this->upload();
        if (!$bukti_nilai) {
            return false;
        }

        $query = "INSERT INTO " . $this->table2 . " VALUES ('',:Nilai_Pembimbing_Lapangan,:Nilai_Pembimbing_KP,:Nilai_Penguji,:Bukti_Nilai_Pembimbing_Lapangan,:id)";

        $this->db->query($query);
        $this->db->bind('Nilai_Pembimbing_Lapangan', $data['pembimbing_lapangan']);
        $this->db->bind('Nilai_Pembimbing_KP', $data['pembimbing_KP']);
        $this->db->bind('Nilai_Penguji', $data['penguji']);

        $this->db->bind('Bukti_Nilai_Pembimbing_Lapangan', $bukti_nilai);
        $this->db->bind('id', $id['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function upload()
    {
        $namaFile = $_FILES['bukti_nilai']['name'];
        $ukuranFile = $_FILES['bukti_nilai']['size'];
        $error = $_FILES['bukti_nilai']['error'];
        $tmpName = $_FILES['bukti_nilai']['tmp_name'];

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
