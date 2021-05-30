<?php require "db.php";
$data = $_POST;
if (isset($data['send_message'])) {
    $errors = array();
    if (trim($data['name']) == '') {
        $errors[] = 'Write ur name!';
    }
    if (trim($data['email']) == '') {
        $errors[] = 'Write ur email! ';
    }
    if ($data['subject'] == '') {
        $errors[] = 'Write ur subject!';
    }
    if ($data['message'] == '') {
        $errors[] = 'Write ur message!';
    }

    if (empty($errors)) {
        $user = R::dispense('contact');
        $user->Name = $data['name'];
        $user->Email = $data['email'];
        $user->Subject = ($data['subject']);
        $user->Message = ($data['message']);

        R::store($user);
        echo '<div style = "color: green";> Your message was send successfully </div> <hr>';
        echo '<meta http-equiv="Refresh" content="1; url=index.php">';
    } else {
        echo '<div style = "color: red";>' . array_shift($errors) . '</div> <hr>';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="/style/style_contact.css">
</head>

<body>
    <!--HEADER-->
    <header>
        <h1>Контакти</h1>
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
    <form action="/contact.php" method="POST">
        <div style="text-align: center; color: black; margin-top: 15%; border: 2px double black; color:black; background-color:white; margin-bottom: 20%; margin-right: 35%;margin-left: 37%; padding: 12px; border-radius:30px;">
            <p> <strong> Name </strong></p>
            <input type="text" name="name" value="<?php echo $data['name'] ?>"><br>
            <p> <strong> E-mail </strong></p>
            <input type="email" name="email" value="<?php echo $data['email'] ?>"> <br>
            <p> <strong> Subject </strong></p>
            <input type="text" name="subject" value="<?php echo $data['subject'] ?>"><br>
            <p> <strong> Message </strong></p>
            <input type="text" name="message" value="<?php echo $data['message'] ?>"><br>
            <br><br>
            <button type="submit" name="send_message"> Send message </button><br>
        </div>
    </form>
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