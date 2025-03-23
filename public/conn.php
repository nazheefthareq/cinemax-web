<?php
    $dbserver = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "cinemax";


$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

if ($conn->connect_error){
    die("Koneksi gagal : ".mysqli_connect_error());
}
?>