<?php


session_start();
include('config.php');
include('in_header.php');
if (!isset($_SESSION['in_name'])) {
    header("Location: in_login.php");
}

?>
<style>
    #delbtn {
        background-color: red;
        color: white;
        font-size: 18px;
        width: 130px;
        height: 35px;
    }
</style>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome</title>
</head> -->

<!-- <body> -->
<?php
$sql = "select * from complain";
$result = mysqli_query($conn, $sql);



?>
<div class="container">
    <div style="padding-top: 30px;" class="row">
        <div class="col-sm-12">
            <h1>Complain</h1>
        </div>
    </div>




    <div style="padding-top: 50px;" class="row">
        <?php
        foreach ($result as $key => $complain) {
        ?>
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $complain['comp_type'] ?></h5>
                        <p class="card-text"><?php echo $complain['comp_details'] ?></p>
                        <a href='comp_view_page.php?comp_id=<?php echo $complain['comp_id'] ?>' class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
</div>

<?php
include('home_footer.php');
?>

<!-- </body> -->
<!-- 
</html> -->
