<?php require "db.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="/style/style_index.css">
</head>

<body>
    <!--HEADER-->
    <header>
        <h1>Блог</h1>
        <p>Ця вебсторінка створена студентом ІІІ курсу, Копинцем Володимиром</p>
    </header>
    <!--NAVIGATION BAR-->
    <nav>
        <a href="index.php">Головна</a>
        <a href="news.php">Новини</a>
        <a href="market.php">Магазин</a>
        <a href="contact.php">Контакти</a>
        <?php
        if ($_SESSION['logged_user'] == 0) {
            echo '<a href="login.php" class="right">Вхід</a>';
        } else {
            echo '<a href="logout.php" class="right"> Вийти з аккаунта</a> ';
        }
        ?>
    </nav>
    <!--MAIN-->
    <div class="row">
        <div class="side">
            <center>
                <img src="img/pfp.jpg" alt="pfp" class="displayed" />
            </center>
        </div>
        <div class="main">
            <h2>Biography</h2>
            <p align="justify">Coming from Uzhhorod, Ukraine, linch is a junior in the SoundCloud trap scene. He first started uploading his beats back in February, 2016. Since then he's been perfecting his style and signature sound consisting of heavy distorted basses, piercing snares, and evil melodies. Linchishere truly produces a sound which is on point and sends you to another dimension - a dark, hostile dimension.</p>
            <p align="justify">Not only on SoundCloud Linchishere has been making himself a name, he has also produced for rappers such as SCARLXRD, RAMIREZ, SHAKEWELL or BVDLVD.</p>
            <p align="justify">contact: linch433@gmail.com.com | management/booking: mgmt@ac.info</p>
            <p>
                <h3 align="center">My promotions</h3>

            </p>
            <iframe width="500" height="250" src="https://www.youtube.com/embed/yGMiaivqJNA?list=PL_vOqcHHbX8ycgjIn-D7uGVbO0piufvrL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="500" height="250" src="https://www.youtube.com/embed/fLjYJaUsIDs?list=PL_vOqcHHbX8ycgjIn-D7uGVbO0piufvrL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <!--FOOTER-->
    <footer>
        <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
            <a href="index.php">Musicblog</a>.
        </p>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
                <li><a class="facebook" href="https://www.facebook.com/profile.php?id=100004776367000"><i class="fa fa-facebook"></i></a></li>
                <li><a class="youtube" href="https://www.youtube.com/channel/UCTHpehNaUgPLM3TaWObmGiw?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
                <li><a class="soundcloud" href="https://soundcloud.com/l4_prod"><i class="fa fa-soundcloud"></i></a></li>
            </ul>
            <p>Site was create by Kopynets V.</p>
        </div>
    </footer>
</body>

</html>