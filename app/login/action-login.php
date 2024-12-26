<?php

include '../../config/db.php';

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($db, "SELECT * FROM admin WHERE user = '$username'");
if (mysqli_num_rows($query) > 0) {

    $data = mysqli_fetch_array($query);
    $hashedPassword = $data['password'];
    
    if (password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;
        header('Location:../../routes/admin-page.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Username atau password salah.";
        header('Location: ../../routes/login-page.php');
        exit();
    }
} else {
    $_SESSION['error_message'] = "Username atau password salah.";
    header('Location: ../../routes/login-page.php');
    exit();
}
mysqli_close($db);
?>
