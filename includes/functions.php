<?php
/*------connection to database-----*/

include('includes/config.php');

/*------connection to database-----*/

/*------Initialize variables-----*/

/*-----retrieving data from course table-----*/

$course_message = "";
$student_display_message = "";
$course_student_delete = "";
$student_success_message = "";
$student_error_message = "";
$archive = "";
$archive_delete = "";
$course_delete  = "";
$filter_message  = "";
$filterQuery  = "";
$delete_student_id_from_course_student_from_db_message  = "";
$mail_message  = "";
$mailQuery  = "";

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
$day = '';
$month = '';
$year = '';

/*------Error variables-----*/
$registration_error = '';
$CourseIsChecked  = '';
$surnameError = '';
$initialsError = '';
$nameError = '';
$titleError = '';
$dobError = '';
$dayError = '';
$monthError = '';
$yearError = '';
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

/*------send mail variables-----*/

$subject_mail = '';
$message_mail = '';

/*------send error variables-----*/

$subject_mailError  = '';
$message_mailError  = '';

/*------send mail variables-----*/

$coursename  = '';
$course_descr  = '';
$course_cost  = '';
$course_duration  = '';

/*-----Insert Data into student table-----*/
/*-----if register starts here -----*/
if(isset($_POST['register'])){


$registration_error = false;
$CourseIsChecked = false;

/*------Course data-----*/
//$courses = $_POST['courses'];
$courses = isset($_POST['courses']) ? $_POST['courses'] : '';
/*------Course data-----*/

$student_id = $_POST['student_id'];
$surname = $_POST['surname'];
$initials = $_POST["initials"];
$student_name = $_POST['student_name'];
$title = $_POST['title'];

//$day = $_POST['day'];
//$month = $_POST['month'];
//$year = $_POST['year'];

$day = intval($_POST['day']);
$month = intval($_POST['month']);
$year = intval($_POST['year']);

$dob = date("Y-m-d", mktime(0,0,0,$month, $day, $year));
//$dob = $_POST['dob'];
//$gender = $_POST['gender'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$language = $_POST['language'];
$identity_number = $_POST['identity_number'];
$address = $_POST['address'];
$student_telh = $_POST['student_telh'];
$student_telw = $_POST['student_telw'];
$student_cell = $_POST['student_cell'];
$email = $_POST['email'];

/*-----student form validation-----*/

/*-----course form validation-----*/
 
if (empty($_POST['courses']))
		{
			$coursesError = "Please select at least 1 course";
			$CourseIsChecked = true;
            $courses = array();
		}
else{
$courses = $_POST['courses'];
}



/*-----surname validation-----*/

if (empty($_POST["surname"])) {
$surnameError = "Surname is required";
$registration_error=true;
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
$registration_error=true;
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
$registration_error=true;
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
$registration_error=true;
} else {
$gender = test_input($_POST["gender"]);
}

/*-----title validation-----*/
if (empty($_POST["title"])) {
$titleError = "Title is required";
$registration_error=true;
} else {
$title = test_input($_POST["title"]);
}

/*-----title validation-----*/


/*-----dob validation-----*/
if (empty($_POST["day"])) {
$dobError = "All date of birth fields are required";
$registration_error=true;
} else {
$day = test_input($_POST["day"]);
}

if (empty($_POST["month"])) {
$dobError = "All date of birth fields are required";
$registration_error=true;
} else {
$month = test_input($_POST["month"]);
}

if (empty($_POST["year"])) {
$dobError = "All date of birth fields are required";
$registration_error=true;
} else {
$year = test_input($_POST["year"]);
}

/*-----dob validation-----*/

/*-----language validation-----*/
if (empty($_POST["language"])) {
$languageError = "Language is required";
$registration_error=true;
} else {
$language = test_input($_POST["language"]);
}

/*-----language validation-----*/

/*-----student id validation-----*/

 if (empty($_POST["identity_number"])) {
     $identity_numberError = "ID number is required";
     $registration_error = true;
 
   } else {
       $identity_number = test_input($_POST["identity_number"]);
       // check if cell number is entered in the correct format specified.
     if (!preg_match("/^[0-9]{10}$/",$identity_number)) {
	$identity_numberError = "Only 10 digits and NO white space are allowed.";
	$registration_error = true;	
   }
   }

/*-----student id validation-----*/

/*-----student home tele number validation-----*/


 if (empty($_POST["student_telh"])) {
     $student_telhError = "student home telephone number is required";
     $registration_error = true;
 
   } else {
       $student_telh = test_input($_POST["student_telh"]);
       // check if cell number is entered in the correct format specified.
     if (!preg_match("/^[0-9]{10}$/",$student_telh)) {
	$student_telhError = "Only 10 digits and NO white space are allowed.";
	$registration_error = true;	
   }
   }


/*-----student home tele number validation-----*/

/*-----student work tele number validation-----*/

 if (empty($_POST["student_telw"])) {
     $student_telwError = "student work telephone number is required";
     $registration_error = true;
 
   } else {
       $student_telw = test_input($_POST["student_telw"]);
       // check if cell number is entered in the correct format specified.
     if (!preg_match("/^[0-9]{10}$/",$student_telh)) {
	$student_telwError = "Only 10 digits and NO white space are allowed.";
	$registration_error = true;	
   }
   }

/*-----student work tele number validation-----*/

/*-----student work cell number validation-----*/


 if (empty($_POST["student_cell"])) {
     $student_cellError = "student cell number is required";
     $registration_error = true;
 
   } else {
       $student_cell = test_input($_POST["student_cell"]);
       // check if cell number is entered in the correct format specified.
     if (!preg_match("/^[0-9]{10}$/",$student_cell)) {
	$student_cellError = "Only 10 digits and NO white space are allowed.";
	$registration_error = true;	
   }
   }

/*-----student work cell number validation-----*/

/*-----student address validation-----*/

if (empty($_POST["address"])) {
$addressError = "address is required";
$registration_error=true;
} else {
$address = test_input($_POST["address"]);
}

/*-----student address validation-----*/


/*-----email validation-----*/

if (empty($_POST["email"])) {
$emailError = "Email is required";
$registration_error=true;
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$emailError = "Invalid email format";
}
}
/*-----email validation-----*/

