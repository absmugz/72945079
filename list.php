<?php
/*------includes for connection to database-----*/
include('includes/config.php');

/*------includes for functions-----*/
include('includes/functions.php');

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Student registration system</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">| <a href="student_reg.php">Register a student</a> | <a href="course_man.php">Manage courses</a> | <a href="student_man.php">Manage students</a> | <a href="list.php">View registrations</a></div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <select class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
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
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>