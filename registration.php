<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");

  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password === $confirmpassword)
    {
      $query = "INSERT INTO tb_user ( name, username, email, password, cpassword) VALUES ('$name','$username','$email','$pass', '$cpass')";
      mysqli_query($conn, $query);

      echo "<script> alert('Registration Successful'); </script>";
    }
    else
    {
      echo "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
</head>
<body>

<section>
    <div class="center">
        <form method="post" autocomplete="off">
            <h1>Registration</h1>
            <div class="text_field">
                <input type="text" name="name" id = "name" required>
                <span></span>
                <label for="name">Name</label>
            </div>
            <div class="text_field">
                <input type="text" name="username" id = "username" required >
                <span></span>
                <label for="username">Username</label>
            </div>
            <div class="text_field">
                <input type="email" name="email" id = "email" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            <div class="text_field">
                <input type="password" name="password" id = "password" required >
                <span></span>
                <label for="password">Password</label>
            </div>
            <div class="text_field">
                <input type="password" name="confirmpassword" id = "confirmpassword" required>
                <span></span>
                <label for="confirmpassword">Confirm Password</label>
            </div>
            <div class="pass">Forget Password?</div>
            <input type="submit" name="submit" value="Register">
            <div class="signup_link">
                Not a member? <a href="login.php">Signin</a>
            </div>
        </form>
    </div>
</section>

</body>
</html>