<?php
/*------includes for dbmysqlection to database-----*/
include('config.php');

// Check dbmysqlection
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

mysql_close($dbmysql);
?> 



