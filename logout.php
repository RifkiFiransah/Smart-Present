<?php
session_start();

$_SESSION['login'] = [];
$_SESSION['nama'] = [];
session_unset();
session_destroy();

header('Location: login.php');
