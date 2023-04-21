<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");

  $email_count = mysqli_num_rows($result);

  if($email_count)
  {
    $email_pass = mysqli_fetch_assoc($result);

    $db_pass = $email_pass['password'];

    $_SESSION["id"] = $email_pass['id'];

    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode)
    {
      // $_SESSION["login"] = true;
      // $_SESSION["id"] = $row["id"];
      echo "<script> alert('Login Successful'); </script>";
      header("Location: index.php");
    }
    else
    {
      echo "<script> alert('Password Incorrect'); </script>";
    }
  }
  else{
    echo "<script> alert('Invalid Email'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
        <div class="form-icon handbag">
            <img src="images/1.png" alt="handbag-img">
        </div>
        <form method="post" autocomplete="off">
            <h1>Login</h1>
            <div class="text_field">
                <input type="text" name="usernameemail" id = "usernameemail" required value="">
                <span></span>
                <label for="usernameemail">Username or Email : </label>
            </div>
            <div class="text_field">
                <input type="password" name="password" id = "password" required value="">
                <span></span>
                <label for="password">Password : </label>
            </div>
            <input type="submit" name="submit" value="Login">
            <div class="signup_link">
                Not have an account? <a href="registration.php">Signup Here</a>
            </div>
        </form>
    </div>
</section>

</body>
</html>