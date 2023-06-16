<?php
    require_once "../controllers/db.php";

    $email__form = $_POST["email"];
    $password__form = $_POST["password"];

    $query__email = mysqli_query($db__connect , "SELECT `email` FROM `users__information` WHERE `email` = '$email__form';");
    $query__password = mysqli_query($db__connect , "SELECT `password` FROM `users__information` WHERE `password` = '$password__form';");

    $query__result__email = mysqli_fetch_assoc($query__email);
    $query__result__password = mysqli_fetch_assoc($query__password);

    $result__email = $query__result__email['email'];
    $result__password = $query__result__password['password'];
?>