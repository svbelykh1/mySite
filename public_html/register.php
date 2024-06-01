
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
        <div id = "reg_container">
            <div id = "reg">
                <div id = "reg-h2">
                    <h2>Регистрация</h2>
                </div>
                <div id = "form-div">
                    <form  id="form-form"  method="post" action="">
                        <div id= "name"> 
                            <img src="imj/icon+/name2.png" width="30" height="30" alt="">
                            <input type="name" placeholder="Введите Имя..." id = "inpName" name="name">
                        </div>
                        <div id="email">
                            <img src="imj/icon+/email.png" width="30" height="30" alt ="">
                            <input type="email" id = 'inpEmail' placeholder="Введите email..." name = "email">
                        </div>
                        <div id="password">
                            <img src="imj/icon+/pass2.png" width="30" height="30" alt ="">
                            <input type="password" id = "pwd" placeholder="Введите пароль..." name="pwd">
                        </div>
                        <div id="divCnfPwd">
                            <img src="imj/icon+/pass2.png" width="30" height="30" alt ="">
                            <input type="password" id = "cnfPwd" placeholder= "Подтвердите пароль" name="cnfPwd">
                        </div>
                        <div id = "sub">
                            <a href="login.php"><p>Уже зарегистрирован?</p></a>
                            <button type="submit" id="btn-sub">Отправить</button>
                        </div>                
                    </form>
                </div>
                <div id = "message"></div>
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

<script src="js/register.js"></script>
</body>
</html>
<?php
    
    include_once(__DIR__.'/../backMySite/classes/DB/DB.php');
    include_once(__DIR__.'/../backMySite/classes/util.php');
    $u = new Util;
    //$db = new DB;
    if(isset($_POST) && !empty($_POST)){
        $name = $_POST['name'];
        $pass = md5($_POST['pwd'].'mySol');
        $email = $_POST['email'];


        $db = new DB;
        $sql = "insert into users(fullname,username, password,email,role) VALUES('test','".$name."','".$pass."','".$email."',0)";
        $sql_result = $db->query($sql);
        $u->mvd2f($sql,'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
        if(isset($sql_result)){
            session_start();
            $_SESSION["session_username"] = $name;
            header("location:introPage.php");
        }

    }


    // echo "<pre>";
    // var_dump($db);
    // $sql = 'select * from tbl_test';
    // $sql_result = $db->query($sql);
    // $u->mvd2f($sql_result,'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');

?>