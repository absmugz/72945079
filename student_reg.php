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
    <div class="col-md-12">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="surname" class="col-sm-2 control-label">Surname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="surname" placeholder="Surname">
          </div>
        </div>
        <div class="form-group">
          <label for="initials" class="col-sm-2 control-label">Initials</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="initials" placeholder="Initials">
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Full First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Full First Name">
          </div>
        </div>
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Title">
          </div>
        </div>
        <div class="form-group">
          <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="dob" placeholder="Date of Birth">
          </div>
        </div>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" name="gender" id="inlineRadio1" value="option1">
            Male </label>
          <label class="radio-inline">
            <input type="radio" name="gender" id="inlineRadio2" value="option2">
            Female </label>
        </div>
        
        <div class="form-group">
    <label for="Language" class="col-sm-2 control-label">Language for correspondence</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Language" placeholder="Language">
    </div>
  </div>
  
     <div class="form-group">
    <label for="identity_number" class="col-sm-2 control-label">Identity Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="identity_number" placeholder="Identity Number">
    </div>
  </div>
  
  <div class="form-group">
    <label for="home_number" class="col-sm-2 control-label">Home Telephone Code + Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="home_number" placeholder="Home Telephone Code + Number">
    </div>
  </div>
  
  <div class="form-group">
    <label for="work_number" class="col-sm-2 control-label">Work Telephone Code + Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="work_number" placeholder="Work Telephone Code + Number">
    </div>
  </div>
  
  <div class="form-group">
    <label for="cell_number" class="col-sm-2 control-label">Cell Phone Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="cell_number" placeholder="Cell Phone Number">
    </div>
  </div>
        
        <div class="form-group">
    <label for="Email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="Email" placeholder="Email">
    </div>
  </div>
  
  <div class="form-group">
    <label for="postal_address" class="col-sm-2 control-label">Postal Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="postal_address" placeholder="Postal Address">
    </div>
  </div>
  
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Register Student</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>