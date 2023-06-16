<?php
    error_reporting(0);

    require_once "../controllers/db.php";
    require_once "log.php";

    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];


    
    $query__email = mysqli_query($db__connect , "SELECT `email` FROM `users__information` WHERE `email` = '$email';");
    $query__password = mysqli_query($db__connect , "SELECT `password` FROM `users__information` WHERE `password` = '$password';");
    $query__all = mysqli_query($db__connect , "SELECT * FROM `users__information` WHERE `email` = '$email';");

    $query__result__email = mysqli_fetch_assoc($query__email);
    $query__result__password = mysqli_fetch_assoc($query__password);
    $query__result__all = mysqli_fetch_assoc($query__all);

    $result__email = $query__result__email['email'];
    $result__password = $query__result__password['password'];
    $result__nameuser = $query__result__all['name']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="stylesheet" href="../fonts/style.css">
    <link rel="stylesheet" href="style/adaptiveprofile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Pappillon</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header__block">
                <a href="changeprofile.php">
                    <img src="images/Papillon.png" alt="">
                </a>
                <div class="header__box">
                    <input class="header__input" type="text" placeholder="          Search here...">
                    <form method="post">
                        <button class="header__button left__button" name="exit">
                            Вийти
                        </button>
                    </form>
                    <?php
                        if (isset($_POST['exit']))
                        {
                            header("Location: ../index.php");
                        }
                    ?>
                    <a href="profile.php" class="header__config">
                        <img src="images/dots.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="content">
        <div class="container">
            <div class="content__flex-container">
                <div class="content__filter">
                    <h3 class="content__title">
                        Фільтрування
                    </h3>
                    <h4 class="content__subtitle">
                        Ціна
                    </h4>
                    <div class="slidecontainer">
                        <div class="content__prices">
                            <p class="filter__minimum">
                                0
                            </p>
                            <p class="filter__medium">
                                10000
                            </p>
                            <p class="filter__max">
                                20000
                            </p>
                        </div>
                        <form action="" class="content__form">
                            <input type="range" min="0" max="20000" value="50" class="slider" id="myRange">
                            <div class="form__checkbox">
                                <h4 class="content__subtitle">
                                    Область
                                </h4>
                                <div class="form__places">
                                    <div class="form__box">
                                        <input class="form__checkbox-input" type="checkbox" name="" id="1">
                                        <label class="form__box-text" for="1">Закарпатська</label>
                                    </div>
                                    <div class="form__box">
                                        <input class="form__checkbox-input" type="checkbox" name="" id="2">
                                        <label class="form__box-text" for="2">Львівська</label>
                                    </div>
                                    <div class="form__box">
                                        <input class="form__checkbox-input" type="checkbox" name="" id="3">
                                        <label class="form__box-text" for="3">Рівненська</label>
                                    </div>
                                </div>
                                <h4 class="content__subtitle">
                                    Категорії
                                </h4>
                                <div class="form__places">
                                    <div class="form__box">
                                        <input class="form__checkbox-input" type="checkbox" name="" id="4">
                                        <label class="form__box-text" for="4">Закарпатська</label>
                                    </div>
                                    <div class="form__box">
                                        <input class="form__checkbox-input" type="checkbox" name="" id="5">
                                        <label class="form__box-text" for="5">Львівська</label>
                                    </div>
                                    <div class="form__box">
                                        <input class="form__checkbox-input" type="checkbox" name="" id="6">
                                        <label class="form__box-text" for="6">Рівненська</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="content__content">
                    <div class="container">
                        <div class="content__profilestart">

                            <img class="content__avatar" src="images/addava.png" alt="">
                            <h2 class="content__title center__title">
                                <?php
                                    echo $result__nameuser;
                                ?>
                            </h2>
                        </div>
                        
                        <div class="content__order">
                            <div class="content__orderbox">
                                <a class="content__button bold" href="">Публікації</a>
                            </div>
                        </div>
































                        <div class="content__recomendations">
                            <div class="content__recomendation">
                                <div class="content__column">
                                    <div class="content__create">
                                        <div class="form__block">
                                            <form action="" class="form__publication" method="post" enctype="multipart/form-data">
                                                <div class="form__flexcolumn">
                                                    <input id="so_file" type="file" style="display:none;" name="image__hotel" required/>
                                                    <button class="form__file" id="bntUpload">
                                                        <img src="../images/PhotoAdd.png" alt="">
                                                    </button>
                                                </div>
                                                <div class="form__flexbox">
                                                    <textarea class="form__textarea" name="text__publication" id="" cols="30" rows="5" placeholder="опис публікації" required></textarea>
                                                    <input class="form__button-addpub" type="submit" value="Додати публікацію" name="send" required>
                                                    
                                                    <?php
                                                        if (isset($_POST['send']))
                                                        {
                                                            unset($_POST['send']);

                                                            $file = $_FILES["image__hotel"]['file'];
                                                            $name = $_FILES['image__hotel']['name'];
                                                            $path = "user__img/" . $name; 
                                                            $text__publication = $_POST['text__publication'];

                                                            if(move_uploaded_file($_FILES["image__hotel"]['tmp_name'], $path))
                                                            {
                                                                echo "<p class='green'>Файл завантажився!</p>";
                                                                mysqli_query($db__connect , "INSERT INTO `publication`(`user__name`,`image`,`text`) VALUES('$result__nameuser','$path','$text__publication');");
                                                                header("Location: changeprofile.php");
                                                            }
                                                            else 
                                                            {
                                                                echo "<p class='error'>Файл не завантажився!</p>";
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="content__publcation-block">
                                            <?php
                                                $min__id__query = mysqli_query($db__connect , "SELECT MIN(`id`) FROM `publication`;");
                                                $min__id__result = mysqli_fetch_assoc($min__id__query);
                                
                                                $max__id__query = mysqli_query($db__connect , "SELECT MAX(`id`) FROM `publication`;");
                                                $max__id__result = mysqli_fetch_assoc($max__id__query);
                                
                                                foreach ($min__id__result as $min__id)
                                                foreach ($max__id__result as $max__id)
                                            

                                                for ($i = $min__id; $i <= $max__id; $i++)
                                                {
                                                    $publication__query = mysqli_query($db__connect , "SELECT * FROM `publication` WHERE `user__name` = '$result__nameuser' AND `id` = $i;");
                                                    $publication__result = mysqli_fetch_assoc($publication__query);

                                                    

                                                    if ($publication__result)
                                                    {
                                                        echo  "<div class='content__recomendation-box'>";
                                                        echo  "<img class='content__recomendation-img' src=".$publication__result['image']." alt=''>";
                                                        echo  "<div class='content__recomendation-comment'>";
                                                        echo  "<div class='content__user'>";
                                                        echo  "<img class='content__user-img' src='images/davinchi.png' alt=''>";
                                                        echo  "<div class='content__user-info'>";
                                                        echo  "<p class='content__user-text blue'>".$publication__result['user__name']."</p>";
                                                        echo  "<div class='content__user-place'>";
                                                        echo  "<img class='content__point-img' src='images/point.png' alt=''>";
                                                        echo  "</div>"; 
                                                        echo  "</div>";
                                                        echo  "</div>";
                                                        echo  "<div class='content__do'>";
                                                        echo  "<img class='content__do-img' src='images/like.png' alt=''>";
                                                        echo  "<img class='content__do-img' src='images/comment.png' alt=''>";
                                                        echo  "<img class='content__do-img' src='images/repost.png' alt=''>";
                                                        echo  "</div>"; 
                                                        echo  "</div>";
                                                        echo  "<p class='content__under-do center'>".$publication__result['text']."</p>";
                                                        echo  "</div>";
                                                    }
                                                }
                                            ?>
                                        </div>


                                                



























                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="footer__block">
                <div class="footer__box">
                    <a href="index.html" class="footer__logo">
                        <img src="images/logofooter.png" alt="">
                    </a>
                    <a href="" class="footer__google-play">
                        <img src="images/google__play.png" alt="">
                    </a>
                    <a href="" class="footer__app-store">
                        <img src="images/google__play.png" alt="">
                    </a>
                </div>
                <div class="footer__box">
                    <h3 class="footer__title">
                        Підпишіться на наші оновлення
                    </h3>
                    <p class="footer__text">
                        Підпишіться на наші оновлення щоб бути в курсі про всі наші новини
                    </p>
                    <form action="" class="footer__form">
                        <input type="email" class="footer__input" placeholder="Введіть свою електронну адресу*">
                        <button class="footer__button">
                            Підписатися
                        </button>
                    </form>
                </div>
            </div>
            <p class="footer__year">
                ©2022
            </p>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>        
    <script src="../script/selectfile.js"></script>                        
    <script src="../script/script.js"></script>
</body>
</html>