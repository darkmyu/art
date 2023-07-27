<!DOCTYPE html>
<html lang="en">
<head>
	<title>NareGallery</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/~sale11/my2/fonts/icomoon/style.css">

	<link rel="stylesheet" href="/~sale11/my2/css/bootstrap.min.css">
	<link rel="stylesheet" href="/~sale11/my2/css/magnific-popup.css">
	<link rel="stylesheet" href="/~sale11/my2/css/jquery-ui.css">
	<link rel="stylesheet" href="/~sale11/my2/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/~sale11/my2/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="/~sale11/my2/css/lightgallery.min.css">    

	<link rel="stylesheet" href="/~sale11/my2/css/bootstrap-datepicker.css">

	<link rel="stylesheet" href="/~sale11/my2/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="/~sale11/my2/css/swiper.css">

	<link rel="stylesheet" href="/~sale11/my2/css/aos.css">

	<link rel="stylesheet" href="/~sale11/my2/css/style.css">

	<link rel="stylesheet" href="/~sale11/my/css/fontawesome-all.min.css">

	<script src="/~sale11/my2/js/jquery-3.3.1.min.js"></script>
	<script src="/~sale11/my2/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="/~sale11/my2/js/jquery-ui.js"></script>
	<script src="/~sale11/my2/js/jquery.stellar.min.js"></script>
	<script src="/~sale11/my2/js/jquery.countdown.min.js"></script>
	<script src="/~sale11/my2/js/jquery.magnific-popup.min.js"></script>
	<script src="/~sale11/my2/js/jquery.mousewheel.min.js"></script>
</head>

<body>
	<div class="site-wrap">

	<div class="site-mobile-menu">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close mt-3">
				<span class="icon-close2 js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body">
		</div>
	</div>

	<header class="site-navbar py-3" role="banner">
		<div class="container-fluid">
			<div class="row align-items-center">

				<div class="col-xl-4 col-10" data-aos="fade-down">
					<h1 class="mb-0"><a href="/~sale11/art" class="text-white h2 mb-0">NareGallery</a></h1>
				</div>
				<div class="col-xl-4 d-none d-xl-block" data-aos="fade-down">
					<nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

						<ul class="site-menu js-clone-nav mx-auto d-none d-lg-block pl-0">
							<?
								$myPage = "<li><a href='/~sale11/art/my'>MyPage</a></li>";
								$myPageSelect = "<li class='active'><a href='/~sale11/art/my'>MyPage</a></li>";

								if ($this->session->userdata("id")) {

								}

								if ($pageName == "Home") {
									echo("<li class='active'><a href='/~sale11/art'>Home</a></li>");
									echo("<li><a href='/~sale11/art/photo'>Photos</a></li>");
									echo("<li><a href='/~sale11/art/post/add'>Post</a></li>");
									echo("<li><a href='/~sale11/art/about'>About</a></li>");
									if ($this->session->userdata("id")) {
										echo($myPage);
									}
								} else if ($pageName == "Photos") {
									echo("<li><a href='/~sale11/art'>Home</a></li>");
									echo("<li class='active'><a href='/~sale11/art/photo'>Photos</a></li>");
									echo("<li><a href='/~sale11/art/post/add'>Post</a></li>");
									echo("<li><a href='/~sale11/art/about'>About</a></li>");
									if ($this->session->userdata("id")) {
										echo($myPage);
									}
								} else if ($pageName == "Post") {
									echo("<li><a href='/~sale11/art'>Home</a></li>");
									echo("<li><a href='/~sale11/art/photo'>Photos</a></li>");
									echo("<li class='active'><a href='/~sale11/art/post/add'>Post</a></li>");
									echo("<li><a href='/~sale11/art/about'>About</a></li>");
									if ($this->session->userdata("id")) {
										echo($myPage);
									}
								} else if ($pageName == "About") {
									echo("<li><a href='/~sale11/art'>Home</a></li>");
									echo("<li><a href='/~sale11/art/photo'>Photos</a></li>");
									echo("<li><a href='/~sale11/art/post/add'>Post</a></li>");
									echo("<li class='active'><a href='/~sale11/art/about'>About</a></li>");
									if ($this->session->userdata("id")) {
										echo($myPage);
									}
								} else if ($pageName == "MyPage") {
									echo("<li><a href='/~sale11/art'>Home</a></li>");
									echo("<li><a href='/~sale11/art/photo'>Photos</a></li>");
									echo("<li><a href='/~sale11/art/post/add'>Post</a></li>");
									echo("<li><a href='/~sale11/art/about'>About</a></li>");
									if ($this->session->userdata("id")) {
										echo($myPageSelect);
									}
								} else {
									echo("<li><a href='/~sale11/art'>Home</a></li>");
									echo("<li><a href='/~sale11/art/photo'>Photos</a></li>");
									echo("<li><a href='/~sale11/art/post/add'>Post</a></li>");
									echo("<li><a href='/~sale11/art/about'>About</a></li>");
									echo("<li><a href='/~sale11/art/my'>MyPage</a></li>");
								}
							?>
							<!-- <li class="has-children">
								<a href="single.html">Gallery</a>
								<ul class="dropdown">
									<li><a href="#">Nature</a></li>
									<li><a href="#">Portrait</a></li>
									<li><a href="#">People</a></li>
									<li><a href="#">Architecture</a></li>
									<li><a href="#">Animals</a></li>
									<li><a href="#">Sports</a></li>
									<li><a href="#">Travel</a></li>
								</ul>
							</li> -->
						</ul>
					</nav>
				</div>
				
				<div class="col-xl-4 col-2 d-flex justify-content-end align-items-center" data-aos="fade-down">
					<div class="d-none d-xl-inline-block">
						<ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0 align-items-center" data-class="social">
							<?
							if ($this->session->userdata('id')) {
								echo("
									<div class='dropdown'>
										<button class='btn dropdown-toggle text-white mr-2' style='background-color: black;' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
											My Page
										</button>
										<div class='dropdown-menu dropdown-menu-right text-center' aria-labelledby='dropdownMenuButton'>
											<a href='/~sale11/art/my' class='text-dark btn'>$user->name11 Page</a><br />
											<div class='dropdown-divider'></div>
											<a href='/~sale11/art/admin/logout' class='text-dark btn'>Logout</a><br />

								");
									if ($this->session->userdata('rank') == 1) {
										echo("<a href='/~sale11/art/admin' class='text-danger btn'>Admin</a>");
									}

									echo("
										</div>
									</div>	
									");
								} else {
									echo("
										<div class='dropdown'>
											<button class='btn dropdown-toggle text-white mr-2' style='background-color: black;' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
												Login
											</button>
											<div class='dropdown-menu dropdown-menu-right text-center' aria-labelledby='dropdownMenuButton'>
												<a href='/~sale11/art/admin' class='text-dark btn'>Login</a><br />
												<a href='/~sale11/art/register' class='text-dark btn'>Register</a><br />
											</div>
										</div>	
									");
								}
							?>
							<!-- <li>
								<a href="https://www.facebook.com/" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
							</li>
							<li>
								<a href="https://twitter.com/?lang=ko" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
							</li>
							<li>
								<a href="https://www.instagram.com/" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
							</li>
							<li>
								<a href="https://www.youtube.com/" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
							</li> -->
						</ul>
					</div>
					<!-- <svg xmlns="http://www.w3.org/2000/svg" class="" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
						</svg> -->
					<div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3 d-flex align-items-center">
						<a href="#" class="site-menu-toggle js-menu-toggle">
							<span class="icon-menu h3"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>