<?php
include '../../config/db.php';

// Query untuk mengambil data
$sql = "SELECT title, desk, link FROM post";
$result = mysqli_query($db, $sql);

// Array untuk menyimpan data portfolio
$portfolioItems = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $portfolioItems[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($portfolioItems);

mysqli_close($db); 
?>
