<html>


<body>
    <?php include('ad_header.php'); ?>
    <table border="1" cellspacing="0" cellpadding="5" class="table table-bordered">
        <tr>
            <th>Police Station ID</th>
            <th>Police Station Name</th>
            <th>Police Station Area</th>
            <th>Police Station ZIP Code</th>
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
            $sql = "SELECT * FROM policestation";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result);

            if ($total != 0) {

                while (($fetch = mysqli_fetch_assoc($result))) {
                    echo "
					<tr>
					<td >" . $fetch['st_id'] . "</td>
					<td>" . $fetch['st_name'] . "</td>
					
					<td>" . $fetch['st_area'] . "</td>
					
					<td>" . $fetch['st_zip'] . "</td>
					<td><a href = 'ad_update_pol.php?st_id=$fetch[st_id]&st_name=$fetch[st_name]&st_area=$fetch[st_area]&st_zip=$fetch[st_zip]'><input type='submit' value='Update' id='upbtn'></a></td>
					<td><a href = 'ad_delete_pol.php?st_id=$fetch[st_id]'><input type='submit' value='Delete' id='delbtn'></a></td>
					
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