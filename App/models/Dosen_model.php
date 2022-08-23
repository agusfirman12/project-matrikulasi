<?php

class Dosen_model
{
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getDosenById()
    {
        $id = $_SESSION['id'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE user_id = ' . $id);
        return $this->db->single();
    }
}
