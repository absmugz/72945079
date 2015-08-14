<?php include("includes/header.php"); ?>
 <form class="form-horizontal" name="filter" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="row">
    <div class="col-md-6">
    
<?php /*-----retrieving data from course table-----*/

$query = "SELECT * FROM course ORDER BY course_id ASC";

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

      <select name="courseselect" class="selectpicker">
      <option value="nothing" selected="selected">Select course to show students</option>
      <?php
        while($row = mysqli_fetch_array($result)){
?>
        <option value="<?php echo $row['course_id']?>"><?php echo $row['course_name']?></option>
    <?php
}
?>
      </select>
    </div><div col-md-4><button type="submit" name='filter' value='Submit' class="btn btn-primary">filter</button></div></form>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <caption>
        list of students registered for a specific course
        </caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
<?php /*-----retrieving data from course_table table-----*/

if (!$Course_StudentResult) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($Course_StudentResult) == 0) {
    echo "No students found, nothing to print.";
    exit;
}
?>

 <?php
while($row = mysqli_fetch_array($Course_StudentResult)){
?>
          <tr>
            <th scope="row"></th>
            <td><?php echo $row['student_fname'] . " " . $row['student_sname']?></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?edit_id='.$row['student_id']?>" class="btn btn-primary">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?delete_id='.$row['student_id']?>" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          </tr>
          <?php
}
?>
        </tbody>
      </table>
    </div>
  </div>


<?php

 
?>
<?php include("includes/footer.php"); ?>

