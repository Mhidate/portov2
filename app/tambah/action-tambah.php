<?php
include '../../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];

    $query = "INSERT INTO post (title, desk, link) VALUES ('$title', '$deskripsi', '$link')";
    $result = mysqli_query($db, $query);

    if($result) {
        header("Location:../../routes/tambah.php?status=sukses");
        exit;
    } else {
        header("Location:../../routes/tambah.php?status=gagal");
        exit;
    }}
    mysqli_close($db);
    ?>