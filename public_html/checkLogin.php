<?php
    include_once(__DIR__.'/../backMySite/classes/DB/DB.php');
    include_once(__DIR__.'/../backMySite/classes/util.php');
    $check_host = 'http://'.$_SERVER['HTTP_HOST'].'/register.php' ;
    $message = ''; 
    $u = new Util;
    if($_SERVER['HTTP_REFERER']===$check_host){
        if(!empty($_GET['name'])){
            $u->mvd2f('хост норм обрабатываем','/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
            $db = new DB;

            $sql = "Select * from users where username = :username;";
            $sql_result = $db->query($sql, ['username'=>$_GET['name']]);
            if(isset($sql_result) and empty($sql_result)){
                $u->mvd2f('Логин свободен','/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
                $message = 'Логин свободен';
                
            }else{
                $u->mvd2f('Такой логин уже существует','/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
                $message = 'Такой логин уже существует';
            }
            $u->mvd2f(json_encode($message,true),'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');

            echo json_encode($message,true);
        }else{
            $message = 'Введите логин';
            echo json_encode($message,true);
        }
    }else{
        header("location:http://localhost:8080/register.php");
    }


?>