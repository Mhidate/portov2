<?php

include '../../config/db.php';


$u = 'mind7'; 
$p = 'mind7'; 

$hashedPasswordAdmin = password_hash($p, PASSWORD_BCRYPT);


$sql = "INSERT INTO admin (user, password) VALUES ('$u', '$hashedPasswordAdmin')";

if ($db->query($sql) === TRUE) {
    echo "Admin berhasil ditambahkan ke database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$db->close();
?>