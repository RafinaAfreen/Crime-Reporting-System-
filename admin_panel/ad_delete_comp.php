<?php
require 'config.php';
$comp_id = $_GET['comp_id'];
$sql = "DELETE  FROM  complain WHERE comp_id='$comp_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "data deleted";
    header("Location:ad_comp_del_up.php");
} else {
    echo "data not deleted";
}
