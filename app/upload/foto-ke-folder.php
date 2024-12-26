<?php
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Periksa apakah file gambar
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Periksa apakah file sudah ada
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Batasi ukuran file
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Izinkan hanya format gambar tertentu
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Periksa jika $uploadOk disetel menjadi 0 oleh suatu kesalahan
if ($uploadOk == 0) {
    header("Location:../../routes/upload.php?status=gagal");
    echo "Sorry, your file was not uploaded.";
// Jika semuanya berjalan lancar, coba unggah file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        header("Location:../../routes/upload.php?status=sukses");
    } else {
        header("Location:../../routes/upload.php?status=sukses");
        echo "Sorry, there was an error uploading your file.";
    }
}
?>