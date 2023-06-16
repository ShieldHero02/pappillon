<?php
    //error_reporting(0);
    require_once "../controllers/db.php";
    require_once "log.php";


    if (isset($_POST['login']))
    {
        if ($email__form == $result__email and $password__form == $result__password )
        { 
            $status = "online";
            
            setcookie("online", $status);
            setcookie("email" , "$result__email");
            setcookie("password" , "$result__password");

            header("Location: profile.php");
        }
        else 
        {
            $message = "<p class='error' >Упс, спробуйте ще раз!</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../fonts/style.css">
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
                    Увійти
                </h1>

                <input type="email" class="form__input" name="email" placeholder=" Email*" required>
                <input type="password" class="form__input" name="password" placeholder=" Password*" required>
                <?php
                    if ($message)
                        echo $message;
                ?>
                <button class="form__button" name="login">Увійти</button>
                <p class="form__textbox">
                    Не маєте акаунту? <a href="../registration.php" class="form__link">Зареєструйтеся</a>
                </p>
                
                <p class="form__secondtext">
                    Увійти за допомогою
                </p>
                <div class="form__icons">
                    <div class="form__iconbox">
                        <a href="" class="form__iconlink">
                            <img src="images/google.png" alt="">
                        </a>
                    </div>
                    <div class="form__iconbox">
                        <a href="" class="form__iconlink">
                            <img src="images/facebook.png" alt="">
                        </a>
                    </div>
                    <div class="form__iconbox">
                        <a href="" class="form__iconlink">
                            <img src="images/twiter.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>