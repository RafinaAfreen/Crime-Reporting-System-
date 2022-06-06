<?php
session_start();
include('com_header.php');
if (!isset($_SESSION['com_name'])) {
    header("Location: com_login.php");
}

?>
<html>


<body>

    <table border="1" cellspacing="0" cellpadding="5" class="table table-bordered">
        <tr>
            <th>Complain ID</th>
            <th>Complain Type</th>
            <th>Details</th>
            <th>Date</th>
            <th>Status</th>
            <th>Complainer ID</th>
            <th>Inspector ID</th>

            <style>
                /* body
{
  font-family: 'Orelega One', cursive;
  background-color: white;
  color: #191a19;
  text-align: center;
  border: 40px solid #FF9F1C;
  border-top: 0px;
  margin: 0px;
} */
                #delbtn {
                    background-color: red;
                    color: white;
                    font-size: 18px;
                    width: 130px;
                    height: 35px;
                }

                #upbtn {
                    background-color: green;
                    color: white;
                    font-size: 18px;
                    width: 130px;
                    height: 35px;
                }
            </style>

            <?php
            require 'config.php';
            $sql = "SELECT * FROM complain, complainer where complain.complainer_com_id = complainer.com_id;";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result);

            if ($total != 0) {

                while (($fetch = mysqli_fetch_assoc($result))) {
                    echo "
					<tr>
					<td >" . $fetch['comp_id'] . "</td>
					<td>" . $fetch['comp_type'] . "</td>
					<td>" . $fetch['comp_details'] . "</td>
					<td>" . $fetch['comp_date'] . "</td>
					<td>" . $fetch['status'] . "</td>
					<td>" . $fetch['complainer_com_id'] . "</td>
					<td>" . $fetch['inspector_in_id'] . "</td>
					
					";
                }
            } else {
                //  echo"total has  no records";
            }
            ?>

        </tr>
    </table>


</body>

</html>