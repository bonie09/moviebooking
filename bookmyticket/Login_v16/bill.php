<?php include 'db.php'; ?>

<?php
	$notc=$_POST['notc'];
	$m_time=$_POST['m_time'];
	$sql="SELECT m_name,m_time,notc,cost FROM billing WHERE m_time='$m_time' && notc='$notc'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if(($row['m_time']==$m_time) && ($row['notc']==$notc))
			{
				echo "Thank You!! Your ticket is Succesfully booked"."<br/>"."<br/>"; 
				echo "Movie name: ".$row['m_name']."<br/>"."<br/>";
				echo "Movie Time: ".$row['m_time']."<br/>"."<br/>";
				echo "No. of tickets are ".$row['notc']."<br/>"."<br/>";
				echo "Total cost is: ".$row['cost']."<br/>"."<br/>";
			}
		}		 
	}
	else {
		echo "<script type='text/javascript'>alert('Invalid Credentials.')</script>";
	}
?>


