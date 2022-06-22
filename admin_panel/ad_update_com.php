<?php require 'config.php';

$com_id = isset($_GET['com_id']) ? $_GET['com_id'] : '';
$com_name = isset($_GET['com_name']) ? $_GET['com_name'] : '';
$com_address = isset($_GET['com_address']) ? $_GET['com_address'] : '';
$com_nid = isset($_GET['com_nid']) ? $_GET['com_nid'] : '';
$com_email = isset($_GET['com_email']) ? $_GET['com_email'] : '';
$com_mobile = isset($_GET['com_mobile']) ? $_GET['com_mobile'] : '';

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
    <form action="ad_update_com.php" method="POST">
        <div class="container">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Complainer</p>
            <input type="hidden" name="com_id" value="<?php echo $com_id ?>">
            <div class="input-group">
                <label for="exampleInputname">Name:</label>
                <input id="exampleInputname" type="text" value="<?php echo $com_name ?>" name="com_name" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice"> address:</label>
                <input id="exampleInputprice" type="text" value="<?php echo $com_address ?>" name="com_address" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice"> nid:</label>
                <input id="exampleInputprice" type="text" value="<?php echo $com_nid ?>" name="com_nid" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputdescription">Email:</label>
                <input id="exampleInputdescription" type="email" value="<?php echo $com_email ?>" name="com_email" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">Mobile:</label>
                <input id="exampleInputprice" type="text" value="<?php echo $com_mobile ?>" name="com_mobile" class="form-control">
            </div><br> <br>
            <input class="btn btn-warning" type="submit" name="submit" value="Update">
        </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $com_id = isset($_POST['com_id']) ? $_POST['com_id'] : '';
    $com_name = isset($_POST['com_name']) ? $_POST['com_name'] : '';
    $com_address = isset($_POST['com_address']) ? $_POST['com_address'] : '';
    $com_nid = isset($_POST['com_nid']) ? $_POST['com_nid'] : '';
    $com_email = isset($_POST['com_email']) ? $_POST['com_email'] : '';
    $com_mobile = isset($_POST['com_mobile']) ? $_POST['com_mobile'] : '';


    $sql = "UPDATE complainer SET com_name='$com_name',com_address='$com_address',com_nid='$com_nid',com_email='$com_email',com_mobile='$com_mobile' WHERE complainer.com_id = '$com_id'";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
		alert('data updated!');
		
		</script>";

        header("Location: ad_com_del_up.php");
    } else {
        echo "failed";
    }
}
?>
