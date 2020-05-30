<?php
function connect_sql()
{
	$host="localhost";
	$user="root";
	$password="";
	if(!($link=mysqli_connect($host,$user,$password))){
		echo"<h2><font color=red font face='arial' size='20pt'>SQL Error!</font></h2>";
	}
	mysqli_select_db($link,'goods');
	return $link;
}
?>