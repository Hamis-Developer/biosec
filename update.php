<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap Core CSS -->
    <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css' rel='stylesheet'>
    <link href='assets/dist/css/dashboard.css' rel='stylesheet'>

    <title>Biosec Solutions Employee Management System</title>
  </head>
  <body>

  <header class='navbar navbar-dark sticky-top bg-danger bg-gradient flex-md-nowrap p-0 shadow'>
    <a class='navbar-brand col-md-3 col-lg-2 me-0 px-3' href='index.php'><strong>Biosec Solutions</strong></a>
    <button class='navbar-toggler position-absolute d-md-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#sidebarMenu' aria-controls='sidebarMenu' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
    </button>
  </header>

  <div class='container-fluid'>
    <div class='row'>
    <nav id='sidebarMenu' class='col-md-3 col-lg-2 d-md-block bg-light sidebar collapse'>
      <div class='position-sticky pt-3'>
        <ul class='nav flex-column'>
          <li class='nav-item'>
            <a class='nav-link' aria-current='page' href='index.php'>
              <span data-feather='home'></span>
              Dashboard
            </a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='employees.php'>
              <span data-feather='users'></span>
              Employees
            </a>
          </li>
          <li class='nav-item'>
            <a class='nav-link active' href='add.php'>
              <span data-feather='plus-circle'></span>
              Add Employee
            </a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='update.php'>
              <span data-feather='user'></span>
              Update Employee
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class='col-md-9 ms-sm-auto col-lg-10 px-md-4'>
      <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
        <h1 class='h2'>Dashboard</h1>
      </div>

      <?php
      
      if(isset($_GET['alert']) && $_GET['alert'] != '') {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Employee profile has been updated successfully.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
             ';
      }


      ?>

      <h2>Update Profile</h2>
      <div class='mb-3 mt-3'>
               <div class='container'> 
        <form id='form' method='POST' action='resources/edit.php'>
        <div class='mb-3'>
            <label for='recipient-name' class='col-form-label'>Id:</label>
            <input type='number' class='form-control' min='1' name='id' required>
          </div>
          <div class='mb-3'>
            <label for='recipient-name' class='col-form-label'>Name:</label>
            <input type='text' class='form-control' name='name' required>
          </div>
          <div class='mb-3'>
            <label for='recipient-name' class='col-form-label'>E-mail:</label>
            <input type='email' class='form-control' name='email' required>
          </div>
          <div class='mb-3'>
            <label for='recipient-name' class='col-form-label'>Designation:</label>
            <input type='text' class='form-control' name='designation' required>
          </div>
          <div class='mb-3'>
            <label for='recipient-name' class='col-form-label'>Photo URL:</label>
            <input type='text' class='form-control' name='photo' required>
          </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                <button type='submit' id='submit' class='btn btn-primary'>Update Record</button>
            </div>
        </form>
      </div>
      </div>
    </main>
  </div>
  </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src='assets/dist/js/bootstrap.bundle.min.js'></script>
    <!-- Icons -->
    <script src='https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js' integrity='sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE' crossorigin='anonymous'></script>
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js'></script>
    <script src='assets/dist/js/dashboard.js'></script>
    <script type='text/javascript'>
      $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>

  </body>
</html>