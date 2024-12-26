<?php
include '../../config/db.php';

if(isset($_POST['hapus'])) {

    $id = $_POST['id'];

    $query = "DELETE FROM foto WHERE id = '$id'";
    $result = mysqli_query($db, $query);

    if($result) {
        header("Location: ../../routes/upload.php?status=sukses");
        exit;
    } else {
        header("Location: ../../routes/upload.php?status=gagal");
        exit;
    }
}
mysqli_close($db);
?>