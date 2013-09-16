<!DOCTYPE html>
<html>
<head>
<title>Request Newsletter</title>
<link rel="stylesheet" href="../corefiles/css/main.css" />
<link rel="stylesheet" href="../corefiles/css/navbar.css" />
<link rel="stylesheet" href="../corefiles/css/form.css" />
</head>
<body>
	<div id="wrapper">
		<div id="topbar">
			<header id="header">

				<h1>Eagle Events</h1>
				<br>
				<br>
				<br>
				<div id="headingleft">South Wales Local Event Planning</div>


				<div id="headingright">A Young Enterprise Business</div>
			</header>

			<nav>
				<ul id="nav">
					<li><a href="../">Home</a></li>
					<li><a href="#">Events</a>
						<ul>
							<li><a href="#">Example 1</a></li>
							<li><a href="#">Example 2</a></li>
							<li><a href="#">Example 3</a></li>
						</ul>
					</li>

					<li><a href="#">About us</a>
						<ul>
							<li><a href="#">Our Aims</a></li>
							<li><a href="#">The Team</a></li>
						</ul>
					</li>
					<li><a href="#">Feedback</a>
						<ul>
							<li><a href="../comments/">Comments</a></li>
							<li><a href="../contactus/">Contact us</a></li>
							<li><a href="../add_email/">Request Newsletter</a></li>
							<li><a href="../vtest/">Vote for Your Event</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<br>
			<br>
		</div>
		<div id="main_div">
			<section id="main">
				<!--start-->

				<div class="input">


					<br>
					<h3>Submit your information to recieve emails about our upcoming
						events.</h3>

					<br>
					<h5>We will never sell or share this information.</h5>
					<br>
					<form onsubmit="index.php" method="POST">
						Name: <br> <input class="input" maxsize="40" type="text" name="name" /><br>
						Your Email Address:<br> <input class="input" maxsize="40" type="text" name="email" /><br>
						<input class="input" type="submit" value="Submit" id="button"/> <br>

					</form>
					
					</div>
					
					<?php
						
						require '../corefiles/connect_database.php';

						if(isset($_POST['name'])||isset($_POST['email'])||isset($_POST['message'])){
							$name = mysql_real_escape_string(htmlentities($_POST['name']));
							$email = mysql_real_escape_string(htmlentities($_POST['email']));

							if(empty($name)||empty($email)){
								echo 'All fields are required';
							}else{
								if(strlen($name)>40||strlen($email)>40||strlen($message)>200){
									echo'One or more fields has exceeded maximum length';
								}else{
									if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
										echo 'Your email address is invalid, please type a valid email address';
									}else{
										if(@mysql_query("INSERT INTO `newsletter` VALUES(NULL , '$email','$name' )")){
											echo'</br> Your email has been added to our database';
										}else{
											echo'</br> Could not add you to mailling list';
										}		
									}
								}
							}
						}
					?>



					<!--end-->
			
			</section>


			<aside id="side">
				<iframe src="../newsfeed/news.html" scrolling="no" frameborder="0"></iframe>
			</aside>
		</div>
		<footer id="footer"> This Website is Copyright of Eagle Events,
			Caerleon </footer>

	</div>

	

</body>
</html>
