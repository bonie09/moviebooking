<?php

$conn = mysqli_connect('localhost','root','123456','movies');

if(mysqli_connect_error()){
	echo 'DB Connection Error:'.mysqli_connect_error();
}
?>