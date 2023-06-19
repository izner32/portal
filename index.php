<?php
	require 'config.php';
	if(!empty($_SESSION["id"])){
		$id = $_SESSION["id"];
		$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);
	}
	else{
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>My.DLSU-D Portal</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: url(res/portal.png) no-repeat center center fixed;
      background-size: cover;
    }

    .header {
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header h1 {
      margin: 0;
      font-size: 36px;
      cursor: pointer;
    }

    .menu-options {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .menu-options a {
      color: white;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .menu-options a:hover {
      color: green;
    }

    .menu-options .sign-out {
      color: green;
    }

    .menu-options .sign-out:hover {
      color: white;
    }

    .slideshow-container {
      position: relative;
      width: 60%;
      margin: 30px 0 30px 20px;
    }

    .slideshow-container .slide {
      display: none;
    }

    .slideshow-container .slide img {
      width: 100%;
      height: auto;
    }

    /* Slide navigation dots */
    .dot-container {
      text-align: center;
      margin-top: 10px;
    }

    .dot {
      height: 10px;
      width: 10px;
      margin: 0 4px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.3s ease;
    }

    .dot.active {
      background-color: #717171;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>my.DLSU-D Portal</h1>
    <div class="menu-options">
      <a href="#">Features</a>
      <a href="#">Application</a>
      <a href="#">Links</a>
      <a href="logout.php" class="sign-out">Sign Out</a>
    </div>
  </div>

  <div class="slideshow-container">
    <div class="slide">
      <img src="res/1.jpg" alt="Slide 1">
    </div>
    <div class="slide">
      <img src="res/2.jpg" alt="Slide 2">
    </div>
    <div class="slide">
      <img src="res/3.jpg" alt="Slide 3">
    </div>
    <div class="slide">
      <img src="res/4.jpg" alt="Slide 4">
    </div>

    <!-- Slide navigation dots -->
    <div class="dot-container">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </div>

  <script>
    // Automatic slideshow
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var slides = document.getElementsByClassName("slide");
      var dots = document.getElementsByClassName("dot");

      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }

      slideIndex++;

      if (slideIndex > slides.length) {
        slideIndex = 1;
      }

      for (var i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";

      setTimeout(showSlides, 3000); // Change slide every 3 seconds
    }
  </script>
</body>
</html>

