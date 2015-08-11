<?php include("includes/header.php"); ?>


  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <form class="form-horizontal" name="registration" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
          <div class="row">
            <div class="col-sm-4 text-right"><strong>Courses</strong></div>
            <div class="col-sm-8">
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
?>
             <label class="checkbox-inline">
<?php echo "<input type='checkbox' name='courses[]' id='{$row['course_id']}' value='{$row['course_id']}'>" . $row['course_name']; ?>
</label>
       <?php
}
?>
</div>

            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="surname" class="col-sm-4 control-label">Surname</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
          </div>
        </div>
        <div class="form-group">
          <label for="initials" class="col-sm-4 control-label">Initials</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="initials" name="initials" placeholder="Initials">
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Full First Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" placeholder="Full First Name">
          </div>
        </div>
        <div class="form-group">
          <label for="title" class="col-sm-4 control-label">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" placeholder="Title">
          </div>
        </div>
        <div class="form-group">
          <label for="dob" class="col-sm-4 control-label">Date of Birth</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="dob" placeholder="Date of Birth">
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4 text-right"><strong>Gender</strong></div>
            <div class="col-sm-8">
             <div class="check-radio-top"> <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio1" value="option1">
                Male </label>
              <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio2" value="option2">
                Female </label></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Language" class="col-sm-4 control-label">Language for correspondence</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="Language" placeholder="Language">
          </div>
        </div>
        <div class="form-group">
          <label for="identity_number" class="col-sm-4 control-label">Identity Number</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="identity_number" placeholder="Identity Number">
          </div>
        </div>
        <div class="form-group">
          <label for="home_number" class="col-sm-4 control-label">Home Telephone Code + Number</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="home_number" placeholder="Home Telephone Code + Number">
          </div>
        </div>
        <div class="form-group">
          <label for="work_number" class="col-sm-4 control-label">Work Telephone Code + Number</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="work_number" placeholder="Work Telephone Code + Number">
          </div>
        </div>
        <div class="form-group">
          <label for="cell_number" class="col-sm-4 control-label">Cell Phone Number</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="cell_number" placeholder="Cell Phone Number">
          </div>
        </div>
        <div class="form-group">
          <label for="Email" class="col-sm-4 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="Email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="postal_address" class="col-sm-4 control-label">Postal Address</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="postal_address" placeholder="Postal Address">
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-4"></div>
          <div class="col-sm-8">
            <button type="submit" name='register' value='Submit' class="btn btn-primary">Register Student</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
  <?php include("includes/footer.php"); ?>
