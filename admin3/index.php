<?php
include('php/config.php');
$hide = 'hidden';

if (isset($_GET['alert'])) {
    $type = $_GET['type'];
    $type_ = $type;
    if ($type == 'delete') {
        $type_ = 'delet';
    }
    if ($_GET['alert'] == 'true') {
        $hide = 'alert-success alert';
        $alert = "Application has successfully been ".$type_."ed!"; 
    } else {
        $hide = 'bg-danger alert';
        $alert = "Application $type is unsuccessfully. Please try again later!";
    }
}

$a_query = mysqli_query($conn, "SELECT * FROM applicants ORDER BY id DESC");

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
                    <h1 class="h3 mb-2 text-gray-800 <?php echo $hide ?>"><?php echo $alert ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Application List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 500px; overflow: scroll;">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Qualification</th>
                                            <th>Experience</th>
                                            <th> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody id="application-list">
                                        <!-- List of applicants will be displayed here with ajax function... -->
                                        <?php
                                        while ($applicant = mysqli_fetch_assoc($a_query)) {
                                            echo '<tr>
                                                <td>' . $applicant['name'] . '</td>
                                                <td>' . $applicant['email'] . '</td>
                                                <td>' . $applicant['phone'] . '</td>
                                                <td>' . $applicant['qualification'] . '</td>
                                                <td>' . $applicant['experience'] . ' Years</td>
                                                <td>
                                                    <div class="nav-expand navbar-nav nav-item dropdown no-arrow">
                                                        <a class="btn btn-light btn-circle btn-sm dropdown-toggle" href="#"
                                                            id="userEdit" role="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <span class="icon text-gray-600">
                                                                <i class="fas fa-arrow-down"></i>
                                                            </span>
                                                        </a>
                                                        <div style="min-width: 6rem;"
                                                            class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                            aria-labelledby="userEdit">
                                                            <a class="dropdown-item" style="padding: 0.25rem 0.5rem;"
                                                                href="report.php?getid=' . $applicant['id'] . '">
                                                                <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                View
                                                            </a>
                                                            <button id="' . $applicant['id'] . '" type="button" class="dropdown-item" onclick="edit(this.id)"
                                                                style="padding: 0.25rem 0.5rem;" data-toggle="modal"
                                                                data-target="#applicantEdit">
                                                                <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                Edit
                                                            </button>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="php/delete.php?id=' . $applicant['id'] . '"
                                                                style="color: red; padding: 0rem 0.9rem;">
                                                                <i class="fas fa-trash fa-sm fa-fw mr-2 text-danger"></i>
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('views/footer.php') ?>
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
    <div class="modal fade" id="applicantEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div style="min-width: 700px; margin: auto; margin-top: 20px;" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-application" enctype="multipart/form-data" action="php/apply.php" method="post">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Search blog -->
    <script>
        function search(str) {
            if (str.length >= 1) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("application-list").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "php/search.php?q=" + str, true);
                xmlhttp.send();
            }
        }

        function edit(id) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("edit-application").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "php/edit.php?id=" + id, true);
            xmlhttp.send();
        }
    </script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>