/*-----student form validation-----*/

/*-----if all student form validation has passed -----*/

if(!$registration_error && !$CourseIsChecked) {

/*-----updating student and course data into the database-----*/

if ($student_id>0){

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

/*-----inserting the new selected courses -----*/

/*-----editing and deleting student courses data in the database-----*/

/*-----query to update data into the database-----*/

		$query='UPDATE student SET
       student_sname="'.$surname.'",
	   student_initials="'.$initials.'",
	   student_title="'.$title.'",
	   student_dob="'.$dob.'",
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
$student_success_message = '<div class="success_message">' . "Success! Thank you. Student records for " . $student_name . " " . $surname . " have been successfully updated".'</div>';
}else{
$student_error_message = '<div class="error_message">'."Error! Student details for " . $student_name . " " . $surname . " have not been updated, please try again!".'</div>';
}

/*-----editing student data into the database-----*/

/*-----editing data into the database-----*/
}
/*-----updating if ends here-----*/
/*-----updating if ends here-----*/
else{
/*-----query to insert data into the database-----*/
//var_dump($dob);die();
$query='INSERT INTO student(student_sname,student_initials,student_title,student_dob,student_fname,student_gender,student_email,student_lang,student_id_no,student_telh,student_telw,student_cell,student_address
       )VALUES(
       "'.$surname.'",
	   "'.$initials.'",
	   "'.$title.'",
	   "'.$dob.'",
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
    //$student_success_message = "New student record for " . $student_name . " " . $surname . " has bee created successfully!";
	$student_success_message = '<div class="success_message">' . "Success! Thank you. Student records for " . $student_name . " " . $surname . " have been successfully updated".'</div>';
	 //$message = "New student record for" . $student_name . " " . $surname . " has bee created successfully. Last inserted ID is: " . $last_id;
} else {
   //$student_error_message = "Error: " . $sql . "<br>" . mysqli_error($con);
   $student_error_message = '<div class="error_message">'."Error! Student details for " . $student_name . " " . $surname . " have not been inserted, please try again!".'</div>';
}

foreach ($courses as $course_id) {
   $query="INSERT INTO course_student(student_id, course_id)
                 VALUES($last_id, $course_id)";
   mysqli_query($con, $query);
}
/*-----insert data into the database-----*/
}
/*-----else ends here -----*/
}
/*-----if all student form validation has passed -----*/
}
/*-----if register ends here -----*/



$query = "SELECT * FROM student ORDER BY student_id ASC";

$result_student = mysqli_query($con, $query);

