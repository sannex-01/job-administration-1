<?php
include('php/config.php');
$id = 1;
$hide3 = '';
$hide4 = '';

if (isset($_GET['getid'])) {
  $id = $_GET['getid'];
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$prev_id = $id - 1;
$next_id = $id + 1;
if ($id == 1) {
  // This is to prevent the previous button to be seen so as not to make id = 0
  $hide3 = "hidden";
}

// This is to determine the total number of records in the database
$query_all = mysqli_query($conn, "SELECT * FROM applicants ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_array($query_all);
if ($row['id'] <= $id) {
  // This is to prevent the next button to be seen
  $hide4 = "hidden";
}

$query = mysqli_query($conn, "SELECT * FROM applicants ORDER BY id LIMIT $prev_id, 1");

// This is to get the record for a particular id
if (isset($_GET['getid'])) {
  $query = mysqli_query($conn, "SELECT * FROM applicants WHERE id = $id");
}

if (mysqli_num_rows($query) !== 1) {
  $hide = 'hidden';
  $hide2 = 'bg-warning alert text-center';
  $alert = "Oops! No record found.<br>Go to <a href='index.php'>dashboard</a> to find application!";
} else {
  $alert = "Application Report";
  $applicant = mysqli_fetch_array($query);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('views/head.php') ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('views/sidebar.php') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('views/topbar.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 <?php echo $hide2 ?>"><?php echo $alert ?></h1>

          <div class="row">

            <div class="col-lg-12">

              <!-- Dropdown Card Example -->
              <div class="card shadow <?php echo $hide ?>">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold">Id = <span class="text-primary"><?php echo $applicant['id'] ?></span>&nbsp; &nbsp; &nbsp; Time Uploaded: <span class="text-primary"><?php echo $applicant['date-uploaded'] ?></span></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Actions:</div>
                      <a class="dropdown-item <?php echo $hide3 ?>" href="?id=<?php echo $prev_id ?>">Previous</a>
                      <a class="dropdown-item <?php echo $hide4 ?>" href="?id=<?php echo $next_id ?>">Next</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div style="width:48%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Name:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['name'] ?></p>
                  </div>
                  <div style="width:50%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Email:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['email'] ?></p>
                  </div>
                  <div style="width:48%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Phone No:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['phone'] ?></p>
                  </div>
                  <div style="width:50%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Address:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['address'] ?></p>
                  </div>
                  <div style="width:48%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Institute Name:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['institution'] ?></p>
                  </div>
                  <div style="width:50%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Qualification:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['qualification'] ?></p>
                  </div>
                  <div style="width:48%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Skills:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['skills'] ?></p>
                  </div>
                  <div style="width:50%; margin: 0; display: inline-block;">
                    <h6 class="m-0 font-weight-bold text-primary">Experience:</h6>
                    <p class="p-2 font-weight-bold"><?php echo $applicant['experience'] ?> Years</p>
                  </div>
                  <div>
                    <h6 class="m-0 font-weight-bold text-primary">Resume:</h6>
                    <div style="width: 50%; margin: 20px 100px;">
                      <embed src="assets/docs/<?php echo $applicant['resume'] ?>?toobar=0&navpanes=0&scrollbar=0" type="application/pdf" width="600px"
                        height="700px">
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>