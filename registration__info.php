<?php
    require_once "controllers/db.php";
    require_once "controllers/reg_user.php";
    
    if (isset($_POST['reghotel']))
    {
        if (!empty($_FILES['file']))
        {
            if (!move_uploaded_file($file['tmp_name'] , $path))
            {
                echo "<p class='error__message'>файл не загрузився!</p>";
            }
            else
            {
                $file = $_FILES['file'];                    //registration__info.php
                $name = $file['name'];
                $path = "../images/" . $name;
                $path__db = "/images/" . $name;
                $tags = $_POST['myselect'];
                $about__us = $_POST['about__us'];
                $provider__name = $_POST['provider__name'];

                setcookie("file","$file");
                setcookie("filename","$name");
                setcookie("path","$path__db");
                setcookie("tags","$tags");
                setcookie("about","$about__us");
                setcookie("provider","$provider__name");

                header("Location: registhotel.php");
            }  
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
    <link rel="stylesheet" href="style/registhotel.css">
    <link rel="stylesheet" href="fonts/style.css">
    <link rel="stylesheet" href="style/adaptiveforms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form class="form" action="registhotel.php" method="post" enctype="multipart/form-data">
            <div class="form__box">
                <h1 class="form__title">
                    Реєстрація
                </h1>


                <input id="so_file" type="file" style="display:none;" name="image" required/>
                <button class="form__profile" id="bntUpload"></button>
                <p class="form__text">
                    Добавте фотографію свого профілю
                </p>
                <p class="form__textbox">
                    Добавте кілька тегів послуг, які ви надаєте
                </p>


                <div class="form__input" role="select" name="myselect" required>
                    <option value="Сноуборд" selected>Сноуборд</option>
                    <option value="Лижі" selected>Лижі</option>
                </div><button class="form__addoption">+</button>

                <input type="text" class="form__inputtext" name="about__us" placeholder=" Додайте опис свого роду діяльності*" required>
                <input type="text" class="form__inputname" name="provider__name" placeholder=" Прізвище ім'я по батькові*" required>
                <button href="registhotel.php" class="form__button" name="reghotel">Далі</button>


            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script/selectfile.js"></script>
    <script src="script/multiselect.js"></script>
</body>
</html>