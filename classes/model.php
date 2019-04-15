<?php

class Model
{



    function __construct()
    {
        // TODO : вынисти в конфигурацию !!!
        $host='127.0.0.1:3306';
        $dbname="beelab";
        $user="root";
        $pass="";
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }


    function db()
    {
        return $this->pdo;
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }

    /**
     * @param string $sql SQL query string
     * @param array $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll();
        }
        return [];
    }


}