<?php 
session_start();
session_destroy();

header("location:mhs_index.php");
 ?>