<?php

Class Controller_Login extends Controller_Base
{
    public $layouts = "first_layouts";
    public function index()
    {
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password =$_POST['password'];
            $user = new Model_Login();
            $user->checkUser($login, $password);

            if (isset($_SESSION['username'])) {
                $data["login_status"] = "access_granted";
                setcookie('username', $login, time()+3600, "/");
                $_SESSION['username'] = $login;
                $this->template->vars('userInfo', $data);
                header("Location: /");
            } else {
               $data["login_status"] = "access_denied";
                $this->template->vars('userInfo', $data);
                $this->template->view('index');
            }

        }
        else
        {
            $data["login_status"] = "";
            $this->template->vars('userInfo', $data);
            $this->template->view('index');
        }

    }

    public function logout()
    {
        (new Model_Login())->logout();
    }
}
