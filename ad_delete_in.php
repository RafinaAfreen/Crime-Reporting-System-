<?php
require 'config.php';
$in_id = $_GET['in_id'];
$sql = "DELETE  FROM  inspector WHERE in_id='$in_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
  echo "data deleted";
  header("Location:ad_in_del_up.php");
} else {
  echo "data not deleted";
}
