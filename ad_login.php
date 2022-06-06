<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['ad_name'])) {
	header("Location: ad_welcome.php");
}

if (isset($_POST['submit'])) {
	$ad_email = $_POST['ad_email'];
	$ad_password = $_POST['ad_password'];

	$sql = "SELECT * FROM admin WHERE ad_email='$ad_email' AND ad_password='$ad_password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['ad_name'] = $row['ad_name'];
		header("Location: ad_welcome.php");
	} else {
		echo "<script>
	alert('Woops! Email or Password is Wrong.')
</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">


	<title>Admin_Login</title>
	<style>
		body {
			background-image: url(kjail.jpg);
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}
	</style>
</head>

<body>


	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Admin Email" name="ad_email" value="<?php echo $ad_email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="ad_password" value="<?php echo $_POST['ad_password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>

		</form>
	</div>

</body>

</html>