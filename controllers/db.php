<?php

    $server = "127.0.0.1";
    $user = "root";
    $password = "";
    $db_name = "papillon";


    $db__connect = mysqli_connect($server,$user,$password,$db_name);
    mysqli_set_charset($db__connect , 'utf-8');

?>