<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) > 0){
		if($password == $row['password']){
			$_SESSION["login"] = true;
			$_SESSION["id"] = $row["id"];
			header("Location: index.php");
		}
		else{
			echo
			"<script> alert('Wrong Password'); </script>";
		}
	}
	else{
		echo
		"<script> alert('User Not Registered'); </script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>DLSU-D Portal</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .header {
      background: url(res/school.gif) no-repeat center center fixed;
      background-size: cover;
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 50px;
      border-radius: 10px;
      color: white;
      text-align: left;
      max-width: 480px;
      margin: 0 auto;
    }

    .logo {
      float: right;
      margin-top: -15px;
      margin-right: -15px;
      max-width: 80px;
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
      align-items: center;
      margin-bottom: 20px;
    }

    .button {
      width: 48%;
      padding: 10px;
      box-sizing: border-box;
      border-radius: 5px;
      border: none;
      background-color: #1fff79;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .register-button {
      background-color: white;
      color: black;
      font-weight: bold;
      text-align: center;
      text-decoration: none; /* Remove underline */
      font-size: 13px; /* Adjust font size as needed */
    }

    .register-button:hover {
      background-color: #d9d9d9;
    }

    .forgot-password,
    .footer-links span {
      color: #1fff79;
      transition: color 0.2s;
    }

    .forgot-password:hover,
    .footer-links span:hover {
      color: white;
    }

    .footer-links {
      margin-top: 20px;
    }

    .footer-links p {
      margin: 0;
      display: flex;
      align-items: center;
    }

    .footer-links p span {
      margin-right: 4px;
    }

    .green-dot {
      width: 4px;
      height: 4px;
      background-color: #1fff79;
      border-radius: 50%;
      margin: 0 4px;
    }

    .footer {
      background-color: white;
      padding: 20px;
      text-align: center;
      color: black;
      font-size: 14px;
    }

    /* Scroll Styling */
    ::-webkit-scrollbar {
      width: 10px;
      background-color: #b3ffb9;
    }

    ::-webkit-scrollbar-track {
      background-color: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #00913a;
      border-radius: 0;
    }

    ::-webkit-scrollbar-thumb:hover {
      background-color: #007d31;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <img src="res/logo.png" alt="Logo" class="logo">
      <h2 style="text-align: left;">
        Login to my.DLSU-D
        <span style="font-size: 16px; color: lightgrey;">Ver 6.0</span>
      </h2>
      <p style="text-align: left; color: lightgrey;">
        Enter your username and password to log in:
      </p>
      <form class="" action="" method="post" autocomplete="off">
        <input type="text" name="username" id="username" placeholder="Username" class="textbox">
        <input type="password" name="password" id="password" placeholder="Password" class="textbox">
        <div class="button-container">
          <button type="submit" name="submit" class="button">Log In</button>
          <a href="register.php" class="button register-button">Register</a>
        </div>
      </form>
      <p class="forgot-password">Forgot password?</p>
      <div class="footer-links">
        <p>
          <span>FAQ</span>
          <span class="green-dot"></span>
          <span>Help</span>
          <span class="green-dot"></span>
          <span>Contact Us</span>
        </p>
      </div>
    </div>
  </div>

  <img src="res/baptist.png" alt="Logo" style="width: 100%; height: auto;">

  <div class="footer">
    <span style="float: left; margin-right: 20px; color: black;">Albios, Shahid | Carillo, Renz</span>
    <span style="float: right; color: black;">&copy; 2023 Website, All rights reserved</span>
  </div>
</body>
</html>