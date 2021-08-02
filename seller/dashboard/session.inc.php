<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!(isset($_SESSION['is_login']) && isset($_SESSION['sellerEmail']))) {
  header('location:../index.php');
}
  ?>