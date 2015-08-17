<?php
/*------includes for dbmysqlection to database-----*/
include('includes/config.php');

//var_dump($con);die();
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

// Register and get id back to use in course_table

if($id) {
//echo "New record created successfully. Last inserted ID is: " . $id;	

//print_r($chckdCourses);

for($i=0;$i<count($chckdCourses);$i++) {
	
//echo 'the student id is' . $id . '<br>';
//echo 'the course id is' . $chckdCourses[$i] . '<br>';

//$student_course = "INSERT INTO course_student(student_id, course_id)VALUES('$id','$chckdCourses[$i]')";

//inserting course_student data

//create variable to insert course_student data

$student_course = "INSERT INTO course_student (student_id, course_id) VALUES ($id, $chckdCourses[$i])";

//Run the query to insert course_student data

if(mysqli_query($con,$student_course))
		{
			echo "Successfully Inserted data <br>";
		}
		else{
			echo "Data not Inserted";
			//echo "Data not Inserted" . mysqli_error($con);die();
		}




}
	
}

// Register Student courses

// Register Student ends here

// Register course

// Register course

// Filter course_student and show students in a certain course table
}

if(isset($_POST['filter'])){

$selected_val = $_POST['courseselect'];  // Storing Selected Value In Variable

if($selected_val == "nothing"){
	
//echo "You have not selected a course to filter students"; // Displaying Selected Value
$message =  "You have not selected a course to filter students"; // Displaying Selected Value
$runQuery = false;

} else {

//echo "You have selected :" .$selected_val;  // Displaying Selected Value

//var_dump($_POST);die();

//echo $_POST["courseselect"];die();

//echo "test"; die();
//$query = "SELECT student.student_fname, student_sname FROM student, course, course_student WHERE student.student_id = course_student.student_id and course.course_id = course_student.course_id";

//$query = "SELECT student.student_fname, student_sname FROM student, course, course_student WHERE student.student_id = course_student.student_id and course.course_id = course_student.course_id";

$query = "SELECT student.student_fname, student_sname
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);


//var_dump($result);

/*
if (!$Course_StudentResult) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($Course_StudentResult) == 0) {
    echo "No courses found, nothing to print.";
    exit;
}


while($row = mysqli_fetch_array($Course_StudentResult)){
	echo $row['student_fname'] . '<br>';
}

}
*/

}

}

// Filter course_student and show students in a certain course table

/*-----deleting data from student table-----*/
if (isset($_GET['student_delete'])) {
	
$query='DELETE FROM student WHERE student_id = "'.$_GET['student_delete'].'"';
if(mysqli_query($con,$query))
{
			echo "Successfully deleted Student <br>";
}else{
			echo "Student not Inserted";
			//echo "Data not Inserted" . mysqli_error($con);die();
}

}


/*-----deleting data from course table-----*/
if (isset($_GET['course_delete'])) {
$query='DELETE FROM course WHERE course_id = "'.$_GET['course_delete'].'"';

if(mysqli_query($con,$query))
{
			echo "Successfully deleted course <br>";
}else{
			echo "course not Inserted";
			//echo "Data not Inserted" . mysqli_error($con);die();
}

}

?> 



