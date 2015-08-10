<?php include("includes/header.php"); ?>
    <div class="row">
    <div class="col-md-4">
      <select class="selectpicker">
        <option>Mustard</option>
        <option>Ketchup</option>
        <option>Relish</option>
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
<?php include("includes/footer.php"); ?>