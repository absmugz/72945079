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


$courses = $_POST['courses'];
$chckdCourses = (array_values($courses));
$sname = $_POST['surname'];
$initials = $_POST['initials'];
$name = $_POST['name'];



$studentData = array("student_sname"=>$sname,"student_initials"=>$initials,"student_fname"=>$name);
$studentTable ="student";

// Insert Data within table by accepting TableName and Table column => Data as associative array and get id of inserted

	function insertDataGetId($connection, $tblname, array $val_cols){

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
// Insert Data within table by accepting TableName and Table column => Data as associative array and get id of inserted

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
		}
		else{
			echo "Data not Inserted";
		}
	}
// Insert Data within table by accepting TableName and Table column => Data as associative array
// Register Student

if(isset($_POST['register'])){

// Register Student
	
$id = insertDataGetId($con,$studentTable, $studentData);

// Register Student ends here

// Register Student courses

if($id) {
echo "New record created successfully. Last inserted ID is: " . $id;	


//print_r($chckdCourses);

for($i=0;$i<count($chckdCourses);$i++) {
echo 'the student id is' . $id . '<br>';
echo 'the course id is' . $chckdCourses[$i] . '<br>';

//$student_course = "INSERT INTO course_student(student_id, course_id)VALUES('$id','$chckdCourses[$i]')";


//inserting data order

//$sql2 = "INSERT INTO tbl_QuestionSelected (`QuestionID`) VALUES (".$ids_list.")";
//Run the query 


}
	
}

// Register Student courses

// Register Student ends here

// Register course

// Register course

}



?> 



