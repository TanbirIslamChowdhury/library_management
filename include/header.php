<?php include 'connection_user.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>BookSaw - Free Book Store HTML CSS Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<style>
        @media print{    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
		#results{
			position: absolute;
			width: 100%;
			right: 0;
			z-index: 999;
			top: 38px;
			border-radius: 10px;
		}
		#results li{
			background-color:#daa556;
			width: 100%;
			list-style:none;
			text-align:left;
			padding: 5px 15px;

		}
		.search-bar{
			position: relative;
			width: 30%;
			margin: 0;
			padding:0;
		}
		#login,#regi{
			margin-left: 17px;
		}
		.top-content .right-element .for-buy {
			margin-right: 4px;
		}
     </style>
	 
</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
<div id="header-wrap" class="no-print">
	<div class="top-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="social-links">
						<ul>
							<li>
								<a href="#"><i class="icon icon-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-youtube-play"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-behance-square"></i></a>
							</li>
						</ul>
					</div><!--social-links-->
				</div>
				<div class="col-md-6">
					<div class="right-element d-flex  flex-row">
						<div class="search-bar w-75">
							<input type="text" class="form-control" name="search" id="search">
							<ul id="results"></ul>
						</div>
						<!--search bar-->

						<?php if (isset($_SESSION['log_user_status']) && $_SESSION['log_user_status']) {
							echo '<a href="logout_user.php" class="user-account for-buy">Logout</a>';
							echo '<a href="profile.php" class="user-account for-buy"><i class="icon icon-user"></i>'.$_SESSION['user']->name.'</a>';
						} else {
							echo '<a href="login_user.php" id="login" class="user-account for-buy">Login</a>';
							echo '<a href="register_user.php" id="regi" class="user-account for-buy">Register</a>';
						}
						?>
					</div><!--top-right-->
				</div>

			</div>
		</div>
	</div><!--top-content-->

	<header id="header"  class=" no-print">
		<div class="container-fluid">
			<div class="row">

				<div class="col-md-2">
					<div class="main-logo">
						<a href="index.php"><img src="images/main-logo.png" alt="logo"></a>
					</div>

				</div>

				<div class="col-md-10">

					<nav id="navbar">
						<div class="main-menu stellarnav desktop"><a href="#" class="menu-toggle full"><span class="bars"><span></span><span></span><span></span></span> Menu</a>
							<ul class="menu-list">
								<li class="menu-item active"><a href="index.php">Home</a></li>
								<li class="menu-item active"><a href="LibraryShop.php">Shop Now</a></li>
								<!-- <li class="menu-item active">
									<a href="LibraryShop.php" cl>Shop Now</a>

									<ul style="display: none;">
										<li class="active"><a href="index.php">Home</a></li>
										<li><a href="index.html">About</a></li>
										<li><a href="index.html">Styles</a></li>
										<li><a href="index.html">Blog</a></li>
										<li><a href="index.html">Post Single</a></li>
										<li><a href="index.html">Our Store</a></li>
										<li><a href="index.html">Product Single</a></li>
										<li><a href="index.html">Contact</a></li>
										<li><a href="index.html">Thank You</a></li>
									</ul>

								<a class="dd-toggle" href="#"><span class="icon-plus"></span></a></li> -->
								<li class="menu-item"><a href="#featured-books" class="nav-link">Featured</a></li>
								<li class="menu-item"><a href="#popular-books" class="nav-link">Popular</a></li>
								<li class="menu-item"><a href="#special-offer" class="nav-link">Offer</a></li>
								<li class="menu-item"><a href="#latest-blog" class="nav-link">Articles</a></li>
								<li class="menu-item">
									<a href="cart.php" class="cart for-buy"><i class="icon icon-clipboard"></i><span>
										Cart:(BDT 
										<span class="car-total">
										<?php if(isset($_SESSION['cart'])){
											echo $_SESSION['cart']['total'];
										}else{
											echo 0;
										}?>
										</span>
										)</span>
									</a>
								</li>
							</ul>

							<div class="hamburger">
								<span class="bar"></span>
								<span class="bar"></span>
								<span class="bar"></span>
							</div>

						</div>
					</nav>

				</div>

			</div>
		</div>
	</header>

</div>