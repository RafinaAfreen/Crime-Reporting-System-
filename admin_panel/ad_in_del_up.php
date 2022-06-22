<html>


<body>
	<?php include('ad_header.php'); ?>
	<table border="1" cellspacing="0" cellpadding="5" class="table table-bordered">
		<tr>
			<th>Inspector ID</th>
			<th>Inspector Name</th>

			<th>Email</th>

			<th>Mobile Number</th>
			<th>Police Station</th>
			<th colspan="2" align="center">Opreation</th>
			<style>
				/* body
{
  font-family: 'Orelega One', cursive;
  background-color: white;
  color: #191a19;
  text-align: center;
  border: 40px solid #FF9F1C;
  border-top: 0px;
  margin: 0px;
} */
				#delbtn {
					background-color: red;
					color: white;
					font-size: 18px;
					width: 130px;
					height: 35px;
				}

				#upbtn {
					background-color: green;
					color: white;
					font-size: 18px;
					width: 130px;
					height: 35px;
				}
			</style>

			<?php
			require 'config.php';
			$sql = "SELECT * FROM inspector";
			$result = mysqli_query($conn, $sql);
			$total = mysqli_num_rows($result);
			//echo $fetch['foodname']." ".$fetch['foodtype']." ".$fetch['description']." ".$fetch['price'];
			//total no of rows
			//echo $total
			if ($total != 0) {
				//echo"total has records";
				//fetch=mysqli_fetch_assoc($result);
				while (($fetch = mysqli_fetch_assoc($result))) {
					echo "
					<tr>
					<td >" . $fetch['in_id'] . "</td>
					<td>" . $fetch['in_name'] . "</td>
					
					<td>" . $fetch['in_email'] . "</td>
					
					<td>" . $fetch['in_mobile'] . "</td>
					<td>" . $fetch['policestation_st_id'] . "</td>
					<td><a href = 'ad_update_in.php?in_id=$fetch[in_id]&in_name=$fetch[in_name]&in_email=$fetch[in_email]&in_mobile=$fetch[in_mobile]&policestation_st_id=$fetch[policestation_st_id]'><input type='submit' value='Update' id='upbtn'></a></td>
					<td><a href = 'ad_delete_in.php?in_id=$fetch[in_id]'><input type='submit' value='Delete' id='delbtn'></a></td>
					
					";
				}
			} else {
				//  echo"total has  no records";
			}
			?>

		</tr>
	</table>
	<?php
	include('home_footer.php');
	?>

</body>

</html>
