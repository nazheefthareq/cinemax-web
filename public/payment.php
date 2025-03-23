<?php
session_start();
include("conn.php");

if (!isset($_SESSION["user_name"])) {
    header("location:login.php");
    exit();
}

if (!isset($_GET['movie_id'], $_GET['runtime_id'], $_GET['seat_id'])) {
    die("Parameter tidak lengkap!");
}

$user_id = $_SESSION['user_id']; 

$movie_id = (int) $_GET['movie_id'];
$waktutayang_id = (int) $_GET['runtime_id'];
$seat_id = (int) $_GET['seat_id'];

$movie_query = $conn->prepare("SELECT * FROM movie WHERE movie_id = ?");
$movie_query->bind_param("i", $movie_id);
$movie_query->execute();
$movie = $movie_query->get_result()->fetch_assoc();

$waktutayang_query = $conn->prepare("SELECT * FROM runtime WHERE runtime_id = ?");
$waktutayang_query->bind_param("i", $waktutayang_id);
$waktutayang_query->execute();
$waktutayang = $waktutayang_query->get_result()->fetch_assoc();

$seat_query = $conn->prepare("SELECT * FROM seats WHERE seat_id = ?");
$seat_query->bind_param("i", $seat_id);
$seat_query->execute();
$seat = $seat_query->get_result()->fetch_assoc();

if (!$movie || !$waktutayang || !$seat) {
    die("Data tidak ditemukan.");
}
if (isset($_POST["konfirmasi"])) {
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');

    $sql = $conn->prepare("
        INSERT INTO booking (booking_date, booking_time) 
        VALUES (?, ?)
    ");
    $sql->bind_param("ss", $tanggal, $waktu);

    if ($sql->execute()) {
        header("location:home.php"); 
        exit();
    } else {
        die("Error: " . $sql->error);
    }
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
        <h2>Booking Detail</h2>
        <p>Movie : <?php echo htmlspecialchars($movie['movie_title']); ?></p>
        <p>Studio : <?php echo htmlspecialchars($waktutayang['runtime_cinema']); ?></p>
        <p>Waktu : <?php echo htmlspecialchars($waktutayang['runtime_time']); ?></p>
        <p>Nomor Kursi : <?php echo htmlspecialchars($seat['seat_no']); ?></p>
    </section>
    <section>
        <form method="POST">
            <button type="submit" name="konfirmasi">Konfirmasi Pemesanan</button>
        </form>
    </section>
</body>
</html>
