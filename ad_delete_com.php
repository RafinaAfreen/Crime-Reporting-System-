<?php
require 'config.php';
$com_id = $_GET['com_id'];
$sql = "DELETE  FROM complainer WHERE com_id='$com_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "data deleted";
    header("Location:ad_com_del_up.php");
} else {
    echo "data not deleted";
}
