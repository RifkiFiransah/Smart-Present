<?php

session_start();

if ($_SESSION['login'] == 'true') {
  header('Location: Dashboard/dashboard.php');
} else {
  header('Location: home.php');
}
