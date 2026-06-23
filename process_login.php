<?php
session_start();

$admin_user      = "admin";
$admin_pass_hash = '$2y$12$Se.AEHAewrcGgor.fvHe7ObQQ09iHbdQJZj9G33l4HA81PiGJIDdu';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $admin_user && password_verify($password, $admin_pass_hash)) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_user']      = $username;

    header("Location: admin.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
