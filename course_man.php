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
          <tr>
            <th scope="row">1</th>
            <td>Course A</td>
            <td><button type="button" class="btn btn-primary">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </button></td>
            <td><button type="button" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>