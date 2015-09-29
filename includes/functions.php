<?php
/*------connection to database-----*/

include('includes/config.php');

/*------connection to database-----*/

/*------Initialize variables-----*/

/*-----retrieving data from course table-----*/

$course_message = "";
$student_display_message = "";

$query = "SELECT * FROM course ORDER BY course_id ASC";

$result_course = mysqli_query($con, $query);

if (!$result_course) {
    $course_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

if (mysqli_num_rows($result_course) == 0) {
    $course_message = "No courses found, nothing to print.";
}

/*-----retrieving data from student table-----*/

$query = "SELECT * FROM student ORDER BY student_id ASC";

$result_student = mysqli_query($con, $query);

if (!$result_student) {
    $student_display_message = "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
}

if (mysqli_num_rows($result_student) == 0) {
    $student_display_message = "No students found, nothing to print.";
}


?> 



