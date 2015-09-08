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

        

 <?php
 
echo '<div>' . $message . '</div>';
 
if($runQuery){


if (!$Course_StudentResult) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($Course_StudentResult) == 0) {
    echo "No students found in the selected course, nothing to print.";
    exit;
}



echo '<table>
<thead>
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Delete</th>
          </tr>
        </thead>
 <tbody>';
		
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
}
?>
        </tbody>
      </table>
   
<?php include("includes/footer.php"); ?>

