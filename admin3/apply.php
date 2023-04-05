<?php

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

        <!-- Container -->
        <div class="container">
          <!-- Basic Form Inputs card start -->
          <div class="card" style="max-width: 900px; margin: auto;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Application Form</h6>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" action="php/apply.php" method="post">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Name</label>
                  <div class="col-sm-8">
                    <input name="name" type="text" class="form-control" placeholder="Firstname Lastname" autofocus="on" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input name="email" type="email" class="form-control" placeholder="Type your email here..." required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Phone Number</label>
                  <div class="col-sm-8">
                    <input name="phone" type="text" class="form-control" placeholder="include country code (+910009009090)" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Address</label>
                  <div class="col-sm-8">
                    <input name="address" type="text" class="form-control" placeholder="Type your address here..." required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Qualification</label>
                  <div class="col-sm-8">
                    <input name="qualification" type="text" class="form-control" placeholder="Type qualification here..." required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Institute Name</label>
                  <div class="col-sm-8">
                    <input name="institution" type="text" class="form-control" placeholder="Type institution name here..." required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Skills</label>
                  <div class="col-sm-8">
                    <input name="skills" type="text" class="form-control" placeholder="separate skills with commas." required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Years of Experience</label>
                  <div class="col-sm-8">
                    <input name="experience" type="number" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Upload Resume (only PDF is allowed)</label>
                  <div class="col-sm-8">
                    <input name="resume" type="file" accept="application/pdf" class="form-control" required>
                  </div>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset" data-dismiss="modal">Reset</button>
                    <button name="submit-application" type="submit" class="btn btn-primary" href="login.html">Apply</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Basic Form Inputs card end -->
        </div>

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

  <!-- Page level plugins -->
  <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/datatables-demo.js"></script> -->

</body>

</html>