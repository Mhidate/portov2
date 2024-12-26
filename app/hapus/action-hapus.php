<?php
include '../../config/db.php';

if(isset($_GET['title'])) {
    $title = $_GET['title'];
    
    $query = "DELETE FROM post WHERE title='$title'";
    $result = mysqli_query($db, $query);
    if($result) {
        header("Location:../../routes/edit.php?status=sukses");
        exit;
    } else {
        header("Location:../../routes/edit.php?status=gagal");
        exit;
    }
} else {
    echo "Title tidak ditemukan.";
}
mysqli_close($db);
?>