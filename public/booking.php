<?php
session_start();
    include("conn.php");
    if (!isset($_SESSION["user_name"])){
        header("location:login.php");
        exit();
    }

    if (!isset($_GET['movie_id'])){
        header("location:home.php");
        exit();
    }

    $movie_id = $_GET['movie_id'];
    $movie_query = $conn->query("SELECT * FROM movie WHERE movie_id = $movie_id");
    $movie = $movie_query->fetch_assoc();
    $runtime_query = $conn->query("SELECT * FROM runtime WHERE movie_id = $movie_id");
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
    <section class="movie-info">
        <?php 
            echo "<div class='movie'>";
            echo "<h3>".$movie['movie_title']."<h3>";
            echo "<img src='".$movie['movie_poster']."'width='200'>";
            echo "<p>".$movie['movie_desc']."</p>";
            echo "<p> IMDb Rating: ".$movie['movie_rating']."</p>";
            echo "</div>";
        ?>
    </section>
    <section class="waktu-tayang">
        <h2> Pilih Jam Tayang</h2>
        <?php
            while($runtime = $runtime_query->fetch_assoc()){
            echo "<div>";
            echo "<h3>".$runtime['runtime_cinema']."</h3>";
            echo "<h3>".$runtime['runtime_date']."</h3>";
            echo "<a href='seat.php?movie_id=".$movie_id."&runtime=".$runtime['runtime_id']."'><button>".$runtime['runtime_time']."</button></a>";
            echo "</div>";
            }
        ?>
    </section>
</body>
</html>