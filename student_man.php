<?php include("includes/header.php"); ?>

 <a class="linkButton" href="student_reg.php">Add a new student</a><br>


<?php

if( mysqli_num_rows($result_student) > 0){
	
      echo '<table width="100%" cellspacing="20" cellpadding="20">
        <thead>
          <tr>
            <th></th>
            <th>Student Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>';
		
 while($row = mysqli_fetch_array($result_student)){
?>
          <tr>
            <th scope="row"><?php echo $row['student_id'] ?></th>
            <td><?php echo $row['student_fname'] . " " . $row['student_sname']?></td>
            <td><a class="linkButton" href="<?php echo "student_reg.php?student_edit=".$row['student_id']; ?>">Edit</a></td>
             <td><a class="linkButton" href="<?php echo $_SERVER['PHP_SELF'].'?student_delete='.$row['student_id']?>">Delete</a></td>
          </tr>
          <?php
}
 echo '</tbody>
      </table>';
}
else {
echo '<div>' . $course_student_delete . '</div>';
echo '<div>' . $student_display_message . '</div>';
}
?>
      

  <?php include("includes/footer.php"); ?>