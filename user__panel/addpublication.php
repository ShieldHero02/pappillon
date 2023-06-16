<?php
    error_reporting(0);

    require_once "../controllers/db.php";
    require_once "log.php";

    if (isset($_POST['send']))
    {
        var_dump($_FILES);
        
        if (!empty($_FILES['file']))
        {
            $file = $_FILES['file'];
            $name = $file['name'];
            $path = "../images/" . $name;

            echo $path;

            if(!move_uploaded_file($_FILES['tmp_name'], $path))
            {
                echo "file not upload!";
            }
            else 
            {
                echo "file upload";
            }
        }
    }

?>