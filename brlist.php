<?php
session_start();
include("../db.php");

// Check if the page is refreshed
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' || $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
if ($pageRefreshed == 1) {
    header("Location: login.php");
}
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$brand_id=$_GET['brand_id'];
///////picture delete/////////
$result=mysqli_query($con,"select brand_id,brand_title from brands where brand_id='$brand_id'")
or die("query is incorrect...");
/*this is delet query*/
mysqli_query($con,"delete from brands where brand_id='$brand_id'")or die("query is incorrect...");
}


$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Brands List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>ID</th><th>Name</th>
                      <a class=" btn btn-primary" href="addbr.php">Add New</a></th></tr></thead>
                    <tbody>
                    <a class=" btn btn-primary" href="editbr.php">Edit Brands</a></th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select * from brands Limit $page1,10")or die ("query 1 incorrect.....");

                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$brand_id</td><td>$brand_title</td>
                        <td>
                        <a class=' btn btn-success' href='brlist.php?brand_id=$brand_id&action=delete'>Delete</a>
                        </td></tr>";
                        }
                       

                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="catlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
<?php
include "footer.php";
?>
