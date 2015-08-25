<?php include("includes/header.php"); ?>


  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
<?php echo $StudentSucceesMessage ?>
<form class="form-horizontal" name="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <input type="hidden" name="student_id" value="<?php $row['student_id'];?>">
      <div class="form-group">
          <div class="row">
            <div class="col-sm-4 text-right"><strong>Courses</strong></div>
            <div class="col-sm-5">
<?php 

/*-----retrieving data from course table-----*/

// Check dbmysqlection

//consultation:

$query = "SELECT * FROM course ORDER BY course_id ASC";

//execute the query.

$result = mysqli_query($con, $query); 

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "No courses found, nothing to print.";
    exit;
}
?>


<div class="check-radio-top">
<?php


while($row = mysqli_fetch_array($result)){
 
    // Easier to use than array
    $id = $row['course_id'];
    $name = $row['course_name'];
?>
<label class="checkbox-inline">
 <input type='checkbox' 
        name='courses[]' 
        value="<?php echo $id; ?>" 
        <?php echo in_array($id, $courses) ? " checked " : ""; ?> >
        <?php echo $name; ?>
</label>
       <?php
}
?>
</div>
</div> <div class="col-sm-3"><span class="error"><?php echo $coursesError; ?></span></div>
          </div>
        </div>
        <div class="form-group">
          <label for="surname" class="col-sm-4 control-label">Surname</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $surname; ?>" placeholder="Surname">
          </div>
           <div class="col-sm-3"><span class="error"><?php echo empty($surnameError) ? "" : $surnameError; ?></div>
        </div>
        <div class="form-group">
          <label for="initials" class="col-sm-4 control-label">Initials</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="initials" name="initials" placeholder="Initials">
          </div>
          <div class="col-sm-3"></span></div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Full First Name</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Full First Name">
          </div>
          <div class="col-sm-3"><span class="error"><?php echo empty($nameError) ? "" : $nameError; ?></span></div>
        </div>
        <div class="form-group">
          <label for="title" class="col-sm-4 control-label">Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
          </div>
          <div class="col-sm-3"></div>
        </div>
        <div class="form-group">
          <label for="dob" class="col-sm-4 control-label">Date of Birth</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="dob"  name="dob" placeholder="Date of Birth">
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4 text-right"><strong>Gender</strong></div>
            <div class="col-sm-5">
             <div class="check-radio-top"> <label class="radio-inline">
               <Input type='radio' name='gender' value='male' <?PHP print $male_status; ?>>
                Male </label>
              <label class="radio-inline">
               <Input type='radio' name='gender' value='female' <?PHP print $female_status; ?>>
                Female </label></div>
            </div>
            <div class="col-sm-3"><span class="error"><?php echo $genderError;?></span></div>
          </div>
        </div>
        <div class="form-group">
          <label for="Language" class="col-sm-4 control-label">Language for correspondence</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="Language"  name="language" placeholder="Language">
          </div>
        </div>
        <div class="form-group">
          <label for="identity_number" class="col-sm-4 control-label">Identity Number</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="identity_number" name="identity_number" placeholder="Identity Number">
          </div>
        </div>
        <div class="form-group">
          <label for="home_number" class="col-sm-4 control-label">Home Telephone Code + Number</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="home_number" placeholder="Home Telephone Code + Number">
          </div>
        </div>
        <div class="form-group">
          <label for="work_number" class="col-sm-4 control-label">Work Telephone Code + Number</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="work_number" placeholder="Work Telephone Code + Number">
          </div>
        </div>
        <div class="form-group">
          <label for="cell_number" class="col-sm-4 control-label">Cell Phone Number</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="cell_number" name="cell_number" placeholder="Cell Phone Number">
          </div>
        </div>
        <div class="form-group">
          <label for="Email" class="col-sm-4 control-label">Email</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="Email" name="email" value="<?php echo $email; ?>" placeholder="Email">
          </div>
          <div class="col-sm-3"><span class="error"><?php echo empty($emailError) ? "" : $emailError; ?></span></div>
        </div>
        <div class="form-group">
          <label for="postal_address" class="col-sm-4 control-label">Postal Address</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="postal_address" name="address" placeholder="Postal Address">
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-4"></div>
          <div class="col-sm-5">
            <button type="submit" name='register' value='Submit' class="btn btn-primary">Register Student</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
  <?php include("includes/footer.php"); ?>
