<?php
/*------includes for dbmysqlection to database-----*/

include('includes/config.php');

/*------includes for dbmysqlection to database-----*/

/*------Initialize variables-----*/
$male_status = 'unchecked';
$female_status = 'unchecked';

$message='';
$StudentSucceesMessage='';
$Course_StudentResult='';

/*------Course variables-----*/
$coursesError = '';
$courses = array();
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
$StudentSucceesMessage = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success! </strong> Thank you. Student records for '.' ' .$student_name .' ' . $surname .' have been successfully updated.</div>';
}else{
$StudentSucceesMessage = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>Student details have not been updated, please try again.</div>';
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

if(mysqli_query($con,$query))
{			
$StudentSucceesMessage = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success! </strong> Thank you. Student records for '.' ' .$student_name .' ' . $surname .' have been successfully created.</div>';
}else{
$StudentSucceesMessage = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>Student details have not been created, please try again.</div>';
			//echo "Data not Inserted" . mysqli_error($con);die();
}
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

$selected_val = $_POST['courseselect'];

if($selected_val == "nothing"){
	
$message =  "You have not selected a course to filter students"; 
$runQuery = false;

} else {

$query = "SELECT student.student_fname, student_sname
                FROM student, course_student
                WHERE student.student_id = course_student.student_id 
                AND $selected_val = course_student.course_id";
				
$Course_StudentResult = mysqli_query($con, $query);

}

}

/*-----Filter course_student and show students in a certain course table-----*/

/*-----editing data from student table-----*/
if (isset($_GET['student_edit'])) {	
$query='SELECT * FROM student WHERE student_id = "'.$_GET['student_edit'].'"';
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){ 


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
//$row = mysqli_fetch_array($result);
//var_dump($row);die();
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
if (isset($_GET['course_edit'])) {	
$query='SELECT * FROM course WHERE course_id = "'.$_GET['course_edit'].'"';
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_array($result);
var_dump($row);die();
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

/*------Insert Data within table by accepting TableName and Table column => Data as associative array and get id of inserted function-----*/

function insertDataGetId($connection, $tblname, array $val_cols){
		$keysString = implode(", ", array_keys($val_cols));
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
			$last_id = mysqli_insert_id($connection);
		}
		else{
			echo "Data not Inserted";
		}return $last_id;
}
	
/*------Insert Data within table by accepting TableName and Table column => Data as associative array and get id of inserted function-----*/

/*------Course checkboxes-----*/

function get_checkboxes_chk($connection){
$str='';
$query = "SELECT * FROM course ORDER BY course_id ASC";

$result = mysqli_query($connection, $query); 

//var_dump($result);die();

while($row = mysqli_fetch_array($result)){
	
$str.='<br/>'.$row['course_name'].'<input type="checkbox" value="'.$row['course_id'].'" name="courses[]"/>';

}

return $str;

}

/*------Course checkboxes-----*/

/*------functions-----*/

?> 



