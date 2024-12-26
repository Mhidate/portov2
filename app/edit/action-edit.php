<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../public/css/edit-form.css" rel="stylesheet">
</head>
<body>
<?php
include '../../config/db.php';

//jika tombol edit di tekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $old_title = $_POST['old_title'];
    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
   
    $query = "UPDATE post SET title='$title', desk='$deskripsi', link='$link' WHERE title='$old_title'";
    $result = mysqli_query($db, $query);

    if($result) {
        header("Location:../../routes/edit.php?status=sukses");
        exit;
    } else {
        header("Location:../../routes/edit.php?status=gagal");
        exit;
    }
} else {

    if(isset($_GET['title'])) {
        $title = $_GET['title'];
        
        $query = "SELECT * FROM post WHERE title='$title'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result); 
?>
        <div class="mainc">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1 class="form-title">Edit data</h1>
                <input type="hidden" name="old_title" value="<?php echo $row['title']; ?>">
                 <p>Nama Aplikasi : </p>
                <div class="form-field">
                    <input name="title" class="ptext" value="<?php echo $row['title']; ?>" required pattern="[a-zA-Z0-9]+">
                </div>
                <p>Deskripsi</p>
                <div class="form-field">
                    <textarea name="deskripsi" class="ptextt" type="text" required pattern="[a-zA-Z0-9]+"><?php echo $row['desk']; ?></textarea>
                </div>
                <p>Link Source Code : </p>
                <div class="form-field">
                    <input name="link" class="ptext" type="text" value="<?php echo $row['link']; ?>">
                </div>
                <div class="form-field">
                    <button name="tambah" class="form-button" type="submit">Edit</button>
                </div>
            </form>
        </div>
<?php
    } else {
        echo "Title tidak ditemukan.";
    }
}
mysqli_close($db);
?>
</body>
</html>