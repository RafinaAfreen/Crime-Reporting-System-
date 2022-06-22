<?php session_start(); ?>
<?php require 'config.php';
if (!isset($_SESSION['ad_name'])) {
    header("Location: ad_login.php");
}

if (isset($_POST['insert'])) {
    // $in_id = $_POST['in_id'];
    $com_name = $_POST['com_name'];
    $com_address = $_POST['com_address'];
    $com_nid = $_POST['com_nid'];
    $com_email = $_POST['com_email'];
    $com_password = md5($_POST['com_password']);
    $com_mobile = $_POST['com_mobile'];
    $com_nidErr = $com_mobileErr = "";
    if (!preg_match('/[0-9]{10}/', $com_nid)) {
        $com_nidErr = "NID must 10 digit";
    }
    if (!preg_match('/01[3|5|6|7|8|9][0-9]{8}/', $com_mobile)) {
        $com_mobileErr = "Mobile number not match";
    }
    if ($com_nidErr == "") {
        if ($com_mobileErr == "") {
            $sql = "INSERT INTO complainer( com_name, com_address, com_nid, com_email, com_password, com_mobile) VALUES ('$com_name','$com_address','$com_nid','$com_email','$com_password','$com_mobile')";
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
        } else {
            echo "<script>
                alert('Mobile number not match')
                </script>";
        }
    } else {
        echo "<script>
            alert('NID not match')
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

<body>




    <form action="" method="post">
        <div class="container">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Insert Complainer</p>

            <div class="input-group">

                <input type="text" name="com_name" class="form-control" placeholder="Complainer Name">
            </div>

            <div class="input-group">

                <input type="text" name="com_address" class="form-control" placeholder="Address">
            </div>

            <div class="input-group">

                <input id="input-group" type="text" name="com_nid" class="form-control" placeholder="NID">
            </div>

            <div class="input-group">

                <input id="input-group" type="text" name="com_email" class="form-control" placeholder="Email">
            </div>
            <div class="input-group">

                <input id="input-group" type="text" name="com_password" class="form-control" placeholder="Password">
            </div>
            <div class="input-group">

                <input id="input-group" type="text" name="com_mobile" class="form-control" placeholder="Mobile Number">
            </div>

            <div class="input-group">
                <button class="btn btn-warning" type="submit" name="insert"> Insert </button><br>
            </div>
        </div>
    </form>

</html>
