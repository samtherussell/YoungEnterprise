<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Eagle Events ~ Comments Section</title>
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
				<!--start of content-->
				<div class="input">

					<form onsubmit="index.php" method="POST">
						Name: <br> <input class="input" maxsize="40" type="text"
							name="name" /></br> Your Email Address(Not shown):<br>
							<input class="input" maxsize="40" type="text" name="email" /><br>
						Message:<br>
						<textarea class="input" maxsize="200" name="message" id="message"
							rows="5" cols="50"></textarea>
						<br>
						<div id="count">200 characters remaining</div>
						<br> <input class="input" id="button" type="submit" value="Post" />
						<br> <input type="checkbox" name="newsletter" value="true" checked />Want
						to recieve updates about upcoming events <br>
					</form>
					<br>
					</div>
					<div class="posts">
						<?php

							require '../corefiles/connect_database.php';
							$time = time();
							$time = $time + 18000;
	
							if(isset($_POST['name'])||isset($_POST['email'])||isset($_POST['message'])){
								$name = mysql_real_escape_string(htmlentities($_POST['name']));
								$email = mysql_real_escape_string(htmlentities($_POST['email']));
								$message = mysql_real_escape_string(htmlentities($_POST['message']));
							
								if(empty($name)||empty($email)||empty($message)){
									echo 'All fields are required<br>';
								}else{
									if(strlen($name)>40||strlen($email)>40||strlen($message)>200){
										echo'One or more fields has exceeded maximum length<br>';
									}else{
										if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
												echo 'Your email address is invalid, please type a valid email address<br>';
										}else{
											if(mysql_query("INSERT INTO `comments` VALUES('','$time','$email','$name','$message')")){
												header('Location: '.$_SERVER['PHP_SELF']);
											}else{
												echo'ERROR try again later<br>';
											}
								
											if($_POST['newsletter']==true){
								
												if(mysql_query("INSERT INTO `newsletter` VALUES(NULL , '$email','$name' )")){
													echo'</br> Your email has been added to our database<br>';
												}else{
													echo'</br> Could not add you to mailling list<br>';
												}
											}
										}
									}
								}
							}			
						?>

						<hr>
						<br>

						<?php
						$comments = mysql_query("SELECT `time` , `name` , `email` , `message` FROM `comments` ORDER BY `time` DESC ");
						if(@mysql_num_rows($comments)==0){
							echo'No comments yet. Be the first to voice your opinions.';
						}else{
							while ($comment = mysql_fetch_assoc($comments)){
								$output_time = date('h:iA D dS  M Y', $comment['time']); 
								$output_name = $comment['name'];
								$output_message = $comment['message'];

								echo "
								<p>
								<strong>
								Posted by: $output_name - $output_time
								</strong></br>
								$output_message
								</p><br>
								";
							}
						}
						?>
					</div>
					<!--end OF CONTENT-->
			
			</section>


			<aside id="side">
				<iframe src="../newsfeed/news.html" scrolling="no" frameborder="0"></iframe>
			</aside>
			
		</div>
		<footer id="footer"> This Website is Copyright of Eagle Events,Caerleon</footer>

	</div>

	<script type="text/javascript" src="../corefiles/jquery.js"></script>
	
	<script type="text/javascript" src="../corefiles/char_remaining.js"></script>

</body>

</html>
