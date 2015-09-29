<?php
/*------connection to database-----*/

include('includes/config.php');

/*------connection to database-----*/

/*------Initialize variables-----*/

/*-----retrieving data from course table-----*/

$course_message = "";
$student_display_message = "";
$course_student_delete = "";
$message = "";

/*----- COURSE CRUD STARTS HERE -----*/

$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);

if (!$result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

/*-----retrieving data from course table-----*/

if (mysqli_num_rows($result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
}

/*----- COURSE CRUD ENDS HERE -----*/

/*----- STUDENT CRUD STARTS HERE -----*/

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

/*------Error variables-----*/

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
$student_telwError = '';
$student_cellError = '';
$emailError ="";

/*------Error variables-----*/

/*------Student variables-----*/

/*------Course variables-----*/

$coursesError = '';
$courses = array();

/*------Course variables-----*/

/*-----Insert Data into student table-----*/

if(isset($_POST['register'])){

/*-----student form data----*/

/*------Course data-----*/
$courses = $_POST['courses'];
/*------Course data-----*/

$student_id = $_POST['student_id'];
$surname = $_POST['surname'];
$initials = $_POST["initials"];
$student_name = $_POST['student_name'];
$title = $_POST['title'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$language = $_POST['language'];
$identity_number = $_POST['identity_number'];
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

/*-----intials validation-----*/

if (empty($_POST["initials"])) {
$initialsError = "Intials is required";
$error=true;
} else {
$initials = test_input($_POST["initials"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z]*$/",$initials)) {
$initialsError = "Only letters allowed";
}
}


/*-----intials validation-----*/

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

/*-----title validation-----*/
if (empty($_POST["title"])) {
$titleError = "Title is required";
$error=true;
} else {
$title = test_input($_POST["title"]);
}

/*-----title validation-----*/


/*-----language validation-----*/
if (empty($_POST["language"])) {
$languageError = "Language is required";
$error=true;
} else {
$language = test_input($_POST["language"]);
}

/*-----language validation-----*/


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

if ($student_id>0){

/*-----updating student and course data into the database-----*/

/*-----editing and deleting student courses data in the database-----*/

/*-----deleting the old selected courses -----*/

$query = "DELETE FROM course_student
                  WHERE student_id = $student_id";
mysqli_query($con,$query);

/*-----deleting the old selected courses -----*/

/*-----inserting the new selected courses -----*/

foreach ($courses as $course_id) {
   $query="INSERT INTO course_student(student_id, course_id)
                 VALUES($student_id, $course_id)";
   mysqli_query($con, $query);
}
/*-----editing and deleting student courses data in the database-----*/

/*-----query to update data into the database-----*/

		$query='UPDATE student SET
       student_sname="'.$surname.'",
	   student_initials="'.$initials.'",
	   student_title="'.$title.'",
       student_fname="'.$student_name.'",
       student_gender="'.$gender.'",
       student_email="'.$email.'",
	   student_lang="'.$language.'",
	   student_id_no="'.$identity_number.'",
	   student_telh="'.$student_telh.'",
	   student_telw="'.$student_telw.'",
	   student_cell="'.$student_cell.'",
	   student_address="'.$address.'"
       WHERE student_id="'.$student_id.'"
 ';
 
 /*-----query to update data into the database-----*/

/*-----editing student data into the database-----*/

if(mysqli_query($con,$query))
{			
$student_success_message = "Success! Thank you. Student records for " . $student_name . " " . $surname . " have been successfully updated";
}else{
$student_success_message = "Error! Student details for " . $student_name . " " . $surname . " have not been updated, please try again!";
}

/*-----editing student data into the database-----*/

/*-----editing data into the database-----*/

/*-----updating if ends here-----*/
}
/*-----updating if ends here-----*/
else{
/*-----query to insert data into the database-----*/

$query='INSERT INTO student(student_sname,student_initials,student_title,student_fname,student_gender,student_email,student_lang,student_id_no,student_telh,student_telw,student_cell,student_address
       )VALUES(
       "'.$surname.'",
	   "'.$initials.'",
	   "'.$title.'",
       "'.$student_name.'",
       "'.$gender.'",
       "'.$email.'",
	   "'.$language.'",
	   "'.$identity_number.'",
	   "'.$student_telh.'",
       "'.$student_telw.'",
	   "'.$student_cell.'",
	   "'.$address.'"
       )';

/*-----query to insert data into the database-----*/

/*-----insert data into the database-----*/

if (mysqli_query($con, $query)) {
    $last_id = mysqli_insert_id($con);
    $message = "New student record for " . $student_name . " " . $surname . " has bee created successfully!";
} else {
   $message = "Error: " . $sql . "<br>" . mysqli_error($con);
}

foreach ($courses as $course_id) {
   $query="INSERT INTO course_student(student_id, course_id)
                 VALUES($last_id, $course_id)";
   mysqli_query($con, $query);
}

/*-----insert data into the database-----*/

/*-----else ends here -----*/
}
/*-----else ends here -----*/
		
/*-----else insert data-----*/

}
/*-----else insert data-----*/

/*-----end of if register if statement-----*/
}
/*-----end of if register if statement-----*/

/*-----Insert Data into student table-----*/

/*-----retrieving data from student table-----*/

$query = "SELECT * FROM student ORDER BY student_id ASC";

$result_student = mysqli_query($con, $query);

if (!$result_student) {
    $student_display_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

if (mysqli_num_rows($result_student) == 0) {
    $student_display_message = "No students found, nothing to print.";
}

/*-----retrieving data from student table-----*/

/*----- student delete -----*/

if (isset($_GET['student_delete'])) { 
$student_id_delete = $_GET['student_delete'];

$query = "DELETE FROM student
WHERE student.student_id=$student_id_delete"; 

$query.=";"."DELETE FROM course_student
WHERE course_student.student_id=$student_id_delete"; 

if (mysqli_multi_query($con, $query)) {
    $course_student_delete = "Student deleted successfully";
} else {
    $course_student_delete = "Error deleting record: " . mysqli_error($con);
}

}

/*----- student delete -----*/

/*----- STUDENT CRUD ENDS HERE -----*/

?> 



