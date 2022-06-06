<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['in_name'])) {
	header("Location: in_welcome.php");
}

if (isset($_POST['submit'])) {
	$in_email = $_POST['in_email'];
	$in_password = $_POST['in_password'];

	$sql = "SELECT * FROM inspector WHERE in_email='$in_email' AND in_password='$in_password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['in_name'] = $row['in_name'];
		header("Location: in_welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Inspector_Login</title>

	<style>
		body {
			background-image: url(logo.jpg);
			background-size: cover;
			background-position: center;
		}
	</style>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Inspector Email" name="in_email" value="<?php echo $in_email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="in_password" value="<?php echo $_POST['in_password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>

		</form>
	</div>
</body>

</html>