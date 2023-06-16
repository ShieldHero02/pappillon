<?php
    require_once "controllers/reg_user.php";

    if (isset($_POST['check']))
    {
        $name__hotel = $_POST['name__hotel'];
        $image__hotel = $_POST['image__hotel'];

        setcookie("name__hotel","$name__hotel");
        setcookie("image__hotel","$image__hotel");

        header("Location: user__panel/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/registhotel.css">
    <link rel="stylesheet" href="fonts/style.css">
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


                <input type="text" name="name__hotel" class="form__input" placeholder=" Назва садиби або готелю*" required>
                <input id="so_file" type="file" style="display:none;" name="image__hotel" required/>
                <button class="form__file" id="bntUpload">
                    
                </button>
                <p class="form__text">
                    Загрузіть фотографію
                </p>

                <button class="form__button" name="check">Далі</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script/selectfile.js"></script>
</body>
</html>