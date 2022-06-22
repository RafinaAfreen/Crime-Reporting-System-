<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['com_name'])) {
	header("Location: com_welcome.php");
}

if (isset($_POST['submit'])) {
	$com_email = $_POST['com_email'];
	$com_password = md5($_POST['com_password']);

	$sql = "SELECT * FROM complainer WHERE com_email='$com_email' AND com_password='$com_password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['com_name'] = $row['com_id'];
		header("Location: com_welcome.php");
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

	<title>Crime_Report_Login</title>

	<style>
		body {
			background-image: url(supreme.jpg);
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
				<input type="email" placeholder="Complainer Email" name="com_email" value="<?php echo $com_email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="com_password" value="<?php echo $_POST['com_password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="com_register.php">Register Here</a>.</p>
		</form>
	</div>
</body>

</html>
