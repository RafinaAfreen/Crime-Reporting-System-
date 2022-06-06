<?php
require 'config.php';
$st_id = $_GET['st_id'];
$sql = "DELETE  FROM policestation WHERE st_id='$st_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "data deleted";
    header("Location:ad_pol_del_up.php");
} else {
    echo "data not deleted";
}
