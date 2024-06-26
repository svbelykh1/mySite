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
        <div id="exit1">
            <!-- <p><a href="logout.php">Выйти</a></p> -->
        </div>
    </header>
    <main>
        <div id = "log_container">
            <div id = "log">
                <div id = "log-h2">
                    <h2>Вы не авторизированны!</h2>
                </div>
                <div id = "form-div">
                    <button onclick="document.location='login.php'"> Войти</button>
                    <button onclick="document.location='register.php'">Зарегистрироваться</button>
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

    <script src="js/jsMain.js"></script>
</body>
</html>