<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php
    if(isset($_POST["submit"])){
       $username = $_POST['username'];
       $password = $_POST['password'];
       $compass = $_POST['confi_pass'];

       $errors = array();

       if(empty($username) OR empty($password) OR empty($compass)){
        array_push($errors,"All fields are required");
       }
       if(strlen($password)<8){
        array_push($errors,"Password must be at least 8 characters long");
       }
       if($password!==$compass){
        array_push($errors,"password does not match");
       }
       if(count($errors)>0){
        foreach($errors as $error)
        echo "<div class ='alert alert-danger'>$error</div>";
       }

       else{
       
        $conn = mysqli_connect("localhost","root","","myweb");

        if(!$conn){
            die("Something went wrong;");
        }
        else{
        $sql = "insert into mylogin values('$username','$password')";
        
        mysqli_query($conn,$sql);
        }
       }
      
    }
   ?>
        <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter username:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confi_pass" placeholder="Confirm password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" name="submit" value="Register">
            </div>
    </div>
    <div class="text-center mt-3">
        <p>have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>