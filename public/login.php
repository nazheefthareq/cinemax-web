<?php
session_start();
    include("conn.php");

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = $conn->query("SELECT * FROM user WHERE user_name = '$username'");
        if(!$result){
            die("error sql".$conn->error);
        }

        $user = $result->fetch_assoc();
        if($user && $user["user_pass"]===$password){
            $_SESSION["user_name"] = $user["user_name"];
            header("location: home.php");
        }else{
            echo "Username atau password salah";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Ticket Bioskop Online</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <section class="auth">
        <h2 class="bold">Login</h2>
        <form method="POST" class="form-vertical">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary btn-sm"> Login </button>
        </form>
        <p>Belum memiliki akun? <a href="register.php">Buat Akun</a></p>
    </section>
</body>
</html>