if (!$result_student) {
    $student_display_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

if (mysqli_num_rows($result_student) == 0) {
    $student_display_message = "No students found, nothing to print.";
}

/*-----retrieving data from student table-----*/

/*-----editing data from student table-----*/
if (isset($_GET['student_edit'])) {

$student_id_edit = $_GET['student_edit'];
		  
$query = "SELECT * FROM student
WHERE student.student_id = $student_id_edit";

$result_student = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result_student)){ 

$student_id = $row['student_id'];
$surname = $row['student_sname'];
$initials = $row['student_initials'];
$title = $row['student_title'];

//dob processing

$student_dob = $row['student_dob'];
$dateStr = $student_dob;
$dob = date_parse_from_format('Y-m-d"', $dateStr);

$day = $dob['day'];
$month = $dob['month'];
$year = $dob['year'];

//dob processing

$student_name = $row['student_fname'];
$gender = $row['student_gender'];
$email = $row['student_email'];
$language = $row['student_lang'];
$identity_number = $row['student_id_no'];
$student_telh = $row['student_telh'];
$student_telw = $row['student_telw'];
$student_cell = $row['student_cell'];
$address = $row['student_address'];

}


$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);

if (!$result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

if (mysqli_num_rows($result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
}

$query = "SELECT course_student.course_id, course_student.student_id, course.course_name, course.course_id
FROM course_student
INNER JOIN course
ON course_student.course_id=course.course_id
WHERE course_student.student_id = $student_id_edit";

$registered_result_course = mysqli_query($con, $query);

while($row = mysqli_fetch_array($registered_result_course)){
	$courses[] = $row['course_id'];
}

if (!$registered_result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}
if (mysqli_num_rows($registered_result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
}
/*-----errors and updating student, deleting courses and inserting new courses-----*/
}
/*-----editing data from student table-----*/

/*----- student delete -----*/

if (isset($_GET['student_delete'])) { 

$student_id_delete = $_GET['student_delete'];

$query = "DELETE FROM course_student
WHERE course_student.student_id=$student_id_delete";

mysqli_query($con, $query);

$query = "DELETE FROM student
WHERE student.student_id=$student_id_delete";

$delete_student_from_db = mysqli_query($con, $query);

if ($delete_student_from_db) {
    $course_student_delete = '<div class="success_message">' . "Record deleted successfully" . '</div>';
} else {
    $course_student_delete = '<div class="error_message">' . "Error deleting record: " . mysqli_error($con) . '</div>';
}

$query = "SELECT * FROM student ORDER BY student_id ASC";

$result_student = mysqli_query($con, $query);

if (!$result_student) {
    $student_display_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}
 
if (mysqli_num_rows($result_student) == 0) {
    $student_display_message = "No students found, nothing to print.";
}

}

/*----- student delete -----*/

/*----- STUDENT CRUD ENDS HERE -----*/

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

/*-----checking if course button has been clicked and adding form data-----*/

/*-----deleting data from course table-----*/

if (isset($_GET['course_delete'])) {
//$query='DELETE FROM course WHERE course_id = "'.$_GET['course_delete'].'"';

//$delete_course = $_GET['course_delete'];

//$query = "DELETE FROM course where course_id NOT IN (SELECT course_student.course_id FROM course_student)";

$delete_course = $_GET['course_delete'];

//$query = "DELETE FROM course where course_id NOT IN (SELECT course_student.course_id FROM course_student)";

$query = "SELECT COUNT(course_id) FROM course_student
WHERE course_id=$delete_course"; 
$result = mysqli_query($con, $query);
if($result)
{
			//echo "Successfully deleted course <br>";
			$row = mysqli_fetch_array($result);
            //var_dump($row["COUNT(course_id)"]);die();
			if ($row["COUNT(course_id)"] > 0) {
				
				$archive = '<a class="linkButton" href="">Archive</a>';
				$archive_delete = '<a class="linkButton" href="' . $_SERVER['PHP_SELF'] . '?delete=' . $delete_course . ' "'.$delete_course.'"">Delete</a>';
				

} else {
					

$query = "DELETE FROM course WHERE course_id=$delete_course"; 
if (mysqli_query($con, $query )) {
    $course_delete = '<div class="success_message">' . "Record deleted successfully" . '</div>';
} else {
    $course_delete =  '<div class="error_message">' . "Error deleting record: " . mysqli_error($con) . '</div>' ;
}

$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);

if (!$result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

if (mysqli_num_rows($result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
}



}

}

}

/*-----deleting course function-----*/

	
if (isset($_GET['delete'])) {

$delete_course = $_GET['delete'];

$query = "DELETE FROM course_student
WHERE course_id=$delete_course"; 

mysqli_query($con, $query);

$query = "DELETE FROM course
WHERE course_id=$delete_course"; 

$delete_course_from_db = mysqli_query($con, $query);

if ($delete_course_from_db) {
    $course_delete = '<div class="success_message">' . "Record deleted successfully" . '</div>';
} else {
    $course_delete = '<div class="error_message">' . "Error deleting record: " . mysqli_error($con) . '</div>';
}

$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);
// Fetch all
//var_dump(mysqli_fetch_all($result_course));die();

if (!$result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    //exit;
}

if (mysqli_num_rows($result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
   // exit;
}

}

/*-----deleting course function-----*/

/*-----deleting data from course table-----*/

/*----- COURSE CRUD ENDS HERE -----*/

/*-----Filter course_student and show students in a certain course table-----*/

if(isset($_POST['filter'])){

$filterQuery = true;
$selected_val = $_POST['courseselect'];

if($selected_val == "nothing"){
   $filter_message =  "You have not selected a course to filter students"; // Displaying Selected Value
   $filterQuery = false;
}


if ($filterQuery) {
	
	

$query = "SELECT student.student_id, student_fname, student_sname
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);


}
else
{
  $filter_message;
}

}

/*-----Filter course_student and show students in a certain course table-----*/

/*-----delete student from selected course-----*/

if (isset($_GET['student_delete_from_course'])) {
$selected_val = $_GET['course_id'];
$student_delete_from_course = $_GET['student_delete_from_course'];

//var_dump($selected_val);die();

//echo $student_delete_from_course;die();

$query = "DELETE FROM course_student
WHERE student_id=$student_delete_from_course AND course_id=$selected_val"; 


$delete_student_id_from_course_student_from_db = mysqli_query($con, $query);

if ($delete_student_id_from_course_student_from_db) {
	
    $delete_student_id_from_course_student_from_db_message = '<div class="success_message">' . "Record deleted successfully" . '</div>';
	
} else {
	
    $delete_student_id_from_course_student_from_db_message = '<div class="error_message">' . "Error deleting record: " . mysqli_error($con) . '</div>';
	
}

$query = "SELECT * FROM course
WHERE course_id=$selected_val";

$result_course = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result_course)){
			

echo $id = $row['course_id'];
echo $name = $row['course_name'];

}


}

