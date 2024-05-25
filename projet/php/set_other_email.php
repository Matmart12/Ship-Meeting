<?php
session_start();

if (isset($_POST['email'])) {
    $_SESSION['other_email'] = $_POST['email'];
    echo "success";
} else {
    echo "error";
}