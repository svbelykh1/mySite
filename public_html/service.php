<?php session_start();
if(!isset($_SESSION["session_username"])):
header("location: login.php");
else:
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>service</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imj/favicon.ico" sizes="512x512" type="image/x-icon"> 
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <a href="main.php"><img class="graficlogo" src="imj/2.png" alt=""></a>
        </div>
        <div id="exit1">
            <p><a href="logout.php">Выйти</a></p>
        </div>
        <nav>
            <div class="topnav" id="myTopNav">
                <a href="main.php">HOME</a>
                <a href="project.php">PROJECT</a>
                <a href="blog.php">BLOG</a>
                <a href="contact.php">CONTACT</a>
                <a href="service.php">SERVICE</a>
                <a href="location.php">LOCATION</a>
                <a  id ="menu" href="#" class="icon">&#9776;</a>
            </div>
        </nav>
    </header>
    <main>
        <h1>Service</h1>
    </main>
    <footer>
        <nav>
            <a href="index.html">HOME</a>
            <a href="project.html">PROJECT</a>
            <a href="index.html">BLOG</a>
            <a href="index.html">CONTACT</a>
            <a href="index.html">SERVICE</a>
            <a href="index.html">LOCATION</a>
        </nav>
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

<?php endif;?>