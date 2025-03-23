<?php
session_start();
include("conn.php");

if (!isset($_SESSION["user_name"])) {
    header("location:login.php");
    exit();
}

if (!isset($_GET["movie_id"]) || !isset($_GET["runtime_id"])) {
    header("location:home.php");
    exit();
}

$movie_id = $_GET["movie_id"];
$runtime_id = $_GET['runtime_id'];

$runtime_query = $conn->query("SELECT * FROM runtime WHERE runtime_id = $runtime_id");
$runtime = $runtime_query->fetch_assoc();

$seats_query = $conn->query("SELECT * FROM seats WHERE runtime_id = $runtime_id");

if (!$seats_query) {
    die("Error: Query seat gagal. " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Ticket Bioskop Online</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section>
        <h2> Pilih Kursi </h2>
        <?php
            while ($seat = $seats_query->fetch_assoc()) {
                echo "<a href='payment.php?movie_id=".$movie_id."&runtime_id=".$runtime_id."&seat_id=".$seat['seat_id']."'>
                        <button>".$seat['seat_no']."</button>
                      </a>";
            }
        ?>
    </section>
</body>
</html>
