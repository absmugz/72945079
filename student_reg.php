<?php include("includes/header.php"); ?>

<div class="form_div">

<?php echo '<div>' . $message . '</div>'; ?>

<form name="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<span class="error">* required field.</span>
<br>
<hr/>
<br>
<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
<strong>Courses</strong>
<br>

<?php
while($row = mysqli_fetch_array($result_course)){
	
if(isset($_GET['student_edit'])) { 
$courses[] = $row['course_id'];
}
    $id = $row['course_id'];
    $name = $row['course_name'];
?>

 <input type='checkbox' 
        name='courses[]' 
        value="<?php echo $id; ?>" 
 <?php if (in_array($id, $courses)){ echo "checked"; }?>/>


 
<?php echo $name; ?>
<?php } ?>



<span class="error"> * <?php echo $coursesError;?></span>
<br>
<hr/>
<br>
Surname:
<br>
<input class="input" name="surname" value="<?php echo $surname; ?>">
<span class="error"> * <?php echo empty($surnameError) ? "" : $surnameError; ?></span>
<br>
Full First Name:
<br>
<input class="input" name="student_name" value="<?php echo $student_name; ?>">
<span class="error"> * <?php echo empty($nameError) ? "" : $nameError; ?></span>
<br>
Gender:
<br>
<input class="radio" name="gender" type="radio" value="female">Female
<input class="radio" name="gender" type="radio" value="male">Male
<span class="error"> * <?php echo $genderError;?></span>
<br>
E-mail:
<br>
<input class="input" type="text" name="email" value="<?php echo $email; ?>">
<span class="error">* <?php echo empty($emailError) ? "" : $emailError; ?></span>
<br>
<input class="submit" name="register" type="submit" value="Register Student">
</form>
</div>
<?php include("includes/footer.php"); ?>
