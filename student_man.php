<?php include("includes/header.php"); ?>
 <div class="row">
    <div class="col-md-12">
      <table class="table">

        <caption>
        <a class="btn btn-success" href="student_reg.php" role="button">Add a new student <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
        </caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php /*-----retrieving data from course table-----*/

$sql = "SELECT * FROM student ORDER BY student_id DESC";

$result = mysql_query($sql);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No students found, nothing to print.";
    exit;
}
?>
        <?php
while ($row = mysql_fetch_assoc($result))
{
?>
          <tr>
            <th scope="row"><?php echo $row['student_id'] ?></th>
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
  <?php include("includes/footer.php"); ?>