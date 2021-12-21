<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: resources.php");
    }

    if (isset($_POST["login"])) {
        include 'config.php';
        
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] && $row['password'] ) {
                $_SESSION["SESSION_EMAIL"] = $email;
                header("Location: resources.php");
            }else {
                echo "<script>alert('Your Login details is incorrect.');</script>";
            }
        }else {
            echo "<script>alert('Your Login details is incorrect.');</script>";
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
                <div class="center-login">
    
                    <div class="wrapper">
                        <div class="title"><span>Login Form</span></div>
                         <form action="#" method="post" class="form">
                           <div class="row"> 
                            <i class="fas fa-user"></i>
                            <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
                    </div>
                        <div class="row">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
                </div>
                        <div class="pass"><a href="#">Forgot password?</a></div>
                             <button class="btn" name="login">Login</button>
                            <p style= "font-size:14px; font-weight: 900; font-family:Open sans;"  >Create Account! <a href="register.php">Register</a>.</p>
            
            
                        </form>
            </div>
    
    
</div>
				</div>
			</div>
		</div>  
    </div>
    <!--End of header-->


	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>A harmonized GIS – based platform for the agriculture and aquaculture industry in collaboration with selected SUCs in the Philippines.</p>
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
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Create Account</h2>
						<p>Create Account to Download the Resources.</p>
						<form action="index.html">
							<button type="submit"> create account</i></button>
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