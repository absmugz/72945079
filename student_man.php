<?php include("includes/header.php"); ?>
  <?php include("includes/navigation.php"); ?>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <caption>
        <a class="btn btn-success" href="#" role="button">Add a new student <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
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
          <tr>
            <th scope="row">1</th>
            <td>Absolom mugwagwa</td>
            <td><button type="button" class="btn btn-primary">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </button></td>
            <td><button type="button" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>