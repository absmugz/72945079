<?php
/*------includes for dbmysqlection to database-----*/

include('includes/config.php');

/*------includes for dbmysqlection to database-----*/


/*------Initialize variables-----*/
$male_status = 'unchecked';
$female_status = 'unchecked';

$runQuery ='';
$message='';
$StudentSucceesMessage='';
$Course_StudentResult='';

/*------Course variables-----*/
$coursesError = '';
$courses = array();
/*-----setting variables for course form data-----*/
$coursename= '';
/*------Course variables-----*/

/*------Student variables-----*/
$student_id = '';
$surname = '';
$initials = '';
$student_name = '';
$title = '';
$dob = '';
$gender = '';
$language = '';
$identity_number = '';
$address = '';
$student_telh = '';
$student_telw = '';
$student_cell = '';
$email = '';

/*------Student variables-----*/

/*------send mail variables-----*/

$subject_mail = '';
$subject_message = '';

/*------send mail variables-----*/

/*------Error variables-----*/

/*------Student variables-----*/

$surnameError = '';
$initialsError = '';
$nameError = '';
$titleError = '';
$dobError = '';
$genderError = '';
$languageError = '';
$identity_numberError = '';
$addressError = '';
$student_telhError = '';
$cell_numberError = '';
$emailError ="";
/*------Student variables-----*/

/*------Error variables-----*/


/*------Initialize variables-----*/

/*-----retrieving data from course table-----*/

$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);
// Fetch all
//var_dump(mysqli_fetch_all($result_course));die();


if (!$result_course) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($result_course) == 0) {
    echo "No courses found, nothing to print.";
    exit;
}

/*-----retrieving data from course table-----*/

/*-----Insert Data into student table-----*/

if(isset($_POST['register'])){

/*-----student form data----*/

/*------Course data-----*/
$courses = $_POST['courses'];
/*------Course data-----*/

$student_id = $_POST['student_id'];
$surname = $_POST['surname'];
$initials = $_POST['initials'];
$student_name = $_POST['student_name'];
$title = $_POST['title'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$language = $_POST['language'];
$identity_number = $_POST['identity_number'];
$address = $_POST['address'];
$address = $_POST['address'];
$student_telh = $_POST['student_telh'];
$student_telw = $_POST['student_telw'];
$student_cell = $_POST['student_cell'];
$email = $_POST['email'];


/*-----student form data-----*/
	
/*-----student form validation-----*/

$error = false;
$isChecked = false;

/*-----course form validation-----*/

if(empty($_POST['courses']) || count($_POST['courses']) < 1)
		{
			$coursesError = "Please select at least 1 course";
			$isChecked = true;
            $courses = array();
		}
else{
$courses = $_POST['courses'];
}

/*-----course form validation-----*/

/*-----surname validation-----*/

if (empty($_POST["surname"])) {
$surnameError = "Surname is required";
$error=true;
} else {
$surname = test_input($_POST["surname"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
$surnameError = "Only letters and white space allowed";
}
}

/*-----surname validation-----*/

/*-----name validation-----*/

if (empty($_POST["student_name"])) {
$nameError = "Name is required";
$error=true;
} else {
$name = test_input($_POST["student_name"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameError = "Only letters and white space allowed";
}
}

/*-----name validation-----*/

/*-----gender validation-----*/

if (empty($_POST["gender"])) {
$genderError = "Gender is required";
$error=true;
} else {
$gender = test_input($_POST["gender"]);
}
if ($gender == 'male') {
$male_status = 'checked';
}
else if ($gender == 'female') {
$female_status = 'checked';
}

/*-----gender validation-----*/


/*-----email validation-----*/

if (empty($_POST["email"])) {
$emailError = "Email is required";
$error=true;
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$emailError = "Invalid email format";
}
}
/*-----email validation-----*/

/*-----student form validation-----*/


/*-----if statement to insert data-----*/
if(!$error) {
/*	
var_dump($courses) .'<br>';
echo $surname .'<br>';
echo $name .'<br>';
echo $gender .'<br>';
echo $email .'<br>';*/

// Register Student

/* $studentData = array("student_sname"=>$surname,"student_initials"=>$initials,"student_fname"=>$name);
$studentTable ="student";
	
$id = insertDataGetId($con,$studentTable, $studentData);*/

if ($student_id>0){

/*-----updating data into the database-----*/

/*-----query to update data into the database-----*/

		$query='UPDATE student SET
       student_sname="'.$surname.'",
       student_fname="'.$student_name.'",
       student_gender="'.$title.'",
       student_email="'.$email.'"
       WHERE student_id="'.$student_id.'"
 ';
 
 /*-----query to update data into the database-----*/

/*-----insert data into the database-----*/

if(mysqli_query($con,$query))
{			
$message = "Success! Thank you. Student records for " . $student_name . " " . $surname . " have been successfully updated";
}else{
$message = "Error! Student details for " . $student_name . " " . $surname . " have not been updated, please try again!";
}
/*-----insert data into the database-----*/

/*-----updating if ends here-----*/
}
/*-----updating if ends here-----*/
else{
/*-----query to insert data into the database-----*/

$query='INSERT INTO student(student_sname,student_fname,student_gender,student_email
       )VALUES(
       "'.$surname.'",
       "'.$student_name.'",
       "'.$gender.'",
       "'.$email.'"
       )';

/*-----query to insert data into the database-----*/

/*-----insert data into the database-----*/

if (mysqli_query($con, $query)) {
    $last_id = mysqli_insert_id($con);
    $message = "New student record for " . $student_name . " " . $surname . " has bee created successfully!";
	 //$message = "New student record for" . $student_name . " " . $surname . " has bee created successfully. Last inserted ID is: " . $last_id;
} else {
   $message = "Error: " . $sql . "<br>" . mysqli_error($con);
}


foreach ($courses as $course_id) {
   $query="INSERT INTO course_student(student_id, course_id)
                 VALUES($last_id, $course_id)";
   mysqli_query($con, $query);
}



mysqli_close($con);
/*-----insert data into the database-----*/

/*-----else ends here -----*/
}
/*-----else ends here -----*/


// Register Student ends here

// Register Student courses

// Register and get id back to use in course_table

/*
if($id) {
for($i=0;$i<count($chckdCourses);$i++) {
$student_course = "INSERT INTO course_student (student_id, course_id) VALUES ($id, $chckdCourses[$i])";
if(mysqli_query($con,$student_course))
		{
			echo "Successfully Inserted data <br>";
		}
		else{
			echo "Data not Inserted";
			//echo "Data not Inserted" . mysqli_error($con);die();
		} 
		} }*/
		
/*-----else insert data-----*/

}
/*-----else insert data-----*/

/*-----end of if register if statement-----*/
}
/*-----end of if register if statement-----*/








/*-----Insert Data into student table-----*/

/*-----Filter course_student and show students in a certain course table-----*/

if(isset($_POST['filter'])){

$runQuery = true;
$selected_val = $_POST['courseselect'];

if($selected_val == "nothing"){
   $message =  "You have not selected a course to filter students"; // Displaying Selected Value
   $runQuery = false;
}


if ($runQuery) {
	
	

$query = "SELECT student.student_fname, student_sname
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);


}
else
{
  $message;
}

}

