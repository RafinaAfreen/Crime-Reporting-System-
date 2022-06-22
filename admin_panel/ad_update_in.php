<?php require 'config.php';
// if (!isset($_SESSION['ad_name'])) {
// 	header("Location: ad_login.php");
// }
$in_id = isset($_GET['in_id']) ? $_GET['in_id'] : '';
$in_name = isset($_GET['in_name']) ? $_GET['in_name'] : '';

$in_email = isset($_GET['in_email']) ? $_GET['in_email'] : '';

$in_mobile = isset($_GET['in_mobile']) ? $_GET['in_mobile'] : '';
$policestation_st_id = isset($_GET['policestation_st_id']) ? $_GET['policestation_st_id'] : '';
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

<body>
	<form action="ad_update_in.php" method="POST">
		<div class="container">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Inspector</p>
			<input type="hidden" name="in_id" value="<?php echo $in_id ?>">
			<div class="input-group">
				<label for="exampleInputname">Name:</label>

				<input id="exampleInputname" type="text" value="<?php echo $in_name ?>" name="in_name" class="form-control" placeholder="Complainer Name">
			</div>

			<div class="input-group">
				<label for="exampleInputdescription">Email:</label>
				<input id="exampleInputdescription" type="email" value="<?php echo $in_email ?>" name="in_email" class="form-control">
			</div>
			<div class="input-group">
				<label for="exampleInputprice">Mobile:</label>
				<input id="exampleInputprice" type="text" value="<?php echo $in_mobile ?>" name="in_mobile" class="form-control">
			</div>
			<div class="input-group">
				<label for="exampleInputprice">police station:</label>
				<input id="exampleInputprice" type="text" value="<?php echo $policestation_st_id ?>" name="policestation_st_id" class="form-control">
			</div>
			<br> <br>
			<input class="btn btn-warning" type="submit" name="submit" value="Update">
		</div>

	</form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
	$in_id = isset($_POST['in_id']) ? $_POST['in_id'] : '';
	$in_name = isset($_POST['in_name']) ? $_POST['in_name'] : '';

	$in_email = isset($_POST['in_email']) ? $_POST['in_email'] : '';

	$in_mobile = isset($_POST['in_mobile']) ? $_POST['in_mobile'] : '';
	$policestation_st_id = isset($_POST['policestation_st_id']) ? $_POST['policestation_st_id'] : '';

	$sql = "UPDATE inspector SET in_name='$in_name',in_email='$in_email',in_mobile='$in_mobile',policestation_st_id='$policestation_st_id' WHERE inspector.in_id = '$in_id'";


	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>
		alert('data updated!');
		
		</script>";
		header("Location: ad_in_del_up.php");
	} else {
		echo "failed";
	}
}
?>
