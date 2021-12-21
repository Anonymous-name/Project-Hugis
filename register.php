<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: welcome.php");
    }

    if (isset($_POST["submit"])) {
        include 'config.php';

        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));
        //$limits = mysqli_real_escape_string($conn, $_POST["limits"]);
       //$limit_used = 0;

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            echo "<script>alert('{$email} - This email has already taken.');</script>";
        }else {
            if ($password === $cpassword) {
                $sql = "INSERT INTO users (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: index.php");
                }else {
                    echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
                }
            }else {
                echo "<script>alert('Password and confirm password do not match.');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/design-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
    <title>Hugis Project</title>
</head>
<body style="background-color:#eee">

<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo-1.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="index.html">Home</a>
								</li>
								<li><a href="about.html">About</a>
								<ul class="sub-menu">
										<li><a href="#">Proponents</a></li>
										<li><a href="#">Overview</a></li>
										<li><a href="#">Objectives</a></li>

									</ul>
								</li>
								<li><a href="news.html">News</a>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="index.php">Resources</a></li>
								<li><a href="map.html">Map</a>
								</li>
								<li>
									<div class="header-icons">		
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
                            
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
                
			</div>
		</div>  
    </div>
    <!--End of header-->
    <div class="center-login">
    <div class="wrapper">
    <div class="title"><span>Register</span></div>
        <form action="" method="post" class="form">
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="name" name="name" id="name" class="input" placeholder="Enter your full name" required>
            </div>
            <div class="row">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
            </div>
            <div class="row">
                <i class="fas fa-key"></i> 
                <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
            </div>
            <div class="row">
                <i class="fas fa-key"></i>
                <input type="password" name="cpassword" id="cpassword" class="input" placeholder="Enter your confirm password" required>
            </div>
            <!--
           <div class="row">
                <label for="limit" class="input-label">Login Limit</label>
                <select id="limit" name="limits" class="input" required>
                    <option value="" disabled selected>Select Limit</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>-->

            <button class="btn" name="submit">Register</button>
            <p style= "font-size:14px; font-weight: 900; font-family:Open sans;" >You have already an account! <a href="index.php">Login</a>.</p>
        </form>
    </div>
</div>
</div>
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>A harmonized GIS – based platform for the agriculture industry in collaboration with selected students from BSIT in the Batangas State University (Alangilan).</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Contact Us</h2>
						<ul>
							<li>700-800</li>
							<li>bsu@g.batstate-u.edu.ph</li>
							<li>+63 939 595 8160</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="index.php">Resources</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Create Account</h2>
						<p>Create Account to Download the Resources.</p>
						<form action="register.php">
							<button type="submit"> Create account </button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - <a href="#">Hugis Project</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
</body>
</html>