<?php

session_start();
include('com_header.php');
if (!isset($_SESSION['com_name'])) {
    header("Location: com_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>

    <a href="comp_insert.php" class="btn btn-danger ml-3">Insert Complain</a>
    <a href="show_com.php" class="btn btn-danger ml-3">Show Complain</a>

    <?php

    include('home_footer.php');
    ?>

</body>

</html>