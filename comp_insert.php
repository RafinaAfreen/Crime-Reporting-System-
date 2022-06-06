<?php session_start();
include('com_header.php');
?>

<?php require 'config.php';
error_reporting(0);
if (isset($_POST['insert'])) {
    $comp_type = $_POST['comp_type'];
    $comp_details = $_POST['comp_details'];
    $com_comp_id = $_POST['com_comp_id'];
    $in_in_id = $_POST['in_in_id'];

    $sql = "INSERT INTO complain(comp_type, comp_details, complainer_com_id, inspector_in_id ) VALUES ('$comp_type','$comp_details','$com_comp_id','$in_in_id')";
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<title>Crime_Report_complain</title>

<body>
    <div class="container">
        <?php
        $sql1 = "SELECT com_id,com_name FROM complainer";
        $insert1 = mysqli_query($conn, $sql1);
        $sql2 = "SELECT in_id,in_name FROM inspector";
        $insert2 = mysqli_query($conn, $sql2);


        ?>
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header mt-10">
                        <h4>Add Complain</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Complain Type</label>
                                <input type="text" class="form-control" name="comp_type" id="exampleInputEmail1" value="<?php echo $comp_type; ?>" aria-describedby="emailHelp">

                            </div>
                            <div class="form-group  mb-3">
                                <label for="exampleInputPassword1" class="form-label">Complainer details</label>
                                <input type="text" name="comp_details" value="<?php echo $comp_details; ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group  mb-3">
                                <select class="form-select" aria-label="Default select example" name="com_comp_id" required>
                                    <option value="">Choose complainer</option>
                                    <?php
                                    foreach ($insert1 as $key => $complainer) {

                                    ?>
                                        <option value="<?php echo $complainer['com_id'] ?>"><?php echo $complainer['com_name'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group  mb-3">
                                <select class="form-select" aria-label="Default select example" name="in_in_id" required>
                                    <option value="">Choose inspector</option>
                                    <?php
                                    foreach ($insert2 as $key => $inspector) {

                                    ?>
                                        <option value="<?php echo $inspector['in_id'] ?>"><?php echo $inspector['in_name'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="insert" value="insert" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include('home_footer.php');
    ?>
</body>

</html>