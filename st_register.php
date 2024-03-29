<?php
error_reporting (0);
include 'connection.php';
session_start();
if($_SESSION["fname"]) { 
$query = "SELECT c_id, c_name from course";
$data = mysqli_query($conn, $query);
$res = mysqli_num_rows($data);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard-RHA Solutions</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<?php include ('header.php'); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="text-center">
          <h2 style="color:#34495e">Register Students</h2>
        </div>
        <!--form-->
        <div class="row justify-content-center my-5">
          <div class="col-lg-6">
          <form action="" method="post">
          <div class="form-floating my-5">
            <input
            name="name"
              type="name"
              id="name"
              placeholder="e.g. Muhammad"
              class="form-control"
              required
            />
            <label for="name" class="form-label">First Name:</label>
          </div>

          <div class="form-floating my-5">
            <input
            name="St_lname"
              type="name"
              class="form-control"
              id="St_lname"
              placeholder="e.g Ahmad"
              required
            />
            <label  for="St_lname" class="form-label">Last Name:</label>
          </div>
          <div class="form-floating my-5">
            <input
              name="email"
              type="text"
              class="form-control"
              id="email-std"
              placeholder="Example@rhaerp.com"
              required
            />
            <label  name="email" class="form-label">Email</label>
          </div>

          <label name="Semester" for="Semester" class="form=label">Semester</label>
            <select name="semester" id="Semester" class="form-select" required>
            <option disabled selected value> -- Select Semester -- </option>
              <option value="1">1st</option>
              <option value="2">2nd</option>
              <option value="3">3rd</option>
              <option value="4">4th</option>
              <option value="5">5th</option>
              <option value="6">6th</option>
              <option value="7">7th</option>
              <option value="8">8th</option>
            </select>
            <br>
            <button value="register" type="submit" name="register" class="btn btn-primary" style="background-color:#34495e">Register</button>
            <a href="index.php" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        </form>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; RHA Solutions 2022</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php 
}
else {
  include ('login.php');
}
 ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>

<?php
$fname = $_POST['name'];
$St_lname = $_POST['St_lname'];
$Semester = $_POST['semester'];
$email = $_POST['email'];

$sql = "INSERT INTO std (fname, lname, semester, email) VALUES ('$fname', '$St_lname', '$Semester', '$email')";

if(isset($_POST["register"])){
    if(mysqli_query($conn,$sql))
    {
        ?>   
        <script>
        alert("Data Inserted!")
        window.open("http://localhost/rha-erp/st_register.php","_self")

    </script>
        <?php
    }
    else
    {
        ?>   
        <script>
        alert("Data Not Inserted!")
        window.open("http://localhost/rha-erp/st_register.php","_self")

    </script>
        <?php
    }
}
?>