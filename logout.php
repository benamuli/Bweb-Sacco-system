<?php
if (isset($_SESSION['Username'])) {
    session_destroy();
    header("Location: login.php");
    die;
} else {
    session_destroy();
    header("Location: login.php");
    die;
}
