<?php include("includes/header.php"); ?>

<?php

$course_costError = "";
$course_descrError = "";
$course_durationError = "";
$coursenameError = "";
$course_create_success_message = "";
$querycourse = "";

$formSubmitted = false;


if(isset($_GET['add']) || isset($_GET['course_edit']) || isset($_POST['submitcourse']) )

	{

$CourseformSubmitted = false;

	/*------set default values-----*/
	$item_id=0;
	$editcoursename='';
	
if (isset($_GET['course_edit'])) {	
$query='SELECT * FROM course WHERE course_id = "'.$_GET['course_edit'].'"';
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_array($result);
$item_id=$row['course_id'];
$coursename=$row['course_name'];
$course_descr=$row['course_descr'];
$course_cost=$row['course_cost'];
$course_duration=$row['course_duration'];

}else if (isset($_POST['submitcourse'])) {


$registration_error = false;
/*-----setting variables for course form data-----*/
$coursename = test_input($_POST['coursename']);
$course_descr = test_input($_POST['course_descr']);
$course_cost = test_input($_POST['course_cost']);
$course_duration = test_input($_POST['course_duration']);
 
 
/*-----course name validation-----*/

if (empty($coursename)) {
$coursenameError = "course name is required";
$registration_error=true;
} 

/*-----course name validation-----*/
 
/*-----course descr validation-----*/

if (empty($course_descr)) {
$course_descrError = "course description is required";
$registration_error=true;
} 

/*-----course descr validation-----*/
 
/*-----course cost validation-----*/

if (empty($course_cost)) {
$course_costError = "course cost is required";
$registration_error=true;
} 

/*-----course cost validation-----*/
 
/*-----course duration validation-----*/

if (empty($course_duration)) {
$course_durationError = "course duration is required";
$registration_error=true;
} 

if(!$registration_error) {

$formSubmitted = true;

if ($_POST['item_id']>0)
{
/*-----update data into the database-----*/
$querycourse='UPDATE course SET
course_name = "'.$coursename.'",
course_descr = "'.$course_descr.'",
course_cost = "'.$course_cost.'",
course_duration = "'.$course_duration.'"
WHERE course_id = "'.$_POST['item_id'].'"
';

}else{
		/*-----inserting data into the database-----*/
$querycourse='INSERT INTO course(course_name,course_descr,course_cost,course_duration
       )VALUES(
       "'.$coursename.'",
	   "'.$course_descr.'",
	   "'.$course_cost.'",
	   "'.$course_duration.'"
         )';
}
}
		 


if (mysqli_query($con,$querycourse)) {
	
   $course_create_success_message = "Course has been successfully created";
 
} else {
   $course_create_success_message = "Error:<br>" . mysqli_error($con);
}


$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);

if (!$result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

else if (mysqli_num_rows($result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
}




/*-----course duration validation-----*/

}

?>


<!--forms is below-->
<?php 
if (!$formSubmitted) {
echo "<form name=\"addcourse\" method=\"POST\" action=\"\">
<INPUT TYPE = \"hidden\" VALUE =\"<?PHP echo $item_id ; ?>\" NAME = \"item_id\">

<table width=\"100%\" cellspacing=\"20\" cellpadding=\"20\">
  <tr>
    <td>Course name :</td>
    <td><INPUT TYPE = \"Text\" VALUE =\" $coursename \" NAME = \"coursename\"><span class=\"error\"> *$coursenameError</span></td>
  </tr>
  <tr>
    <td>Course description :</td>
    <td><INPUT TYPE = \"Text\" VALUE =\" $course_descr \" NAME = \"course_descr\"><span class=\"error\"> * $course_descrError </span></td>
  </tr>
  <tr>
    <td>Course cost :</td>
    <td><INPUT TYPE = \"Text\" VALUE =\" $course_cost \" NAME = \"course_cost\"><span class=\"error\"> * $course_costError </span></td>
  </tr>
  <tr>
    <td>Course duration :</td>
    <td><INPUT TYPE = \"Text\" VALUE =\" $course_duration \" NAME = \"course_duration\"><span class=\"error\"> * $course_durationError </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><INPUT TYPE = \"Submit\" Name = \"submitcourse\" VALUE = \"add course\"></td>
  </tr>

</table>

</form>";
} else {
	echo "<a href=\"?add=1\">Add a new course</a><br />";
}
?>
<?php
}
else
{
?>
<a href="<?php $_SERVER['PHP_SELF'] ?>?add=1">Add a new course</a><br />
<?php
}/*------end main if-----*/
?>

<?php echo '<div>' . $course_delete . '</div>'; ?>
<?php echo '<div>' . $course_message . '</div>'; ?>
<?php echo '<div>' . $course_create_success_message . '</div>'; ?>

<table width="100%" cellspacing="20" cellpadding="20" border="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

<?php
        while($row = mysqli_fetch_array($result_course)){
?>
          <tr>
            <th scope="row"><?php echo $row['course_id'] ?></th>
            <td><?php echo $row['course_name'] ?></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?course_edit='.$row['course_id']?>">Edit</a></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?course_delete='.$row['course_id']?>">Delete</a></td>
          </tr>
<?php
}
?>
        </tbody>
      </table>

  <?php include("includes/footer.php"); ?>
  
  