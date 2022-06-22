<?php require 'config.php';

$st_id = isset($_GET['st_id']) ? $_GET['st_id'] : '';
$st_name = isset($_GET['st_name']) ? $_GET['st_name'] : '';

$st_area = isset($_GET['st_area']) ? $_GET['st_area'] : '';

$st_zip = isset($_GET['st_zip']) ? $_GET['st_zip'] : '';
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
    <form action="ad_update_pol.php" method="POST">
        <div class="container">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Police Station</p>
            <input type="hidden" name="st_id" value="<?php echo $st_id ?>">
            <div class="input-group">
                <label for="exampleInputname">Poilice station Name:</label>
                <input id="exampleInputname" type="text" value="<?php echo $st_name ?>" name="st_name" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">area:</label>
                <input id="exampleInputprice" type="text" value="<?php echo $st_area ?>" name="st_area" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">police station zip:</label>
                <input id="exampleInputprice" type="text" value="<?php echo $st_zip ?>" name="st_zip" class="form-control">
            </div>
            <br> <br>
            <input class="btn btn-warning" type="submit" name="submit" value="Update">
        </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $st_id = isset($_POST['st_id']) ? $_POST['st_id'] : '';
    $st_name = isset($_POST['st_name']) ? $_POST['st_name'] : '';

    $st_area = isset($_POST['st_area']) ? $_POST['st_area'] : '';

    $st_zip = isset($_POST['st_zip']) ? $_POST['st_zip'] : '';

    $sql = "UPDATE policestation SET st_name='$st_name',st_area='$st_area',st_zip='$st_zip' WHERE policestation.st_id = '$st_id'";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
		alert('data updated!');
		
		</script>";
        header("Location: ad_pol_del_up.php");
    } else {
        echo "failed";
    }
}
?>
