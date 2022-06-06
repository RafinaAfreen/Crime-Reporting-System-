<?php session_start(); ?>
<?php require 'config.php';
if (!isset($_SESSION['ad_name'])) {
	header("Location: ad_login.php");
}
if (isset($_POST['insert'])) {
	// $in_id = $_POST['in_id'];
	$in_name = $_POST['in_name'];

	$in_email = $_POST['in_email'];
	$in_password = $_POST['in_password'];

	$in_mobile = $_POST['in_mobile'];
	$sta_st_id = $_POST['sta_st_id'];
	$sql = "INSERT INTO inspector( in_name, in_email, in_password, in_mobile, policestation_st_id ) VALUES ('$in_name','$in_email','$in_password','$in_mobile','$sta_st_id ')";
	$insert = mysqli_query($conn, $sql);
	if ($insert) {
		echo "<script>
        alert('Successfully innserted')
        </script>";
	} else {
		echo "<script>
      alert('not insertted'); 
      </script>";
	}
}

?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">


	<title>Admin_Login</title>

</head>
<?php
$sql1 = "SELECT st_id,st_name FROM policestation";
$insert1 = mysqli_query($conn, $sql1);

?>




<body>
	<form action="" method="post">
		<div class="container">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Insert Inspector</p>
			<div class="input-group">

				<input id="exampleInputname" type="text" name="in_name" class="form-control" placeholder="Inspector Name">
			</div>

			<div class="input-group">

				<input id="exampleInputdescription" type="text" name="in_email" class="form-control" placeholder="Email">
			</div>
			<div class="input-group">

				<input id="exampleInputprice" type="text" name="in_password" class="form-control" placeholder="Password">
			</div>
			<div class="input-group">

				<input id="exampleInputprice" type="text" name="in_mobile" class="form-control" placeholder="Mobile Number">
			</div>

			<div class="input-group">
				<label for="exampleInputdescription">Police Station:</label>
				<select class="form-select" aria-label="Default select example" name="sta_st_id" required>
					<option value="">Choose inspector</option>
					<?php
					foreach ($insert1 as $key => $policestation) {

					?>
						<option value="<?php echo $policestation['st_id'] ?>"><?php echo $policestation['st_name'] ?></option>

					<?php
					}
					?>
				</select>
			</div>

			<br> <br>
			<button class="btn btn-warning" type="submit" name="insert"> Insert </button><br>
		</div>
	</form>
</body>

</html>