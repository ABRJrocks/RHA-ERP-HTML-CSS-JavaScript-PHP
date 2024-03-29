<?php include 'connection.php';
session_start();
$id = $_GET['t_id'];
$select = "SELECT * FROM teach WHERE t_id=$id";
$data = mysqli_query($conn, $select) or die( mysqli_error($conn));
$row1 = mysqli_fetch_array($data);
if($_SESSION["fname"]) { 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Teacher Data</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<?php include ('header.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!--form-->
                    <div class="row justify-content-center my-5">
          <div class="col-lg-6">
          <div class="text-center">
                                <h2 style="color:#34495e">Edit Teacher Registered Data</h2>
                            </div>
          <form action="" method="post">
          <div class="form-floating my-5">
            <input
            value="<?php echo $row1['f_name']?>"
            name="fname"
              type="name"
              id="fname"
              placeholder="e.g. Muhammad"
              class="form-control"
            />
            <label for="name" class="form-label">First Name:</label>
          </div>

          <div class="form-floating my-5">
            <input
            value="<?php echo $row1['l_name']?>"
            name="lname"
              type="name"
              class="form-control"
              id="lname"
              placeholder="e.g Ahmad"
            />
            <label  for="lname" class="form-label">Last Name:</label>
          </div>
          <div class="form-floating my-5">
            <input
            value="<?php echo $row1['email']?>"
              name="email"
              type="text"
              class="form-control"
              id="email-std"
              placeholder="Example@rhaerp.com"
            />
            <label  name="email" class="form-label">Email</label>
          </div>

          <label for="post" class="form-label">Post</label>
              <select name="p_id" id="post" class="form-select" style="margin-bottom: 20px;">
                <?php
                $query = "SELECT p_id, p_name FROM post";
                $data1 = mysqli_query($conn, $query);
                $res1 = mysqli_num_rows($data1);
                if ($res1) {
                  while ($res1 = mysqli_fetch_array($data1)) {
                    $post_name = $res1['p_name'];
                    $post_id = $res1['p_id'];
                    echo '<option value="' . $post_id . ' ">' . $post_name . '</option>';
                  }
                }
                ?>
              </select>
            <br>
            <button value="update-btn" name="update-btn" class="btn btn-primary" style="background-color:#34495e">Update</button>
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
if (isset($_POST['update-btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $post = $_POST['p_id'];
    $update = "UPDATE teach SET f_name='$fname', l_name='$lname', email='$email', p_id='$post' WHERE t_id=$id";
    $data3 = mysqli_query($conn, $update);
    if ($data3) {
?>
        <script>
            alert("Data Updated")
            window.open("http://localhost/rha-erp/All_teach_list.php", "_self")
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Please Try Again")
            window.open("http://localhost/rha-erp/All_teach_list.php", "_self")
        </script>
<?php
    }
}
?>