<?php require 'config.php';

$comp_id = isset($_GET['comp_id']) ? $_GET['comp_id'] : '';
$comp_type = isset($_GET['comp_type']) ? $_GET['comp_type'] : '';
$comp_details = isset($_GET['comp_details']) ? $_GET['comp_details'] : '';
$comp_date = isset($_GET['comp_date']) ? $_GET['comp_date'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$complainer_com_id = isset($_GET['complainer_com_id']) ? $_GET['complainer_com_id'] : '';
$inspector_in_id = isset($_GET['inspector_in_id']) ? $_GET['inspector_in_id'] : '';
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
    <form action="" method="POST">
        <div class="container">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Complain</p>
            <input type="hidden" name="comp_id" value="<?php echo $comp_id ?>">
            <div class="input-group">
                <label for="exampleInputname">Type: </label>
                <input id="exampleInputname" type="text" value="<?php echo $comp_type ?>" name="comp_type" class="form-control">
            </div>

            <div class="input-group">
                <label for="exampleInputdescription">Details: </label><br>
                <input id="exampleInputdescription" type="text" value="<?php echo $comp_details ?>" name="comp_details" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">Date: </label>
                <input id="exampleInputprice" type="text" value="<?php echo $comp_date ?>" name="comp_date" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">Status: </label>
                <input id="exampleInputprice" type="text" value="<?php echo $status ?>" name="status" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">Complainer ID: </label>
                <input id="exampleInputprice" type="text" value="<?php echo $complainer_com_id ?>" name="complainer_com_id" class="form-control">
            </div>
            <div class="input-group">
                <label for="exampleInputprice">Inspector ID: </label>
                <input id="exampleInputprice" type="text" value="<?php echo $inspector_in_id ?>" name="inspector_in_id" class="form-control">
            </div>
            <br> <br>
            <input class="btn btn-warning" type="submit" name="submit" value="Update">
        </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $comp_id = isset($_POST['comp_id']) ? $_POST['comp_id'] : '';
    $comp_type = isset($_POST['comp_type']) ? $_POST['comp_type'] : '';
    $comp_details = isset($_POST['comp_details']) ? $_POST['comp_details'] : '';
    $comp_date = isset($_POST['comp_date']) ? $_POST['comp_date'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $complainer_com_id = isset($_POST['complainer_com_id']) ? $_POST['complainer_com_id'] : '';
    $inspector_in_id = isset($_POST['inspector_in_id']) ? $_POST['inspector_in_id'] : '';

    $sql = "UPDATE complain SET comp_type='$comp_type',comp_details='$comp_details',comp_date='$comp_date',status='$status',complainer_com_id='$complainer_com_id',inspector_in_id='$inspector_in_id' WHERE complain.comp_id = '$comp_id'";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
		alert('data updated!');
		
		</script>";
        header("Location: ad_comp_del_up.php");
    } else {
        echo "failed";
    }
}
?>