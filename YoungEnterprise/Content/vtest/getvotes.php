<style type="text/css">

td{
border:1px solid black;
background-color:skyblue;
}

</style>



		<?php
		
		require ('../../connect.inc.php');
		
		
		$query = mysql_query("SELECT `event` , `votes` FROM  `events` ORDER BY `votes` DESC ");
if(mysql_num_rows($query)==0){
	echo'No votes';
}else{

	echo '
			<table cellpadding="10px">
			<tr>
			<td>Event</td>
			<td>Votes</td>
			</tr>
			';
	
	while ($pages = mysql_fetch_assoc($query)){
		$event = $pages['event'];
		$votes = $pages['votes'];
		
		echo "
			<tr>
			<td>$event</td>
			<td>$votes</td>
			</tr>
			";
	}
	
	echo "
			</table>
			
			";
}

		?>