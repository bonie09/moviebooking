<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Andhadhun-Movie</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		table {
			    border-collapse: collapse;
			    width: 100%;
			}

		th, td {
			    text-align: left;
			    padding: 8px;
			}

		tr:nth-child(even) {background-color: #f2f2f2;}
	</style>
</head>
<body>
	<img src="images/andhadhun.jpg" style="width: 25%; height: 459px;"><br>
	<?php
		$sql = "SELECT m_name,m_type,m_lang,m_desc,m_dur FROM andhadhun";

		$result = mysqli_query($conn,$sql);
			if(!$result){
			    die("Query Failed");
			}
			echo "<table>;
			<th>Details</th>";
			while($row=$result->fetch_assoc()) {
				echo "<tr><td>Movie name: ".$row['m_name']."</td></tr>";
				echo "<tr><td>Type: ".$row['m_type']."</td></tr>";
				echo "<tr><td>Language: ".$row['m_lang']."</td></tr>";
				echo "<tr><td>Description: ".$row['m_desc']."</td></tr>";
				echo "<tr><td>Duration: ".$row['m_dur']."</td></tr>";
			}
			echo "</table>";
			mysqli_free_result($result);
			$conn->close();
	?><br>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Book Tickets</button></div><br>


	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Select the number of tickets</h4>
	        </div>
	        <div class="modal-body">
		        <form action="bill.php" method="POST">
		        	 No. of Tickets:
					<select name="notc">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select><br><br>
			       	Show Timings:
			       	<button type="submit" name="m_time" class="btn btn-default" value="2:00">2:00</button>
			       	<button type="submit" name="m_time" class="btn btn-default" value="4:00">4:00</button>
			       	<button type="submit" name="m_time" class="btn btn-default" value="6:00">6:00</button>
			       	<button type="submit" name="m_time" class="btn btn-default" value="8:00">8:00</button>
			       	<br><br>
				</form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
 	 </div>
</body>
</html>