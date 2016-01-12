<?php
/**
 * Created by PhpStorm.
 * User: mithun.alinkil
 * Date: 07-11-2015
 * Time: 13:39
 */

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Note App</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>

<body>

<h2  align = 'center'> <?php print "ITMD562 Assignment 3 !"; ?></h2>
<h3 align = 'center'> <?php echo $_SESSION['user']; ?><?php print " Alinkil"; ?></h3>

<div align="center">
    <button id="add"  class="btn btn-primary" type="button" onClick="document.location.href='add.php'" >Add Notes</button>

    <button id="add"  class="btn btn-primary" type="button" onClick="document.location.href='view.php'">View Notes</button>
</div><br>
<div align = "center" ><strong>
        <?php date_default_timezone_set("America/Chicago");
        echo " " . date("l F d").", " .date("Y") ." "."-"." ".date("h:i:s a");
        ?></strong></div><br>
<div align = "center" >
<button id="add"  class="btn btn-primary" type="button" onClick="document.location.href='login.php?logout=yes'" >Logout</button>
</div>
</body>

</html>

