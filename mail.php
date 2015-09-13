<?php include("includes/header.php"); ?>
<?php echo '<div>' . $message . '</div>';
if($runQuery){


if (!$Course_StudentResult) {
     echo '<div>' . "Could not successfully run query ($sql) from DB: " . mysqli_error($con) . '</div>';
    exit;
}

if (mysqli_num_rows($Course_StudentResult) == 0) {
    echo '<div>' . "No students found in the selected course, nothing to print." . '</div>';
    exit;
}
}

?>
<form name="filter" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
<select name="courseselect">
<option value="nothing" selected>Select course to send mail to students</option>
<?php
while($row = mysqli_fetch_array($result_course)){
			
$courseselect = $_POST['courseselect'];
$id = $row['course_id'];
$name = $row['course_name'];
?>
<option value="<?php echo $id; ?>" <?php if($id == $courseselect) echo 'selected'; ?>><?php echo $name; ?></option>  
<?php
}
?>
 </select>
<br>
 Subject :
<br>
<input class="input" name="subject" value="<?php echo $subject_mail; ?>">
<br>
Message : 
<br>
<textarea name="message" rows="5" cols="40"><?php echo $subject_message;?></textarea>
<br>
<input class="submit" name="sendmail" type="submit" value="Send mail">
</form>


 
<?php include("includes/footer.php"); ?>