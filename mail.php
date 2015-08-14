<?php include("includes/header.php"); ?>
<form class="form-horizontal" name="filter" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="row">
<div class="col-md-6">
    
<?php

/*-----retrieving data from course table-----*/
$courseQuery = "SELECT * FROM course ORDER BY course_id ASC";
$result = mysqli_query($con, $courseQuery);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "No courses found, nothing to print.";
    exit;
}
?>

      <select name="courseselect" class="selectpicker">
      <option value="nothing" selected>Select course to show students</option>
      <?php
        while($row = mysqli_fetch_array($result)){
?>
        <option value="<?php echo $row['course_id']?>"><?php echo $row['course_name']?></option>
    <?php
}
?>
      </select>
    </div>
  </div>
 <div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subject" placeholder="Subject">
    </div>
  </div>
  
  <textarea class="form-control" rows="3"></textarea>

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name='sendmail' value='Submit' class="btn btn-primary">send mail</button>
    </div>
  </div>

  </form> </div></div>
<?php include("includes/footer.php"); ?>