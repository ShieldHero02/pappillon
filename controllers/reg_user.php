<?php
    // For Services Provider

    require_once "db.php";
    

    $role = $_COOKIE['role'];                     //registration.php
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
   // $repeat_password = $_POST['repeat_pass'];


    $file = $_COOKIE['file'];                    //registration__info.php
    $name = $_COOKIE['filename'];
    $path__db = $_COOKIE['path'];
    $tags = $_COOKIE['tags'];
    $about__us = $_COOKIE['about'];
    $provider__name = $_COOKIE['provider'];


    $name__hotel = $_COOKIE['name__hotel'];       //registhotel.php
    $image__hotel = $_COOKIE['image__hotel'];
    
    
    $finish__button = $_POST['registration'];

    if (isset($_POST['check']))
    {
        mysqli_query($db__connect , "INSERT INTO `users__information`(`name`, `password`, `email`, `role`, `image`, `tags`, `hotel`, `hotel__image`) VALUES ('Provider','$password','$email','$role','$path__db','$tags','$name__hotel','$image__hotel')");
    }


?>