<?php
    var_dump($_POST);
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
            <div id = "log">
                <div id = "log-h2">
                    <h2>Вход</h2>
                </div>
                <div id = "form-div">
                    <form  id="form-form" action="" method="post" >
                        <input type="name" id = "name1" name="name" minlength="5">
                        <input type="password" id = "password" name ="password" minlength="5">
                        <a href="register.php"><p>Регистрация</p></a>
                        <button type="submit">Далее</button>                
                    </form>
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

<script src="js/jsLogin.js"></script>
</body>
</html>

<?php
    include_once(__DIR__.'/../backMySite/classes/util.php');

    $u = new Util;
    $u->mvd2f($_POST,'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
    if(  isset($_POST['name']) && isset($_POST['password'])  ){
        //Подключаем конфиг БД
        include_once(__DIR__.'/../backMySite/classes/DB/DB.php');
        $db = new DB;
        //входящие данные с формы логин
        $name = $_POST['name'];
        $pwd = md5($_POST['password'].'mySol');

        //Делаем запрос к БД для проверки user
        $sql = "Select * from users where username = :username and password = :password;";
        $sql_result = $db->query($sql, ['username'=>$name, 'password'=>$pwd]);
        $u->mvd2f($sql_result,'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
        $u->mvd2f($pwd,'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');

        //Данные верны пользователь и пароль совпадают
        if(count($sql_result) > 0){
            session_start();
            $u->mvd2f('данные верны','/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log'); 
            $_SESSION["session_username"] = $name;
            $u->mvd2f($_SESSION["session_username"],'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log'); 
        
            header("location:introPage.php");
            
        }else{
            $u->mvd2f('Данные не Верны пользователь и пароль не совпадает','/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
            echo "<script>viewAccessDenied();</script>"; 
        }
        


        
        //$pwd = md5($_POST['password'].'mySolb');
        //$sql_test = "insert into users(fullname,username,password,email,role) VALUES('Test Testovich','$name','$pwd','dr.hola@yandex.ru',1);";
        //$sql = 'select username,password where users where username =';
    }
?>