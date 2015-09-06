<?php include("includes/header.php"); ?>
<form name="filter" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
<select name="courseselect">
      <option value="nothing" selected>Select course to show students</option>
      <?php
        while($row = mysqli_fetch_array($result_course)){
    $id = $row['course_id'];
    $name = $row['course_name'];
?>
        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
    <?php
}
?>
      </select>
<input class="submit" name="filter" type="submit" value="Show students in course">
</form>

      <table>

        <thead>
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        

 <?php
while($row = mysqli_fetch_array($Course_StudentResult)){
?>
          <tr>
            <th scope="row"></th>
            <td><?php echo $row['student_fname'] . " " . $row['student_sname']?></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?edit_id='.$row['student_id']?>">Edit</a></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?delete_id='.$row['student_id']?>">Delete</a></td>
          </tr>
          <?php
}
?>
        </tbody>
      </table>
   
<?php include("includes/footer.php"); ?>

