<?php require "db.php";
$data = $_POST;
if (isset($data['do_signup'])) {
    $errors = array();
    if (trim($data['login']) == '') {
        $errors[] = 'Write ur login name!';
    }
    if (trim($data['email']) == '') {
        $errors[] = 'Write ur email! ';
    }
    if ($data['password'] == '') {
        $errors[] = 'Write ur password!';
    }
    if (R::count('signup', "email = ?", array($data['email'])) > 0) {
        $errors = 'This account have used email address!';
    }

    if (empty($errors)) {
        $user = R::dispense('signup');
        $user->Login = $data['login'];
        $user->Email = $data['email'];
        $user->Password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style = "color: green";> You are registered successfully </div> <hr>';
        echo '<meta http-equiv="Refresh" content="1; url=login.php">';
    } else {
        echo '<div style = "color: red";>' . array_shift($errors) . '</div> <hr>';
    }
}
?>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <form action="/signup.php" method="POST">
        <div style="text-align: center; color: black; margin-top: 15%; border: 2px double black; color:black; background-color:white; margin-bottom: 20%; margin-right: 35%;margin-left: 37%; padding: 12px; border-radius:30px;">
            <p> <strong> Логін </strong></p>
            <input type="text" name="login" value="<?php echo $data['login'] ?>"><br>
            <p> <strong> E-mail </strong></p>
            <input type="email" name="email" value="<?php echo $data['email'] ?>"> <br>
            <p> <strong> Пароль </strong></p>
            <input type="password" name="password" value="<?php echo $data['password'] ?>"><br>
            <br><br>
            <button type="submit" name="do_signup"> Зареєструватись </button><br>
        </div>
    </form>
</body>


<div>
    <div style=" text-align: center; color: black;">
        <a href="index.php"> <strong> Main </strong> </a>
    </div>
</div>