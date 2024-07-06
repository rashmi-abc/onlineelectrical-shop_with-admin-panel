<?php
session_start();
include("../db.php");

// Check if the page is refreshed
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
if ($pageRefreshed == 1) {
    header("Location: login.php");
}

if (isset($_POST['btn_save'])) {
    $brand_id = $_POST['brand_id'];
    $brand_title = $_POST['brand_title'];

    // Update the category title in the database
    mysqli_query($con, "insert into brands (brand_id,brand_title) values ('$brand_id','$brand_title')");
    header("Location: sumit_form.php?success=1");
    mysqli_close($con);
}

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <form action="" method="post" name="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Add Brand</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Brand ID</label>
                                        <input type="text" id="brand_id" name="brand_id"  class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input type="text" id="brand_title" name="brand_title" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Add Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>
