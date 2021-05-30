<?php
require "db.php";
unset($_SESSION['logged_user']);
echo '<meta http-equiv="Refresh" content="0; url=login.php">';
