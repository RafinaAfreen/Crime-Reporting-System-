<?php session_start(); ?>
<?php require 'config.php';
if (!isset($_SESSION['ad_name'])) {
    header("Location: ad_login.php");
}
if (isset($_POST['insert'])) {

    $st_name = $_POST['st_name'];

    $st_area = $_POST['st_area'];
    $st_zip = $_POST['st_zip'];
    $sql = "INSERT INTO policestation( st_name, st_area, st_zip ) VALUES ('$st_name','$st_area','$st_zip')";
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


<form action="" method="post">
    <div class="container">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Insert Police Station</p>
        <div class="col">

            <input id="exampleInputname" type="text" name="st_name" class="form-control" placeholder="Police Station Name">
        </div>

        <div class="col">
            <input id="exampleInputdescription" type="text" name="st_area" class="form-control" placeholder="Police Station Area">
        </div>
        <div class="col">

            <input id="exampleInputprice" type="text" name="st_zip" class="form-control" placeholder="ZIP Code">
        </div>
        <br> <br>
        <button class="btn btn-warning" type="submit" name="insert"> Insert </button><br>
</form>

</html>
