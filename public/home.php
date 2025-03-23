<?php
session_start();
    include("conn.php");
    if(!isset($_SESSION["user_name"])){
        header("location:login.php");
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinemaX</title>

    
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section>
        <h1><?php echo"Halo! Selamat Datang, ".$_SESSION["user_name"].""?></h1>
        <h1> Now Showing </h1>
        <div class="movie-list">
            <?php
            $result = $conn->query("SELECT * FROM movie");
            while($row = $result->fetch_assoc()){
                echo "<div class='movie'>";
                echo "<h2>".$row['movie_title']."<h3>";
                echo "<img src='".$row['movie_poster']."'width= 200 height= 300>";
                echo "<p>".$row['movie_desc']."</p>";
                echo "<p> IMDb Rating: ".$row['movie_rating']."</p>";
                echo "<a href='booking.php?movie_id=".$row['movie_id']."'><button>Pesan Tiket</button></a>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</body>
</html>