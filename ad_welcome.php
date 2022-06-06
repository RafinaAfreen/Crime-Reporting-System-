<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome</title>
</head>

<body>
    <?php include('ad_header.php'); ?>
    <?php

    // session_start();

    if (!isset($_SESSION['ad_name'])) {
        header("Location: ad_login.php");
    }

    ?>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?php echo "<h1>Welcome " . $_SESSION['ad_name'] . "</h1>"; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex">
                <a class="nav-link active" aria-current="page" href="ad_logout.php">Admin Logout</a>
            </form>
        </div>
    </nav> -->

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insert Inspector</h5>

                    <a href="ad_insert_ins.php" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Delete Inspector</h5>

                    <a href="ad_in_del_up.php" class="btn btn-primary">Update/Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insert Police</h5>

                    <a href="ad_insert_pol.php" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Delete Police</h5>

                    <a href="ad_pol_del_up.php" class="btn btn-primary">Update/Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insert Complain</h5>

                    <a href="ad_insert_comp.php" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Delete Complain</h5>

                    <a href="ad_comp_del_up.php" class="btn btn-primary">Update/Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insert Complainer</h5>

                    <a href="ad_insert_com.php" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Delete Complainer</h5>

                    <a href="ad_com_del_up.php" class="btn btn-primary">Update/Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <a href="ad_insert_ins.php" class="btn btn-danger ml-3">insert inspector</a><br>
    <a href="ad_in_del_up.php" class="btn btn-danger ml-3">update delete inspector</a><br>
    <a href="ad_insert_pol.php" class="btn btn-danger ml-3">insert police station</a><br>
    <a href="ad_pol_del_up.php" class="btn btn-danger ml-3">update delete police station</a><br>
    <a href="ad_insert_comp.php" class="btn btn-danger ml-3">insert complain</a><br>
    <a href="ad_comp_del_up.php" class="btn btn-danger ml-3">update delete complain</a><br>
    <a href="ad_insert_com.php" class="btn btn-danger ml-3">insert complainer</a><br>
    <a href="ad_com_del_up.php" class="btn btn-danger ml-3">update delete complainer</a> -->
    <!-- <a href="ad_logout.php">Logout</a> -->

    <?php
    include('home_footer.php');
    ?>
</body>

</html>