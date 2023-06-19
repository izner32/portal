<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$username','$email','$password')";
            mysqli_query($conn, $query);
        }
        else{
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: url(res/reg.png) no-repeat center center fixed;
      background-size: cover;
    }

    .container {
      width: 300px;
      margin: 100px auto;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      color: white;
    }

    h2 {
      color: #1fff79; /* Green color */
    }

    .textbox {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
      border-radius: 5px;
      border: none;
    }

    .button-container {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .button {
      flex-basis: 45%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: #1fff79;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .button.white {
      background-color: white;
      color: black;
    }

    .button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .button.glow:hover {
      box-shadow: 0 0 10px rgba(0, 255, 0, 0.5), 0 0 20px rgba(0, 255, 0, 0.3), 0 0 30px rgba(0, 255, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="username">Username:</label>
      <input type="text" name="username" required value="" placeholder="Username" class="textbox" id="username">
      <label for="email">Email:</label>
      <input type="email" name="email" required value="" placeholder="Email" class="textbox" id="email">
      <label for="password">Password:</label>
      <input type="password" name="password" required value="" placeholder="Password" class="textbox" id="password">
      <label for="confirm-password">Confirm Password:</label>
      <input type="password" name="confirmpassword"  required value="" placeholder="Confirm Password" class="textbox" id="confirmpassword">
      
      <div class="button-container">
        <button class="button" onclick="register()" type="submit" name="submit">Register</button>
        <button class="button white" onclick="login()">Login</button>
      </div>
    </form>
  </div>

  <script>
    function register() {
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmpassword").value;
      
      if (username === '' || email === '' || password === '' || confirmPassword === '') {
        alert("Please fill in all fields.");
      } else {
        alert("Welcome, " + username + "! Registration Complete.");
      }
    }

    function login() {
      location.href = "login.php";
    }
  </script>
</body>
</html>
