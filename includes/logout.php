<?php

if(!isset($_SESSION))
{
session_start();
}
print_r($_SESSION);
session_unset();
session_destroy();
header("Location:../login.php ");

// <p>print_r($_SESSION);<p>

?>