<?php

/*------connection to mysql------------*/

$con = mysqli_connect('localhost','72945079','password','registration');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 