<?php
include('config.php');
$setError = 1;
$displayError = "No applicant found!";
$q = strtolower($_GET['q']);

$query = mysqli_query($conn, "SELECT * FROM applicants ORDER BY id DESC");

if (!empty($q)) {
  while ($row = mysqli_fetch_assoc($query)) {
    $applicant_id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $qualification = $row['qualification'];
    $institution = $row['institution'];
    $skills = $row['skills'];
    $experience = $row['experience'];
    // to add years to number of experience
    $exp = strtolower($experience).' years';
    $resume = $row['resume'];

    if (
      strpos(strtolower($name), $q) !== false ||
      strpos(strtolower($email), $q) !== false ||
      strpos(strtolower($phone), $q) !== false ||
      strpos(strtolower($address), $q) !== false ||
      strpos(strtolower($qualification), $q) !== false ||
      strpos(strtolower($institution), $q) !== false ||
      strpos(strtolower($skills), $q) !== false ||
      strpos($exp, $q) !== false ||
      strpos(strtolower($resume), $q) !== false
    ) {
      $setError = 0;

      echo '<tr>
            <td>' . $name . '</td>
            <td>' . $email . '</td>
            <td>' . $phone . '</td>
            <td>' . $qualification . '</td>
            <td>' . $experience . ' Years</td>
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
                            href="report.php?getid=' . $applicant_id . '">
                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                            View
                        </a>
                        <button id="' . $row['id'] . '" type="button" class="dropdown-item" onclick="edit(this.id)"
                            style="padding: 0.25rem 0.5rem;" data-toggle="modal"
                            data-target="#applicantEdit" data-userid="'.$applicant_id.'"
                            data-name="' . $name . '" data-email="'.$email.'"
                            data-phone="' . $phone . '" data-address="'.$address.'"
                            data-qualification="' . $qualification . '" data-institution="'.$institution.'"
                            data-skills="' . $skills . '" data-experience="'.$experience.'">
                            <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                            Edit
                        </button>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="php/delete.php?id='.$applicant_id.'"
                            style="color: red; padding: 0rem 0.9rem;">
                            <i class="fas fa-trash fa-sm fa-fw mr-2 text-danger"></i>
                            Delete
                        </a>
                    </div>
                </div>
            </td>
        </tr>';
    }
  }

  if ($setError != 0) {
    echo '<tr> <td style="text-align: center;" colspan="6">' . $displayError . '</td> </tr>';
  }

} else {
  while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>
          <td>' . $row['name'] . '</td>
          <td>' . $row['email'] . '</td>
          <td>' . $row['phone'] . '</td>
          <td>' . $row['qualification'] . '</td>
          <td>' . $row['experience'] . ' Years</td>
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
                          href="report.php?getid=' . $row['id'] . '">
                          <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                          View
                      </a>
                      <button id="'.$row['id'].'" type="button" class="dropdown-item" onclick="edit(this.id)"
                          style="padding: 0.25rem 0.5rem;" data-toggle="modal"
                          data-target="#applicantEdit">
                          <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                          Edit
                      </button>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="php/delete.php?id=' . $row['id'] . '"
                          style="color: red; padding: 0rem 0.9rem;">
                          <i class="fas fa-trash fa-sm fa-fw mr-2 text-danger"></i>
                          Delete
                      </a>
                  </div>
              </div>
          </td>
      </tr>';
  }

}


?>