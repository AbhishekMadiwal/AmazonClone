<?php
session_start();

// If the user is already logged in, redirect to index.php
if (isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// Prevent the login page from being cached
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<div class="container">
    <?php
        if(isset($_POST["login"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Establish connection to the database
            $conn = mysqli_connect("localhost","root","","myweb");

            if(!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }

            // SQL query to check if the user exists
            $sql = "SELECT * FROM mylogin WHERE username = '$username' AND password = '$password'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                // If login is successful, set session variable and redirect to index.php
                $_SESSION['username'] = $username;
                header("Location: index.html");
                exit();
            } else {
                // If login fails, show an error message
                echo "<div class='alert alert-danger'>Invalid username or password.</div>";
            }

            // Close the connection
            mysqli_close($conn);
        }
    ?>

    <form action="login.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" name="login" value="Login">
        </div>
    </form>

    <div class="text-center mt-3">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>
</body>
</html>
