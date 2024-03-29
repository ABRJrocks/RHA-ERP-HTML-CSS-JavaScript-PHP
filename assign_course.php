<?php
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
  <script>  
function validateform(){  
var t_id=document.myform.t_id.value;
var c_id=document.myform.c_id.value;
var c_num=document.myform.c_num.value;  
if (t_id==null || t_id==""){  
  alert("Please Select the Teacher");  
  return false;  
}
else if (c_id==null || c_id==""){  
  alert("Please Select Course");  
  return false;  
}
else if (c_num==null || c_num==""){  
  alert("Please Select Number of Lectures");  
  return false;  
}  
  
}  
</script> 
</head>

<body class="sb-nav-fixed">
<?php include ('header.php'); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="text-center">
          <h2 style="color:#34495e">Assign Course</h2>
        </div>
        <!--form-->
        <div class="row justify-content-center my-5">
          <div class="col-lg-6">
            <form action="assigcrs.php" method="POST" name="myform"  onsubmit="return validateform()">
            <label for="teacher" class="form-label">Teachers</label>
              <select name="t_id" id="teacher" class="form-select" style="margin-bottom: 20px;">
              <option disabled selected value> -- Select Teacher -- </option>
                <?php
                  $teacher_query = "SELECT f_name, l_name, t_id FROM teach";
                  $data2 = mysqli_query($conn, $teacher_query);
                  $rows = mysqli_num_rows($data2);
                if ($rows) {
                  while ($res2 = mysqli_fetch_array($data2)) {
                    $name = $res2['f_name'];
                    $name .= " ";
                    $name .= $res2['l_name'];
                    
                    echo '<option value="' . $res2['t_id'] . ' ">' . $name . '</option>';
                  }
                }
                ?>
              </select>

              <label for="course" class="form-label">Course</label>
              <select name="c_id" id="course" class="form-select" style="margin-bottom: 20px;">
              <option disabled selected value> -- Select Course -- </option>
                <?php
                if ($res) {
                  while ($res = mysqli_fetch_array($data)) {
                    $course_name = $res['c_name'];
                    $course_id = $res['c_id'];
                    echo '<option value="' . $course_id . ' ">' . $course_name . '</option>';
                  }
                }
                ?>
              </select>

              <label for="num_of_lec" class="form=label">Number of Lectures</label>
              <select name="c_num" id="num_of_lec" class="form-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <br>
              <button name="register" type="submit" class="btn btn-primary" style="background-color:#34495e">Register</button>
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