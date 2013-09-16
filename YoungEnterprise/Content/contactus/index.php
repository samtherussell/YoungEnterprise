<!doctype html>
<html>
<head>

<meta charset="utf-8" />
<title>Eagle Events ~ Contact Us</title>
<link rel="stylesheet" href="../corefiles/css/main.css" />
<link rel="stylesheet" href="../corefiles/css/navbar.css" />
<link rel="stylesheet" href="../corefiles/css/form.css" />
</head>
<body>

	<div id="wrapper">
		<div id="topbar">
			<header id="header">

				<h1>Eagle Events</h1>
				<br> <br> <br>
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
			<br> <br>
		</div>
		<div id="main_div">
			<section id="main">
				<!--start-->


				<div class="form">
					<form onsubmit="index.php" method="POST">
						Your Email Address: <br> <input class="input" type="text" name="from" /><br>
						Name:<br> <input class="input" type="text" name="subject" /><br>
						Subject/Query:<br> <input class="input" type="text" name="name" /><br>
						Message:<br> <textarea class="input" maxlength="200" name="message" id="message" rows="5" cols="50"></textarea> <br>
						<div id="count">200 characters remaining</div>
						<input class="input" id="button" type="submit" value="Send" /> <br>
						<input class="input" type="checkbox" name="newsletter" value="true" checked />
						Want to recieve updates about upcoming events
					</form>
				</div>

				<br>
				<?php

					if(isset($_POST['from'])||isset($_POST['subject'])||isset($_POST['message'])){
						$to = 'nellie.sam4@gmail.com';
						$subject = $_POST['subject'];
						$body = $_POST['message'];
						$from = $_POST['from'];
						$name = $_POST['name'];
						$headers = 'From: '.$from;
		
		
						if(filter_var($from, FILTER_VALIDATE_EMAIL) == false){
							echo 'Your email address is invalid, please type a valid email address';
						}else{
	
							if (mail($to,$subject,$body,$headers)){
								echo 'Your message has been sent. We will try to email you back as soon as possible on '. $from.'.<br>';
							}else{
								echo 'there was a problem';
							}
			
							if($_POST['newsletter']==true){
			
								require'../corefiles/connect.inc.php';
								
								if($_POST['newsletter']==true){

									if(@mysql_query("INSERT INTO `newsletter` VALUES(NULL , '$from','$name')")){
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
		
		<footer id="footer"> This Website is Copyright of Eagle Events, Caerleon </footer>

	</div>

	<script type="text/javascript" src="../corefiles/jquery.js"></script>
	
	<script type="text/javascript" src="../corefiles/char_remaining.js"></script>

</body>

</html>
