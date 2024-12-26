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
    <title>Upload</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/admin-page.css">
    <link rel="stylesheet" href="../public/css/upload.css">

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
                        <a  href="tambah.php">
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
                        <a class="active" href="upload.php">
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
            <h1>─── Foto yang tersimpan ───<h1>
            <?php
                
                $folder_upload = '../uploads/';

                // Membaca isi folder
                $files = scandir($folder_upload);

                // Menghapus . dan .. dari hasil pembacaan folder
                $files = array_diff($files, array('.', '..'));

                // Menampilkan file-file dalam bentuk list
                echo '<ul>';
                foreach ($files as $file) {
                    // Mendapatkan path lengkap file
                    $file_path = $folder_upload . $file;

                    // Mendapatkan jenis file
                    $file_type = mime_content_type($file_path);

                    // Jika jenis file adalah gambar
                    if (strpos($file_type, 'image') !== false) {
                        echo '<li>';
                        echo '<img src="' . $file_path . '" alt="' . $file . '" width="100">';
                        echo '<p style="color: #fff; font-size: 15px;">' . $file . '</p>';
                        echo '</li>';
                    }
                }
                echo '</ul>';
             ?>
            <h1>─── Upload Foto ───</h1>
            <form action="../app/upload/foto-ke-folder.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Pilih Foto:</label>
                    <input type="file" name="file" id="file" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Upload</button>
                </div>
            </form>
            <h1>─── Hapus Foto ───</h1>
            <form action="../app/hapus/foto-di-folder.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_file">Nama file : </label>
                    <input class="input1" type="text" name="nama_file" id="nama_file" >
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Hapus</button>
                </div>
            </form>
        
        </div>

    </div>

</body>
<?php if (isset($_GET['status'])): ?>
<p>
    <?php if ($_GET['status'] == 'sukses') {
        echo "<script>alert('Proses berhasil');</script>";
    } else {
        echo "<script>alert('Proses GAGAL!');</script>";
    } ?>
   <script src="../public/script/parameter-url.js"></script>
</p>
<?php endif; ?>
</html>