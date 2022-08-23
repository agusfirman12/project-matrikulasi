<?php

class Log extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('login/index');
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data['login'] = $this->model('User_model')->getUser($username, $password);

        session_start();
        if ($data['login'] == null) {
            header("Location: " . BASEURL . "404");
        } else {
            foreach ($data['login'] as $row) :
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['username'];
                header("Location: " . BASEURL . "datamahasiswa");
            endforeach;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: " . BASEURL . "log");
        exit;
    }
}
