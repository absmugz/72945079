<?php include("includes/header.php"); ?>
 <form class="form-horizontal" name="filter" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
  <button type="submit" name='filter' value='Submit' class="btn btn-primary">filter</button>

  
    <div class="row">
    <div class="col-md-4">
    
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
    </div>
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
          <tr>
            <th scope="row">1</th>
            <td>Absolom mugwagwa</td>
            <td><button type="button" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</form>
<?php include("includes/footer.php"); ?>