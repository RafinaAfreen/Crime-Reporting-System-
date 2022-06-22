<?php
include('in_header.php');

session_start();
include('config.php');

// if (!isset($_SESSION['in_name'])) {
//     header("Location: in_login.php");
// }

?>


<?php


$com_id = $_SESSION['com_name'];

$sql = "select comp_type,comp_details,comp_date,status from complain,complainer where complainer.com_id='$com_id' and complainer_com_id = complainer.com_id";
$result = mysqli_query($conn, $sql);

// $result = mysqli_fetch_assoc($result);

?>


<div style="padding-top: 50px;" class="container">
    <div style="padding-top: 50px;" class="row">
        <?php
        foreach ($result as $key => $complain) {
        ?>
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $complain['comp_type'] ?></h5>
                        <p class="card-text"><?php echo $complain['comp_details'] ?></p>
                        <?php
                        if ($complain['status'] == 'initiated') {

                        ?>
                            <button class="btn btn-success">Initiated</button>

                        <?php
                        } else {
                        ?>
                            <button class="btn btn-success">Closed</button>
                        <?php

                        }

                        ?>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

</div>
