<html>


<body>
    <?php include('ad_header.php'); ?>
    <table border="1" cellspacing="0" cellpadding="5" class="table table-bordered">
        <tr>
            <th>Complain ID</th>
            <th>Complain Type</th>
            <th>Details</th>
            <th>Date</th>
            <th>Status</th>
            <th>Complainer ID</th>
            <th>Inspector ID</th>
            <th colspan="2" align="center">Opreation</th>
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
            $sql = "SELECT * FROM complain";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result);
            //echo $fetch['foodname']." ".$fetch['foodtype']." ".$fetch['description']." ".$fetch['price'];
            //total no of rows
            //echo $total
            if ($total != 0) {
                //echo"total has records";
                //fetch=mysqli_fetch_assoc($result);
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
					<td><a href = 'ad_update_comp.php?comp_id=$fetch[comp_id]&comp_type=$fetch[comp_type]&comp_details=$fetch[comp_details]&comp_date=$fetch[comp_date]&status=$fetch[status]&complainer_com_id=$fetch[complainer_com_id]&inspector_in_id=$fetch[inspector_in_id]'><input type='submit' value='Update' id='upbtn'></a></td>
					<td><a href = 'ad_delete_comp.php?comp_id=$fetch[comp_id]'><input type='submit' value='Delete' id='delbtn'></a></td>
					
					";
                }
            } else {
                //  echo"total has  no records";
            }
            ?>

        </tr>
    </table>

    <?php
    include('home_footer.php');
    ?>
</body>

</html>
