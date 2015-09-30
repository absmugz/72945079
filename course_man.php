<?php include("includes/header.php"); ?>
<?php echo '<div>' . $course_delete . '</div>'; ?>
<?php

if(isset($_GET['add']) || isset($_GET['course_edit']))

	{

	/*------set default values-----*/
	$item_id=0;
	$editcoursename='';
	
if (isset($_GET['course_edit'])) {	
$query='SELECT * FROM course WHERE course_id = "'.$_GET['course_edit'].'"';
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_array($result);
$item_id=$row['course_id'];
$editcoursename=$row['course_name'];
}

?>


<!--forms is below-->

<form name="addcourse" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT TYPE = "hidden" VALUE ="<?PHP echo $item_id ; ?>" NAME = "item_id">

<table width="589" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="91">Course name :</td>
    <td width="478"><INPUT TYPE = "Text" VALUE ="<?PHP echo $editcoursename ?>" NAME = "coursename"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><INPUT TYPE = "Submit" Name = "submitcourse" VALUE = "add course"></td>
  </tr>

</table>

</form>
<?php
}
else
{
?>
<a href="<?php $_SERVER['PHP_SELF'] ?>?add=1">Add a new course</a><br />
<?php
}/*------end main if-----*/
?>

<table>
        <thead>
          <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

<?php
        while($row = mysqli_fetch_array($result_course)){
?>
          <tr>
            <th scope="row"><?php echo $row['course_id'] ?></th>
            <td><?php echo $row['course_name'] ?></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?course_edit='.$row['course_id']?>">Edit</a></td>
            <td><a href="<?php echo $_SERVER['PHP_SELF'].'?course_delete='.$row['course_id']?>">Delete</a></td>
          </tr>
<?php
}
?>
        </tbody>
      </table>

  <?php include("includes/footer.php"); ?>
  
  