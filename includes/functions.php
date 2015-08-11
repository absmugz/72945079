<?php
/*------includes for dbmysqlection to database-----*/
include('includes/config.php');

/* Check dbmysqlection
if (!$dbmysql) {
    die("dbmysqlection failed: " . mysql_dbmysqlect_error());
}

$sql = "INSERT INTO student (student_sname, student_fname, student_email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysql_query($sql)) {
    $last_id = mysql_insert_id($dbmysql);
    echo "New record created successfully. Last inserted ID is: " . $last_id;

$sqlcourse = "INSERT INTO course_student (student_id, course_id)
VALUES ('$last_id', '1')";
if (mysql_query($sqlcourse)) {

}
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($dbmysql);
}

mysql_close($dbmysql);*/

$sname = $_POST['surname'];
$initials = $_POST['initials'];
$name = $_POST['name'];


$form_data = array(
    'surname' => $sname,
    'initials' => $initials,
    'name' => $name
);


$studentData = array("student_sname"=>$sname,"student_initials"=>$initials,"student_fname"=>$name);
$studentTable ="student";

// Insert Data within table by accepting TableName and Table column => Data as associative array
	function insertData($connection, $tblname, array $val_cols){

		$keysString = implode(", ", array_keys($val_cols));

		// print key and value for the array
		$i=0;
		foreach($val_cols as $key=>$value) {
			$StValue[$i] = "'".$value."'";
		    $i++;
		}

		$StValues = implode(", ",$StValue);
		
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if(mysqli_query($connection,"INSERT INTO $tblname ($keysString) VALUES ($StValues)"))
		{
			echo "Successfully Inserted data<br>";
			//echo "New record has id: " . mysqli_insert_id($connection);
			$last_id = mysqli_insert_id($connection);
		}
		else{
			echo "Data not Inserted";
		}
		
		return $last_id;
	}
// Insert Data from Table


// Register Student

if(isset($_POST['register'])){
	
$id = insertData($con,$studentTable, $studentData);

if($id) {
echo "New record created successfully. Last inserted ID is: " . $id;	
}

// Register Student ends here

// Register course

}



?> 



