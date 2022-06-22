<?php session_start(); ?>
<?php require 'config.php';
if (!isset($_SESSION['ad_name'])) {
    header("Location: ad_login.php");
}
if (isset($_POST['insert'])) {
    // $in_id = $_POST['in_id'];
    $comp_type = $_POST['comp_type'];
    $comp_details = $_POST['comp_details'];
    $status = $_POST['status'];
    $complainer_com_id = $_POST['complainer_com_id'];
    $inspector_in_id = $_POST['inspector_in_id'];
    $sql = "INSERT INTO complain( comp_type, comp_details, status, complainer_com_id, inspector_in_id ) VALUES ('$comp_type','$comp_details','$status','$complainer_com_id','$inspector_in_id')";
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
$sql1 = "SELECT com_id,com_name FROM complainer";
$insert1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT in_id,in_name FROM inspector";
$insert2 = mysqli_query($conn, $sql2);
?>


<form action="" method="post">
    <div class="container">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Insert Complain</p>
        <div class="input-group">
            <input type="text" name="comp_type" class="form-control" placeholder="Complain Type">
        </div>

        <div class="input-group">

            <input id="exampleInputdescription" type="text" name="comp_details" class="form-control" placeholder="Details">
        </div>
        <div class="input-group">

            <input id="exampleInputprice" type="text" name="status" class="form-control" placeholder="Status">
        </div>
        <div class="input-group">
            <label for="exampleInputdescription">Complainer Name:</label>
            <select class="form-select" aria-label="Default select example" name="complainer_com_id" required>
                <option value="">Choose inspector</option>
                <?php
                foreach ($insert1 as $key => $complainer) {

                ?>
                    <option value="<?php echo $complainer['com_id'] ?>"><?php echo $complainer['com_name'] ?></option>

                <?php
                }
                ?>
            </select>
        </div>

        <div class="input-group">
            <label for="exampleInputdescription">Inspector:</label>
            <select class="form-select" aria-label="Default select example" name="inspector_in_id" required>
                <option value="">Choose police station</option>
                <?php
                foreach ($insert2 as $key => $inspector) {

                ?>
                    <option value="<?php echo $inspector['in_id'] ?>"><?php echo $inspector['in_name'] ?></option>

                <?php
                }
                ?>
            </select>
        </div>

        <br> <br>
        <button class="btn btn-warning" type="submit" name="insert"> Insert </button><br>
    </div>
</form>

</html>
