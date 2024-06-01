<?php session_start();
if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/styleRegLog.css">
    <link rel="icon" href="imj/favicon.ico" sizes="512x512" type="image/x-icon"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <a href="main.php"><img class="graficlogo" src="imj/2.png" alt=""></a>
        </div>
    </header>
    <main>
        <div id = "log_container">
            <div id = "intro">
                <div id = "welcome">
                    <h2> Добро пожаловать!</h2>
                </div>
                <div id = "inOut">
                    <h4 id="h4-left"> <a href="main.php">Пререйти на главную</a></h4>
                     <h4 id="h4-right"> <a href="logout.php">Выйти</a></h4>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="social">
            <a href="#"> <img src="imj/imgFooter/em.png" alt=""></a>
            <a href="#"> <img src="imj/imgFooter/inst.png" alt=""></a>
            <a href="#"> <img src="imj/imgFooter/pint.png" alt=""></a>
        </div>
        <p>Sergey Belykh Company. 2022</p>
    </footer>

</body>
</html>

<?php endif;?>