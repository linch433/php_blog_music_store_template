<?php require "db.php";

$data = $_POST;
if (isset($data['confirm'])) {
    $orderF = R::dispense('orders');
    $orderF->Name = $data['name'];
    $orderF->Surname = $data['email'];
    $orderF->PhoneNumber = $data['phone_number'];
    $orderF->NameOrders = $data['type'];
    R::store($orderF);
    echo '<div style = "color: green";> Замовлення принято </div> <hr>';
    echo '<meta http-equiv="Refresh" content="1; url=market.php">';
}

?>

<!--<head>
    <link rel="stylesheet" href="stylemain.css" type="text/css">
</head>-->

<body>
    <?php
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'block_base');
    if ($connection == false) {
        echo 'БД недоступна!';
        echo mysqli_connect_error();
        exit();
    }
    $result = mysqli_query($connection, " SELECT * FROM `market` ");
    if (mysqli_num_rows($result) == 0) {
        echo 'Нема пропозицій!';
    } else { ?>
        <div style="text-align: center; color: black; margin-top: 15%; border: 4px double black; color:black; background-color:white; margin-bottom: 20%; margin-right: 37%;margin-left: 37%; padding: 10px; border-radius:10px;">
            <form style="text-align: center" action="/orders.php" method="POST">
                <h3 style="color: green"> Замовити </h3>
                <p><select size="3" name="type" value="<?php echo $data['type'] ?>">
                        <option disabled>Ваше замовлення</option>
                        <?php
                        while (($storage = mysqli_fetch_assoc($result))) {
                        ?>
                            <option style='border: 1px solid black;'> <?php $outselector = mysqli_query($connection, "SELECT * FROM `market` WHERE `name` = " . $storage['id']);
                                                                        echo '<div style ="text-align: center"><h3>' . $storage['name'] . '</h3></div>'; ?></option>
                        <?php
                        }
                        ?>
                    </select></p>
                <p>
                    <p><strong>Name</strong>:</p>
                    <input type='text' name='name' value="<?php echo $data['name'] ?>">
                </p>
                <p>
                    <p><strong>Email</strong>:</p>
                    <input type='text' name='email' value="<?php echo $data['email'] ?>">
                </p>
                <p>
                    <p><strong>Phone number</strong>:</p>
                    <input type='text' name='phone_number' value="<?php echo $data['phone_number'] ?>">
                    <div style="padding-left:5px">
                        <br><br>
                        <button type="submit" name="confirm">Submit</button>
                    </div>
            </form>
        </div>
    <?php
    }
    ?>
    <?php
    mysqli_close($connection);
    ?>
</body>
<div>
    <div style=" text-align: center; color: black;">
        <a href="market.php"> <strong> Market </strong> </a>
    </div>
</div>