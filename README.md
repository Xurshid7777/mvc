# mvc
MVC php
Model-View-Controller

/classes/model.php

 function __construct()
    {
        // TODO : вынисти в конфигурацию !!!
        $host='127.0.0.1:3306'; //host base
        $dbname="beelab"; //basses name
        $user="root";  //user base
        $pass="";  //password 
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