/*-----delete student from selected course-----*/

/*-----send mail to students-----*/

/*-----send mail to students from localhost-----*/

require("phpmailer/PHPMailerAutoload.php"); // path to the PHPMailer class
 
$mail = new PHPMailer();  
 
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "absmugz09@gmail.com"; // SMTP username
$mail->Password = "makabongwe@01"; // SMTP password 

/*-----send mail to students from localhost-----*/

if(isset($_POST['sendmail'])){

$error = false;
$subject_mail = $_POST["subject"];
$message_mail = $_POST["message"];

/*-----subject validation-----*/

if (empty($_POST["subject"])) {
$subject_mailError = "Subject is required";
$error=true;
} else {
$subject_mail = test_input($_POST["subject"]);
}

/*-----subject validation-----*/

/*-----message validation-----*/

if (empty($_POST["message"])) {
$message_mailError = "Message is required";
$error=true;
} else {
$message_mail = test_input($_POST["message"]);
}

/*-----message validation-----*/

$mailQuery = true;
$selected_val = $_POST['courseselect'];

if($selected_val == "nothing"){
   $message =  "You have not selected a course to send mail to students"; // Displaying Selected Value
   $mailQuery = false;
}


if ($mailQuery) {

$query = "SELECT student.student_fname, student_sname, student_email
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);

if(!$error) {
	
while($row = mysqli_fetch_array($Course_StudentResult)){
//var_dump($row['student_email']);
$to = $row['student_email'];
$subject = $subject_mail;
$txt = $message_mail;

$mail->From = "absmugz09@gmail.com";
$mail->AddAddress($to);  
 
$mail->Subject  = $subject;
$mail->Body     = $txt;
$mail->WordWrap = 50;  
 
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
}


}

$mail_message = "The email has been successful sent to students";

}

}
else
{
$mail_message;
}

}

/*-----send mail to students-----*/


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



