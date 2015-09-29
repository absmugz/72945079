<?php

/*------Connection variables------------*/

$servername = "localhost";
$username = "72945079";
$password = "password";
$database = "registration";

/*------Connection to mysql------------*/

$con = mysqli_connect($servername, $username, $password,$database);

/*------Check connection------------*/

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 