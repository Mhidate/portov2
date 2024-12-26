<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login-page.php');
}

include '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../public/image/icons/title-icon.png" type="image/png">
    <title>Edit</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/admin-page.css">
    <link rel="stylesheet" href="../public/css/edit.css">
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
                        <a href="tambah.php">
                            <img src="../public/image/icons/tambah-icon.svg" alt="" class="icon">
                            <span class="description">Tambah</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a class="active" href="edit.php">
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
            <table class="table responsive-3">
                <thead>
                    <tr>
                        <th class="column-primary" data-header="Nama aplikasi"><span>Nama aplikasi</span></th>
                        <th data-header="Link source code"><span>Link source code</span></th>
                        <th>Edit  </th>
                        <th>Hapus  </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $query = "SELECT * FROM post";
                            $result = mysqli_query($db, $query);
                            if (!$result) {
                                die('Query Error: ' . mysqli_error($db));
                            }
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td data-header="Nama aplikasi">' . $row['title'] . '</td>';
                                echo '<td data-header="Link source code"><a href="' . $row['link'] . '">' . $row['link'] . '</a></td>';
                                echo '<td>';
                                echo "<a href='../app/edit/action-edit.php?title=" . $row['title'] . "'><button class=b1><img src=../public/image/icons/edit.svg width=20 height=20 /></button></a>";
                                echo '</td>';
                                echo '<td>';
                                echo "<a href='../app/hapus/action-hapus.php?title=" . $row['title'] . "'><button class=b2><img src=../public/image/icons/hapus.svg width=20 height=20 /></button></a>";
                                echo '</td>';
                                echo '</tr>';
                            }
                            mysqli_close($db);
                    ?>
                </tbody>
            </table>
    
         </div>

    </div>

</body>
<?php if (isset($_GET['status'])): ?>
<p>
    <?php if ($_GET['status'] == 'sukses') {
        echo "<script>alert('Berhasil');</script>";
    } else {
        echo "<script>alert('Gagal !!!!!');</script>";
    } ?>
     <script src="../public/script/parameter-url.js"></script>
</p>
<?php endif; ?>
</html>