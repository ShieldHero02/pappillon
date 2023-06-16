<?php
    require_once "controllers/db.php";


    $role_user = $_POST['role'];
    $password = $_POST['password'];
    $repeat__pass = $_POST['repeatP'];

    if (isset($_POST['next']))
    {   
        if ($password == $repeat__pass)
        {
            setcookie("role", $role_user);
            setcookie("email", $_POST['email']);
            setcookie("password" , $_POST['password']);

            $role = $_COOKIE['role'];                     
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];

            $query__all = mysqli_query($db__connect , "SELECT * FROM `users__information` WHERE `email` = '$email';");
            $query__all__result = mysqli_fetch_assoc($query__all);
            $var__email__result = $query__all__result['email'];


            if ($var__email__result == null || $var__email__result == "")
            {
                if ($role_user == "Надавач послуг")
                {
                    header("Location: registration__info.php");
                }
                elseif ($role_user == "Користувач")
                {
                    header("Location: nextregistration.php");
                }
            }
            elseif ($var__email__result == $_POST['email'])
            {
                echo "<p class='error'>Такий email вже використовується!</p>";
            }
        }
        else 
        {
            $wrong__password = "<p class='error'>паролі не співпадають!</p>";
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
    <link rel="stylesheet" href="fonts/style.css">
    <link rel="stylesheet" href="style/adaptiveforms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <div class="form__box">
                <h1 class="form__title">
                    Реєстрація
                </h1>
                <select class="form__list" name="role" id="">
                    <option class="form__list-element" value="0" selected>Оберіть свою роль</option>
                    <option class="form__list-element" value="Надавач послуг">Надавач послуг</option>
                    <option class="form__list-element" value="Користувач">Користувач</option>
                </select>
                <input type="email" class="form__input" name="email" placeholder=" Email*" required>
                <input type="password" class="form__input" name="password" placeholder=" Password*" required>
                <input type="password" class="form__input" name="repeatP" placeholder=" Repeat password*" required>
                <button class="form__button" name="next">Далі</button>
                <?php
                    if ($wrong__password != null)
                    {
                        echo $wrong__password;
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>
