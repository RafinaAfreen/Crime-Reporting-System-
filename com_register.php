<?php
include 'config.php';
error_reporting(0);

session_start();
if (isset($_POST['submit'])) {
	$com_name = $_POST['com_name'];
	$com_address = $_POST['com_address'];
	$com_nid = $_POST['com_nid'];
	$com_email = $_POST['com_email'];
	$com_password = md5($_POST['com_password']);
	$com_c_password = md5($_POST['com_c_password']);
	$com_mobile = $_POST['com_mobile'];
	$com_nidErr = $com_mobileErr = "";

	if (!preg_match('/[0-9]{10}/', $com_nid)) {
		$com_nidErr = "NID must 10 digit";
	}
	if (!preg_match('/01[3|5|6|7|8|9][0-9]{8}/', $com_mobile)) {
		$com_mobileErr = "Mobile number not match";
	}
	if ($com_password == $com_c_password) {
		if ($com_nidErr == "") {
			if ($com_mobileErr == "") {
				$sql = "SELECT * FROM complainer WHERE com_email='$com_email'";
				$result = mysqli_query($conn, $sql);
				if (!$result->num_rows > 0) {
					$sql = "INSERT INTO complainer (com_name, com_address, com_nid, com_email, com_password, com_mobile)
                    VALUES ('$com_name','$com_address','$com_nid','$com_email','$com_password','$com_mobile')";
					$result = mysqli_query($conn, $sql);
					if ($result) {
						echo "<script>alert('Successfull')</script>";
						$com_name = "";
						$com_address = "";
						$com_nid = "";
						$com_email = "";
						$_POST['com_password'] = "";
						$_POST['com_c_password'] = "";
						$com_mobile = "";
					} else {
						echo "<script>alert('Something wrong')</script>";
					}
				} else {
					echo "<script>alert('email already exist')</script>";
				}
			} else {
				echo "<script>alert('Mobile Number not matched.')</script>";
			}
		} else {
			echo "<script>alert('NID not matched.')</script>";
		}
	} else {
		echo "<script>alert('Password not matched.')</script>";
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
</head>
<title>Crime_Report_Register</title>
<style>
	body {
		background-image: url(com.jpg);
		background-size: cover;
		background-position: center;
	}
</style>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Complainer Name" name="com_name" value="<?php echo $com_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Complainer Address" name="com_address" value="<?php echo $com_address; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Complainer NID" name="com_nid" value="<?php echo $com_nid; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="com_email" value="<?php echo $com_email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="com_password" value="<?php echo $_POST['com_password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="com_c_password" value="<?php echo $_POST['com_c_password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Complainer Mobile Number" name="com_mobile" value="<?php echo $com_mobile; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="com_login.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>