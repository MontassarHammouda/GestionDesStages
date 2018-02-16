<?php

session_start();
if (!isset($_SESSION['Login'])) {
    header('location:index.php');
}
