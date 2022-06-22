<?php


session_start();
include('config.php');
include('in_header.php');
if (!isset($_SESSION['in_name'])) {
    header("Location: in_login.php");
}

?>

<?php
if (isset($_POST['submit'])) {
    $comp_id = isset($_POST['comp_id']) ? $_POST['comp_id'] : '';

    $sql = "UPDATE complain SET status='closed' WHERE complain.comp_id = '$comp_id'";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
            alert('data updated!');
            </script>";
        header("Location:in_welcome.php");
        die;
    } else {
        echo "failed";
    }
}

?>

<?php
if (!isset($_POST['submit'])) {

    $comp_id = $_GET['comp_id'];

    $sql = "select * from complain where comp_id='$comp_id'";
    $result = mysqli_query($conn, $sql);

    $result = mysqli_fetch_assoc($result);
}

?>


<div style="padding-top: 50px;" class="container">

    <div class="card text-center">
        <div class="card-header">
            Complain Details
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['comp_type'] ?></h5>
            <p class="card-text"><?php echo $result['comp_details'] ?></p>

            <?php
            if ($result['status'] == 'initiated') {

            ?>
                <form action="comp_view_page.php" method="post">
                    <input type="hidden" name="comp_id" value="<?php echo $result['comp_id'] ?>">
                    <input class="btn btn-success" type="submit" name="submit" value="Case Closed">
                    <a href="in_welcome.php" class="btn btn-primary">Cancel</a>
                </form>

            <?php
            } else {
            ?>
                <button class="btn btn-success">Closed</button>
                <a href="in_welcome.php" class="btn btn-primary">Cancel</a>
            <?php

            }

            ?>

        </div>
        <div class="card-footer text-muted">
            <?php echo "Date: " . $result['comp_date'] ?>
        </div>
    </div>
</div>

<?php
include('home_footer.php');
?>