/*-----Filter course_student and show students in a certain course table-----*/

/*-----send mail to students-----*/

if(isset($_POST['sendmail'])){

$runQuery = true;
$selected_val = $_POST['courseselect'];

if($selected_val == "nothing"){
   $message =  "You have not selected a course to send mail to students"; // Displaying Selected Value
   $runQuery = false;
}


if ($runQuery) {
	
	

$query = "SELECT student.student_fname, student_sname
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);


}
else
{
  $message;
}

}

/*-----send mail to students-----*/

/*-----editing data from student table-----*/
if (isset($_GET['student_edit'])) {
$student_id_edit = $_GET['student_edit'];

/*$query = "SELECT * FROM student, course_student, course
          WHERE student.student_id = $student_id_edit 
          AND $student_id_edit = course_student.student_id";

		  $query = "SELECT * FROM student
		  INNER JOIN course_student
		  ON student.student_id=course_student.student_id
		  WHERE student.student_id = $student_id_edit;"; */
		  
		  $query = "SELECT * FROM student
          WHERE student.student_id = $student_id_edit";
		  
		  
		  		  
//$query='SELECT * FROM student WHERE student_id = "'.$_GET['student_edit'].'"';
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){ 
//var_dump($row);
//print_r($row['course_id']);die();
//$courses = $row['courses'];
$student_id = $row['student_id'];
$surname = $row['student_sname'];
$student_name = $row['student_fname'];
$gender = $row['student_gender'];
$email = $row['student_email'];
/*$title = $row['title'];
$initials = $row['initials'];
$dob = $row['dob'];
$gender = $row['gender'];
$language = $row['language'];
$identity_number = $row['identity_number'];
$address = $row['address'];
$address = $row['address'];
$phonenumber = $row['phonenumber'];
$cell_number = $row['cell_number'];
$email = $row['email'];*/

}

 //$query = "SELECT * FROM course_student
 //         WHERE course_student.student_id = $student_id_edit";
		  
$query = "SELECT course_student.course_id, course_student.student_id, course.course_name, course.course_id
FROM course_student
INNER JOIN course
ON course_student.course_id=course.course_id
WHERE course_student.student_id = $student_id_edit";

$result_course = mysqli_query($con, $query);
if (!$result_course) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($result_course) == 0) {
    echo "No courses found, nothing to print.";
    exit;
}

}
/*-----editing data from student table-----*/

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
/*-----deleting data from student table-----*/

/*-----editing data from course table-----*/

/*if (isset($_GET['course_edit'])) {	
$query='SELECT * FROM course WHERE course_id = "'.$_GET['course_edit'].'"';
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_array($result);
var_dump($row);die();
}*/

/*-----checking if course button has been clicked and adding form data-----*/


if (isset($_POST['submitcourse']))
{
/*-----setting variables for course form data-----*/
$coursename=$_POST['coursename'];

if ($_POST['item_id']>0)
{
/*-----update data into the database-----*/
$querycourse='UPDATE course SET
course_name = "'.$coursename.'"
WHERE course_id = "'.$_POST['item_id'].'"
';

}else{
		/*-----inserting data into the database-----*/
$querycourse='INSERT INTO course(course_name
       )VALUES(
       "'.$coursename.'"
         )';
}

		 
 if(mysqli_query($con,$querycourse)){
		echo mysql_error();
}




/*-----to avoid records from duplicating after insertion-----*/

}



/*-----editing data from course table-----*/

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
/*-----deleting data from course table-----*/

/*------functions-----*/

/*------validation function-----*/

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

/*------validation function-----*/

/*------functions-----*/

?> 



