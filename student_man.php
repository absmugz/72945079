<?php include("includes/header.php"); ?>
 <a href="student_reg.php">Add a new student</a><br>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
 
<?php echo '<div>' . $student_display_message . '</div>'; ?>
<?php
 while($row = mysqli_fetch_array($result)){
?>
          <tr>
            <th scope="row"><?php echo $row['student_id'] ?></th>
            <td><?php echo $row['student_fname'] . " " . $row['student_sname']?></td>
            <td><a href="<?php echo "student_reg.php?student_edit=".$row['student_id']; ?>">Edit</a></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?student_delete='.$row['student_id']?>">Delete</a></td>
          </tr>
          <?php
}
?>
        </tbody>
      </table>

  <?php include("includes/footer.php"); ?>