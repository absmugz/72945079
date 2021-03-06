<?php include("includes/header.php"); ?>

<?php echo $student_success_message; ?>
<?php echo $student_error_message; ?>

<div class="form_div">


<form name="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<span class="error">* required field.</span>
<br>
<hr/>
<br>
<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
<strong>Courses</strong>
<?php echo '<div>' . $course_message . '</div>'; ?>
<br>

<?php


while($row = mysqli_fetch_array($result_course)){
$id = $row['course_id'];
    $name = $row['course_name'];
?>

 <input type='checkbox' 
        name='courses[]' 
        value="<?php echo $id; ?>" 
 <?php echo in_array($id, $courses) ? 'checked="checked" ' : ' '; ?>/>


 
<?php echo $name; ?>
<?php } ?>



<span class="error"> * <?php echo $coursesError;?></span>
<br>
<hr/>
<br>
Initials:
<br>
<input class="input" name="initials" value="<?php echo $initials; ?>">
<span class="error"> * <?php echo empty($initialsError) ? "" : $initialsError; ?></span>
<br>
Title:
<br> 
<select name="title">
<option value="" selected="selected">Select your title</option>
<?php
$titleOptions = array("Mr", "Mrs", "Miss", "Ms", "Dr", "Prof","Rev");
foreach($titleOptions as $item){
?>
<option value="<?php echo $item; ?>" <?php $title == $item ? print "selected" : ""; ?>><?php echo $item; ?></option>  
<?php
}
?>
</select>
<span class="error"> * <?php echo empty($titleError) ? "" : $titleError; ?></span>
<br>
Date of birth
<br>

<?php
/*
$month_array = array( "January", "February", "March", "April", "May", "June",
                      "July", "August", "September", "October", "November", "December");
*/
echo "<select name=\"day\">";
echo "<option value=\"\" selected=\"selected\">day</option>";
$i = 1;
while ( $i <= 31 ) {
   echo "<option value=".$i."", $i == $day ? ' selected ' : '', ">".$i."</option>";
   $i++;
}
echo "</select>";
/*
echo "<select name=\"month\">";
echo "<option value=\"\" selected=\"selected\">month</option>";
$i = 0;
while ( $i <= 11 ) {
echo "<option value=".$i."", $i == $month ? ' selected ' : ' ', ">".$month_array[$i]."</option>";
   $i++;
}
echo "</select>";
*/
?>

<select name="month">
<?php
$month_array = array( "","January", "February", "March", "April", "May", "June",
                      "July", "August", "September", "October", "November", "December");
echo "<option value='' selected>month</option>";				  
for ($count = 1; $count < count($month_array); $count++) {
			echo "<option value='$count'",  $count == $month ? ' selected ' : '', ">$month_array[$count]</option>";
		}
echo '</select>';
?>
<?php
echo "<select name=\"year\">";
echo "<option value=\"\" selected=\"selected\">year</option>";
$i = 1900;
while ( $i <= 2007 ) {    
    echo "<option value=".$i."", $i == $year ? ' selected ' : '', ">".$i."</option>";  
   $i++;
}
echo "</select>";

?>
<span class="error"> * <?php echo empty($dobError) ? "" : $dobError; ?></span>
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
<input type="radio" name="gender" value="female" <?php echo ($gender=='female') ? 'checked' : '' ?>>Female
<input type="radio" name="gender" value="male" <?php echo ($gender=='male') ? 'checked' : '' ?>>Male
<span class="error"> * <?php echo $genderError;?></span>
<br>
E-mail:
<br>
<input class="input" type="text" name="email" value="<?php echo $email; ?>">
<span class="error">* <?php echo empty($emailError) ? "" : $emailError; ?></span>
<br>
Language:
<br> 
<select name="language">
<option value="" selected="selected">Select your language</option>
<?php
$languageOptions = array("English", "Afrikaans", "Xhosa", "Zulu", "Ndebele", "Venda","Tswana");
foreach($languageOptions as $item){
?>
<option value="<?php echo $item; ?>" <?php $language == $item ? print "selected" : ""; ?>><?php echo $item; ?></option>  
<?php
}
?>
</select>
<span class="error"> * <?php echo empty($languageError) ? "" : $languageError; ?></span>
<br>
Id number:
<br>
<input class="input" name="identity_number" value="<?php echo $identity_number; ?>">
<span class="error"> * <?php echo empty($identity_numberError) ? "" : $identity_numberError; ?></span>
<br>
student tel home:
<br>
<input class="input" name="student_telh" value="<?php echo $student_telh; ?>">
<span class="error"> * <?php echo empty($student_telhError) ? "" : $student_telhError; ?></span>
<br>
student tel work:
<br>
<input class="input" name="student_telw" value="<?php echo $student_telw; ?>">
<span class="error"> * <?php echo empty($student_telwError) ? "" : $student_telwError; ?></span>
<br>
student tel cell:
<br>
<input class="input" name="student_cell" value="<?php echo $student_cell; ?>">
<span class="error"> * <?php echo empty($student_cellError) ? "" : $student_cellError; ?></span>
<br>
Address:
<br>
<input class="input" name="address" value="<?php echo $address; ?>">
<span class="error"> * <?php echo empty($addressError) ? "" : $addressError; ?></span>
<br>
<input class="submit" name="register" type="submit" value="Register Student">
</form>
</div>
<?php include("includes/footer.php"); ?>
