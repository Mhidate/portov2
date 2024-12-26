<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login-page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../public/image/icons/title-icon.png" type="image/png">
    <title>Tambah</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/admin-page.css">
    <link rel="stylesheet" href="../public/css/tambah.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <div class="list-item">
                    <marquee>
                        <span class="description-header">Selamat Datang Admin</span>
                    </marquee>
                </div>
                <br><br><br><br>
                <div class="mainl">
                    <div class="list-item">
                        <a href="admin-page.php">
                            <img src="../public/image/icons/dashboard-icon.svg" alt="" class="icon">
                            <span class="description">Dasboard</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a class="active" href="tambah.php">
                            <img src="../public/image/icons/tambah-icon.svg" alt="" class="icon">
                            <span class="description">Tambah</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="edit.php">
                            <img src="../public/image/icons/edit-icon.svg" alt="" class="icon">
                            <span class="description">Edit</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="upload.php">
                            <img src="../public/image/icons/foto-icon.svg" alt="" class="icon">
                            <span class="description">Upload foto</span>
                        </a>
                    </div>
                    <br><br><br>
                    <div class="list-item">
                        <a href="../app/logout/action-logout.php">
                            <img src="../public/image/icons/logout-icon.svg" alt="" class="icon">
                            <span class="description">Log Out</span>
                        </a>
                    </div>

                </div>
            </div>


        </div>
        <div class="mainc">
            <form action="../app/tambah/action-tambah.php" method="post">
                <h1 class="form-title">Tambah Portofolio</h1>
                <div class="form-field">
                    <input name="title"  placeholder="Nama aplikasi" required >
                </div>
                <div class="form-field">
                    <textarea name="deskripsi" class="ptextt" type="text" placeholder="Deskripsi aplikasi" required ></textarea>
                </div>
                <div class="form-field">
                    <input name="link"  type="text" placeholder="Link" required >
                </div>
                <div class="form-field">
                    <button name="tambah" class="form-button" type="submit">Tambahkan</button>
                </div>
            </form>
        </div>

    </div>

</body>
<?php if (isset($_GET['status'])): ?>
    <p>
        <?php if ($_GET['status'] == 'sukses') {
            echo "<script>alert('Data berhasil di simpan');</script>";
        } else {
            echo "<script>alert('Proses GAGAL ID Sudah di gunakan!');</script>";
        } ?>
    <script src="../public/script/parameter-url.js"></script>
    </p>
<?php endif; ?>
</html>