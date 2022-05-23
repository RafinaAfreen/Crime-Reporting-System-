<html>


<body>
    <?php include('ad_header.php'); ?>
    <table border="1" cellspacing="0" cellpadding="5" class="table table-bordered">
        <tr>
            <th>Complainer ID</th>
            <th>Complainer Name</th>

            <th>Address</th>
            <th>NID</th>
            <th>Email</th>
            <th>Mobile Number</th>
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
            $sql = "SELECT * FROM complainer";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result);

            if ($total != 0) {
                while (($fetch = mysqli_fetch_assoc($result))) {
                    echo "
					<tr>
					<td >" . $fetch['com_id'] . "</td>
					<td>" . $fetch['com_name'] . "</td>
					<td>" . $fetch['com_address'] . "</td>
					<td>" . $fetch['com_nid'] . "</td>
					<td>" . $fetch['com_email'] . "</td>					
					<td>" . $fetch['com_mobile'] . "</td>
					
					<td><a href = 'ad_update_com.php?com_id=$fetch[com_id]&com_name=$fetch[com_name]&com_address=$fetch[com_address]&com_nid=$fetch[com_nid]&com_email=$fetch[com_email]&com_mobile=$fetch[com_mobile]'><input type='submit' value='Update' id='upbtn'></a></td>
					<td><a href = 'ad_delete_com.php?com_id=$fetch[com_id]'><input type='submit' value='Delete' id='delbtn'></a></td>
					
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