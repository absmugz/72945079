<?php

/*------connection to mysql------------*/

	$dbmysql = @mysql_connect('localhost', '72945079', 'password');

/*------error message if connection failed------------*/
if (!$dbmysql) {

	die('Could not connect: ' . mysql_error());
}

/*------selecting database------------*/

if(!mysql_select_db('registration',$dbmysql)){

	die('could not connect:' . mysql_error());

}

?>