<?php include("includes/header.php"); ?>

  <div class="row">
    <div class="col-md-12">
      <table class="table">

        <caption>
        <a class="btn btn-success" href="#" role="button">Add a new course <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
        </caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
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
        <?php
        while($row = mysqli_fetch_array($result)){
?>
          <tr>
            <th scope="row"><?php echo $row['course_id'] ?></th>
            <td><?php echo $row['course_name'] ?></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?edit_id='.$row['course_id']?>" class="btn btn-primary">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?delete_id='.$row['course_id']?>" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          </tr>
           <?php
}
?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>
  
  