<?php
	require ('../../connect.inc.php');
	$scores= $_POST['scores'];
	$newscores = array(0,0,0,0,0);
	$string = "";
	
	for($x=0;$x<=count($scores);$x++){
		$y = $x+1;
		$sql = "SELECT  `votes` FROM  `events` WHERE id =$y LIMIT 1";
		$result = mysql_query($sql);
		
		
		while($row = mysql_fetch_array($result)){
		$oldvotes = $row['votes'];
		}
		
		
		$newvotes = $oldvotes + $scores[$x];
	$sql = "UPDATE  `a5890181_users`.`events` SET  `votes` =  '$newvotes' WHERE  `events`.`id` =$y LIMIT 1 ";
		mysql_query($sql);
		$newscores[$x]=$newvotes;
	}
	
		
	
	
	
	
	
	
	


?>