<?php
    require_once "controllers/db.php";

    if (isset($_POST['button']))
    {
        setcookie("users__namenew",$_POST['users__name']);
        $user__like = $_POST['myselect'];


        if ($_COOKIE['password'] != "" and $_COOKIE['email'] != "" and $_COOKIE['role'] != "") 
        {
            $name__user = $_COOKIE['users__namenew'];
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];
            $role = $_COOKIE['role'];

            mysqli_query($db__connect , "INSERT INTO `users__information`(`name`, `password`, `email`, `role`, `image`, `tags`, `hotel`, `hotel__image`) VALUES ('$name__user','$password','$email','$role','...','...','...','...')");
            header("Location: user__panel/");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/registration.css">
    <link rel="stylesheet" href="style/multiselect.css">
    <link rel="stylesheet" href="fonts/style.css">
    <link rel="stylesheet" href="style/adaptiveforms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form class="form" action="" method="post">
            <div class="form__box">
                <h1 class="form__title">
                    Реєстрація
                </h1> 

                <input type="text" class="form__inputname" name="users__name" placeholder=" Прізвище ім'я по батькові*" required>
                <div class="form__input multiselection" role="select" name="myselect">
                    <option class="multiselection" value="Сноуборд" selected>Сноуборд</option>
                    <option class="multiselection" value="Лижі" selected>Лижі</option>
                </div>
                <button class="form__addoption">+</button>

                <button class="form__button" name="button">Далі</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script/multiselect.js"></script>
</body>
</html>