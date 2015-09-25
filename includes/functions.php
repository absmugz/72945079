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
$message_mail = '';

/*------send error variables-----*/

$subject_mailError  = '';
$message_mailError  = '';

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
$student_telwError = '';
$student_cellError = '';
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

if ($gender == 'male') {
$male_status = 'checked';
}
else if ($gender == 'female') {
$female_status = 'checked';
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
$message = "Success! Thank you. Student records for " . $student_name . " " . $surname . " have been successfully updated";
}else{
$message = "Error! Student details for " . $student_name . " " . $surname . " have not been updated, please try again!";
}

mysqli_close($con);

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

$runQuery = true;
$selected_val = $_POST['courseselect'];

if($selected_val == "nothing"){
   $message =  "You have not selected a course to send mail to students"; 
   $runQuery = false;
}


if ($runQuery) {

$query = "SELECT student.student_fname, student_sname, student_email
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);

if(!$error) {
	
while($row = mysqli_fetch_array($Course_StudentResult)){
var_dump($row['student_email']);

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

$message = "The email has been successful sent to students";

}

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
		  
$query = "SELECT * FROM student
WHERE student.student_id = $student_id_edit";

$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){ 

$student_id = $row['student_id'];
$surname = $row['student_sname'];
$initials = $row['student_initials'];
$title = $row['student_title'];
$student_name = $row['student_fname'];
$gender = $row['student_gender'];
$email = $row['student_email'];
$language = $row['student_lang'];
$identity_number = $row['student_id_no'];
$student_telh = $row['student_telh'];
$student_telw = $row['student_telw'];
$student_cell = $row['student_cell'];
$address = $row['student_address'];

if ($gender == 'male') {
$male_status = 'checked';
}
else if ($gender == 'female') {
$female_status = 'checked';
}

}


$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);

if (!$result_course) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($result_course) == 0) {
    echo "No courses found, nothing to print.";
    exit;
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
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($registered_result_course) == 0) {
    echo "No courses found, nothing to print.";
    exit;
}

/*-----errors and updating student, deleting courses and inserting new courses-----*/




/*-----errors and updating student, deleting courses and inserting new courses-----*/

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
//$query='DELETE FROM course WHERE course_id = "'.$_GET['course_delete'].'"';

//$delete_course = $_GET['course_delete'];

//$query = "DELETE FROM course where course_id NOT IN (SELECT course_student.course_id FROM course_student)";

$delete_course = $_GET['course_delete'];

//$query = "DELETE FROM course where course_id NOT IN (SELECT course_student.course_id FROM course_student)";

$query = "SELECT COUNT(course_id) FROM course_student
WHERE course_id=$delete_course"; 

if($result = mysqli_query($con, $query))
{
			//echo "Successfully deleted course <br>";
			$row = mysqli_fetch_array($result);
            //var_dump($row["COUNT(course_id)"]);die();
			if ($row["COUNT(course_id)"] > 0) {
				
				echo '<a href="">Archive</a><br>';
				echo '<a href="' . $_SERVER['PHP_SELF'] . '?delete=' . $delete_course . ' "'.$delete_course.'"">Delete</a>';

} else {
					

$query = "DELETE FROM course WHERE course_id=$delete_course"; 
if (mysqli_query($con, $query )) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

//mysqli_close($con); 

}

}else{
			//echo "course not deleted";
			echo "Data not Inserted" . mysqli_error($con);die();
}

}

/*-----deleting course function-----*/

	
if (isset($_GET['delete'])) {

$delete_course = $_GET['delete'];

$query = "DELETE FROM course
WHERE course_id=$delete_course"; 

$query.=";"."DELETE FROM course_student
WHERE course_id=$delete_course"; 

if (mysqli_multi_query($con, $query)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

}

/*-----deleting course function-----*/

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



