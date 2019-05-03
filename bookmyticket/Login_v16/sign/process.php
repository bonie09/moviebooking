<?php include 'db.php'; ?>

<?php
		$uname = mysqli_real_escape_string($conn, $_POST['uname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$psw = mysqli_real_escape_string($conn,$_POST['psw']);

		$query = "INSERT INTO signup(uname,email,psw) VALUES('$uname','$email','$psw')";
		if(!mysqli_query($conn, $query)){
			die(mysqli_error($conn));
		} else {
			header("Location: signup.html?success=Details%20Added");
		}
		header("Location: ../index.html");
	
?>