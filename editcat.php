<?php
session_start();
include("../db.php");

// Check if the page is refreshed
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
if ($pageRefreshed == 1) {
    header("Location: login.php");
}

if (isset($_POST['btn_save'])) {
    $cat_id = $_POST['cat_id'];
    $cat_title = $_POST['cat_title'];

    // Update the category title in the database
    mysqli_query($con, "UPDATE categories SET cat_title='$cat_title' WHERE cat_id='$cat_id'");
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
                            <h5 class="title">Edit Category</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category ID</label>
                                        <input type="text" id="cat_id" name="cat_id" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" id="cat_title" name="cat_title" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update Category</button>
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
