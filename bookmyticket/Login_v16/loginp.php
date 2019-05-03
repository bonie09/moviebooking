<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php

		$email=$_POST['email'];
		$psw=$_POST['psw'];

		$sql = "SELECT email,psw FROM signup where email='$email' && psw='$psw'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if(($row['email']==$email) && ($row['psw']==$psw))
				{
					header("Location: home.html");
				}
			}		 
		}
		else {
			header("Location: index.html");
		}
		
			?>
	
</body>
</html>