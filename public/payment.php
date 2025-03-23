<?php
session_start();
    include("conn.php");
        if (!isset($_SESSION["username"])){
            header("location:login.php");
            exit();
        }
    
    $movie_id = $_GET['movie_id'];
    $waktutayang_id = $_GET['waktu_id'];
    $seat_id = $_GET['seat_id'];

    $movie_query = $conn->query("SELECT * FROM movie WHERE id = $movie_id");
    $movie = $movie_query->fetch_assoc();

    $waktutayang_query = $conn->query("SELECT * FROM waktu_tayang WHERE id = $waktutayang_id");
    $waktutayang = $waktutayang_query->fetch_assoc();

    $seat_query = $conn->query("SELECT * FROM kursi WHERE id = $seat_id");
    $seat = $seat_query->fetch_assoc();

    if(isset($_POST["konfirmasi"])){
        $movie_name = $_POST["movie"];
        $waktu = $_POST["waktu"];
        $kursi = $_POST["kursi"];
        $tanggal = $_POST["tanggal"];

        $sql = "INSERT INTO payment (movie_id,waktu_tayang_id,kursi_id,tanggal) VALUES ('$movie_name','$waktu','$kursi','$tanggal')";

        if($conn->query($sql) === TRUE){
            header("location:login.php");
            }else{
            echo "Error silakan coba lagi";
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
        <h2> Booking Detail </h2>
        <p>Movie : <?php echo $movie['judul'];?></p>
        <p>Studio : <?php echo $waktutayang['studio'];?></p>
        <p>Waktu : <?php echo $waktutayang['time'];?></p>
        <p>Nomor Kursi : <?php echo $seat['nomor_kursi'];?></p>
    </section>
    <section>
        <form method=POST>
            <input type="hidden" name="movie" value="<?php echo $movie_id ?>">
            <input type="hidden" name="waktu" value="<?php echo $waktutayang_id ?>">
            <input type="hidden" name="kursi" value="<?php echo $seat_id ?>">
            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d H:i:s')?>">
            <button type="submit" name="konfirmasi"> Konfirmasi Pemesanan </button>
        </form>
    </section>
</body>
</html>