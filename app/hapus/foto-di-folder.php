<?php
if(isset($_POST['submit'])) {
    $nama_file = $_POST['nama_file'];
    $lokasi_file = '../../uploads/' . $nama_file;

    if(file_exists($lokasi_file)) {
        if(unlink($lokasi_file)) {
            header("Location: ../../routes/upload.php?status=sukses");
        exit;
        } else {
            header("Location: ../../routes/upload.php?status=gagal");
        exit;
        }
    } else {
        echo 'File ' . $nama_file . ' tidak ditemukan.';
    }
}
?>