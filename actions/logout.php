<!-- LINK TO A PAGE -->


<?php

session_start();
session_unset();
session_destroy();


//send to the front
header("location: ../index.php");
die();


?>