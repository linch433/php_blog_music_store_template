<?php require "db.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="/style/style_market.css">
</head>

<body>
    <?php
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'block_base');
    if ($connection == false) {
        echo 'db invalid';
        echo mysqli_connect_error();
        die();
    }
    $result = mysqli_query($connection, " SELECT * FROM `news` ");
    if (mysqli_num_rows($result) == 0) {
        echo 'no strings';
    } else { ?>
        <!--HEADER-->
        <header>
            <h1>Новини сайту</h1>
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
        <div>
            <?php
            while (($storage = mysqli_fetch_assoc($result))) {
                $outselector = mysqli_query($connection, "SELECT * FROM `news` WHERE `title` = " . $storage['id']);
                echo  '<div style = "text-align:left"><h2>' . $storage['title'] . '</h2></div>';

                $outselector = mysqli_query($connection, "SELECT * FROM `news` WHERE `time` = " . $storage['id']);
                echo '<div style = "text-align:right"><h4> Time: ' . $storage['time'] . ' </h4></div>';
                echo '<br>';

                $outselector = mysqli_query($connection, "SELECT * FROM `news` WHERE `description` = " . $storage['id']);
                echo '<div style = "text-align:justify; text-indent: 20px">' . $storage['description'] . '</div>';

                echo '<div style ="border-top: 5px inset #1abc6c; margin-top: 11%;"></div>';
            }
            ?>

        </div>
        <!--FOOTER-->
        <footer>
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                <a href="index.php">Musicblog.</a>
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
    <?php
    }
    ?>
    <?php
    mysqli_close($connection);
    ?>
</body>