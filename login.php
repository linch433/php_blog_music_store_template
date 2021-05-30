<?php require "db.php";
$data = $_POST;

if (isset($data['do_login'])) {
    $error = array();
    $user = R::findOne('signup', '_email = ?', array($data['email']));
    $contact = R::findOne('signup', 'id = ?', array($user->id));
    if ($user) {
        if (password_verify($data['password'], $contact->_password)) {
            $_SESSION['logged_user'] = $contact;
            echo '<meta http-equiv="Refresh" content="1; url=index.php">';
        } else {
            $error[] = "error pass";
        }
    } else {
        $error[] = "error log";
    }
    if (!empty($error)) {
        echo array_shift($error);
    }
}
?>

<style></style>


<body>
    <div style="text-align: center; color: black; margin-top: 15%; border: 2px double black; color:black; background-color:white; margin-bottom: 20%; margin-right: 35%;margin-left: 37%; padding: 12px; border-radius:30px;">
        <form action="/login.php" method="POST">
            <p>
                <p><strong>Email</strong>:</p>
                <input type='email' name='email' value="<?php echo $data['email'] ?>">
            </p>
            <p><strong>Пароль</strong>:</p>
            <input type='password' name='password' value="<?php echo $data['password'] ?>">
            </p>
            <p>
                <button type="submit" name="do_login">Вхід</button>
            </p>
            <p>
                <a href="signup.php">Зареєструвати новий аккаунт</a>
            </p>

        </form>
    </div>
</body>

<div>
    <div style=" text-align: center; color: black;">
        <a href="index.php"> <strong> Main </strong> </a>
    </div>
</div>