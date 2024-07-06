<?php
session_start();

$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' || $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
if ($pageRefreshed) {
    header("Location: login.php");
    exit();
}

include("../db.php");

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['user_id'])) {
    $user_id =$_GET['user_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->query("DELETE FROM user_info WHERE user_id ='$user_id'");
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Manage User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class="text-primary">
                      <tr>
                        <th>User Name</th>
                        <th>User Password</th>
                        <th><a href="adduser.php" class="btn btn-success">Add New</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $result = $con->query("SELECT user_id, email, password FROM user_info") or die("query 2 incorrect.......");

                        while ($row = $result->fetch_assoc()) {
                            $user_id = $row['user_id'];
                            $user_name = $row['email'];
                            $user_password = $row['password'];

                            echo "<tr>
                                    <td>$user_name</td>
                                    <td>$user_password</td>
                                    <td>
                                        <a href='edituser.php?user_id=$user_id' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                            <i class='material-icons'>edit</i>
                                        </a>
                                        <a href='manageuser.php?user_id=$user_id&action=delete' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                            <i class='material-icons'>close</i>
                                        </a>
                                    </td>
                                  </tr>";
                        }

                        $result->free();
                        $con->close();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
include "footer.php";
?>
