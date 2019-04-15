<?php

class Model_Login extends Model
{

    public function checkUser($login, $password) {
        try {
            $db = $this->pdo;
            $enc_password = hash('sha256', $password);
            $query = $db->prepare("SELECT * FROM `user` WHERE login='$login' AND password='$enc_password'");
            $query->execute();

            if ($query->rowCount() >= 1) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                $_SESSION['username'] = $result->login;

                return $_SESSION['username'];

            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }


    }

    public function logout()
    {
        session_destroy();
        if (isset($_COOKIE['username'])) {
            setcookie('username', '', 1, "/");
        }
        header("Location: /");
    }
}
