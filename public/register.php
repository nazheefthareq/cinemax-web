<?php
    include("conn.php");
    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "INSERT INTO user (user_name,user_pass) VALUES ('$username','$password')";
    
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
    <title>Sign-In</title>
</head>
<body>
    <section class="auth">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register"> Register </button>
        </form>
        <p>Sudah memliki akun? <a href="login.php">Login</a></p>
    </section>
</body>
</html>