<?php
    include('header.php');
?>

<style type="text/css">
    table img {
        width: 100px;
        height: 100px;
    }
</style>

<?php

      /* add new sub product */
      if(isset($_POST['add']))
      {
        $target_dir = "productImage";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
             $name = $_POST['name'];
        $price = $_POST['price'];
        $sales_price = $_POST['sales_price'];
        $description = $_POST['description'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $weight = $_POST['weight'];

        $age = $_POST['age'];
        $brand = $_POST['brand'];
        $category = $_POST['category'];

        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        //$folder = "./images/" . $filename;

        $upload_dir = 'productImage';
                        
        move_uploaded_file($tempname,$upload_dir.'/'.$filename);
        
        $location = "productImage/".$filename."";

        $insertProduct = mysqli_query($conn,"INSERT INTO `kidit_product`(`product_name`, `product_image`, `product_description`, `product_price`, `product_sales_price`, `product_status`, `brand_id`, `category_id`, `age_id`) VALUES ('".$name."','".$location."','".$description."','".$price."','".$sales_price."','1','".$brand."','".$category."','".$age."')");

        $last_id = mysqli_insert_id($conn);

        $insertProductDetails = mysqli_query($conn,"INSERT INTO `kidit_product_details`(`details_quantity`, `details_size`, `details_weight`, `product_id`) VALUES ('".$quantity."','".$size."','".$weight."','".$last_id."')");

        if ($insertProduct && $insertProductDetails) 
        {
            echo 'upload Success';
            //echo '<meta http-equiv="refresh" content="0;url= product.php">';
        } 
        else 
        {
            echo '<h3>  Failed to upload image!</h3>';
        }
          
        }

      }

      /* Update info */
      if(isset($_POST['update']))
      {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $description = $_POST['edit_description'];
        $weight = $_POST['edit_weight'];
        $quantity = $_POST['edit_quantity'];
        $size = $_POST['edit_size'];
        $sales_price = $_POST['edit_sales_price'];
        $price = $_POST['edit_price'];
        $brand = $_POST['edit_brand'];
        $category = $_POST['edit_category'];
        $age = $_POST['edit_age'];

        if($_FILES["fileToUpload"]["name"] != "")
        {
            $target_dir = "productImage";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image

              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } 
            else
            {
                $filename = $_FILES["fileToUpload"]["name"];
                $tempname = $_FILES["fileToUpload"]["tmp_name"];
                $upload_dir = 'productImage';
                                
                move_uploaded_file($tempname,$upload_dir.'/'.$filename);
                
                $location = "productImage/".$filename."";

                $updateInfo = mysqli_query($conn,"UPDATE `kidit_product` SET `product_name`='".$name."',`product_image`='".$location."',`product_description`='".$description."',`product_price`='".$price."',`product_sales_price`='".$sales_price."',`brand_id`='".$brand."',`category_id`='".$category."',`age_id`='".$age."' WHERE product_id='".$id."'");

                $updateInfo = "UPDATE `kidit_product` SET `product_name`='".$name."' WHERE product_id = '".$id."'";
                mysqli_query($conn, $updateInfo);

                $updateInfoDetails = mysqli_query($conn,"UPDATE `kidit_product_details` SET `details_quantity`='".$quantity."',`details_size`='".$size."',`details_weight`='".$weight."' WHERE product_id='".$id."'");

                if ($updateInfo ) {
                  echo "Record updated successfully ".$name."";
                } else {
                  echo "Error updating record: " . mysqli_error($conn);
                }
            }
        }
        else
        {
             $updateInfo = mysqli_query($conn,"UPDATE `kidit_product` SET `product_name`='".$name."',`product_description`='".$description."',`product_price`='".$price."',`product_sales_price`='".$sales_price."',`brand_id`='".$brand."',`category_id`='".$category."',`age_id`='".$age."' WHERE product_id='".$id."'");

                $updateInfoDetails = mysqli_query($conn,"UPDATE `kidit_product_details` SET `details_quantity`='".$quantity."',`details_size`='".$size."',`details_weight`='".$weight."' WHERE product_id='".$id."'");

                if ($updateInfo && $updateInfoDetails) {
                  echo "Record updated successfully";
                  echo($id);
                } else {
                  echo "Error updating record: " . mysqli_error($conn);
                }
        }
      }

      /* Delete */
      if(isset($_POST['delete']))
      {
        $id = $_POST['delete_id'];

        $deleteInfoDetails = mysqli_query($conn,"DELETE FROM `kidit_product_details` WHERE product_id = '".$id."'");
        $deleteInfo = mysqli_query($conn,"DELETE FROM `kidit_product` WHERE product_id = '".$id."'");

        if ($deleteInfo && $deleteInfoDetails) {
          echo "Record delete successfully";
        } else {
          echo "Error delete record: " . mysqli_error($conn);
        }

      }
?>
<br>
        <div class="container-fluid">
        <div class="col-md-12 text-right" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Product</button>
        </div>
         <!-- The Modal -->
          <div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Add New Product</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data">
                    <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Product Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" required>
                  </div>
                  <div class="form-group">
                    <label for="price">Price<span style="color: red;">*</span></label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Description<span style="color: red;">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="size">Size(cm x cm)<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="size" id="size" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity<span style="color: red;">*</span></label>
                    <input type="number" step="1" class="form-control" name="quantity" id="quantity" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Product Image<span style="color: red;">*</span></label>
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" required>
                  </div>
                <div class="form-group">
                    <label for="sales_price">Sales Price</label>
                    <input type="number" step="0.01" class="form-control" name="sales_price" id="sales_price">
                  </div>
                <div class="form-group">
                    <label for="weight">Weight(kg) <span style="color: red;">*</span></label>
                    <input type="number" step="0.001" class="form-control" name="weight" id="weight" required>
                </div>
                <div class="form-group">
                    <label for="category">Category<span style="color: red;">*</span></label>
                    <select class="form-control" name="category" id="category" required>
                    <?php 
                        $categoryQuery = mysqli_query($conn,"SELECT * FROM kidit_category WHERE category_status ='1' ORDER BY category_name ASC");
                        while ($categoryResult = mysqli_fetch_array($categoryQuery))
                        {
                            echo'<option value='.$categoryResult['category_id'].'>'.$categoryResult['category_name'].'</option>';
                        }
                    ?>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="age">Age<span style="color: red;">*</span></label>
                    <select class="form-control" name="age" id="age" required>
                    <?php 
                        $categoryQuery = mysqli_query($conn,"SELECT * FROM kidit_age WHERE age_status = '1'");
                        while ($categoryResult = mysqli_fetch_array($categoryQuery))
                        {
                            echo'<option value='.$categoryResult['age_id'].'>'.$categoryResult['age_range'].'</option>';
                        }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand<span style="color: red;">*</span></label>
                    <select class="form-control" name="brand" id="brand" required>
                    <?php 
                        $categoryQuery = mysqli_query($conn,"SELECT * FROM kidit_brand WHERE brand_status = '1' ORDER BY brand_name ASC");
                        while ($categoryResult = mysqli_fetch_array($categoryQuery))
                        {
                            echo'<option value='.$categoryResult['brand_id'].'>'.$categoryResult['brand_name'].'</option>';
                        }
                    ?>
                    </select>
                  </div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <button type="submit" name="add" class="btn btn-danger">Add</button>
      </form>
        </div>
      </div>
    </div>
  </div>
  
        <br>
        <br>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price(RM)</th>
            <th>Details</th>
            <th>Category</th>
            <th>Age</th>
            <th>Brand</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $runQuery = mysqli_query($conn,"SELECT * FROM kidit_product");
    $no = 1;
    while ($productArray = mysqli_fetch_array($runQuery)) {

        if($productArray['product_status'] == 1)
        {
            $status = '<input type="checkbox" name="status" value="status" checked>';
        }
        else
        {
            $status = '<input type="checkbox" name="status" value="status">';
        }

        if($productArray['product_sales_price'] > 0)
        {
            $sales = ' Original : '.$productArray['product_price'].' <br>Sales : '.$productArray['product_sales_price'].' ';
        }
        else
        {
            $sales = ''.$productArray['product_price'].'';
        }

        $checkCategory = mysqli_query($conn,"SELECT * FROM kidit_category WHERE category_id = '".$productArray['category_id']."'");
        $category = mysqli_fetch_assoc($checkCategory);

        $checkAge = mysqli_query($conn,"SELECT * FROM kidit_age WHERE age_id = '".$productArray['age_id']."'");
        $age = mysqli_fetch_assoc($checkAge);

        $checkBrand = mysqli_query($conn,"SELECT * FROM kidit_brand WHERE brand_id = '".$productArray['brand_id']."'");
        $brand = mysqli_fetch_assoc($checkBrand);

        $checkDetails = mysqli_query($conn,"SELECT * FROM kidit_product_details WHERE product_id = '".$productArray['product_id']."'");
        $details = mysqli_fetch_assoc($checkDetails);

        echo'<tr>
            <td>'.$no.'</td>
            <td><img src="'.$productArray['product_image'].'"/></td>
            <td>'.$productArray['product_name'].'</td>
            <td width="20%">'.$productArray['product_description'].'</td>
            <td width="13%">'.$sales.'</td>
            <td width="15%">Quantity : '.$details['details_quantity'].'<br>Size : '.$details['details_size'].'cm<br>Weight : '.$details['details_weight'].'kg</td>
            <td>'.$category['category_name'].'</td>
            <td>'.$age['age_range'].'</td>
            <td>'.$brand['brand_name'].'</td>
            <td style="text-align:center;">'.$status.'</td>
            <td style="text-align:center"><a data-toggle="modal" data-id="'.$productArray['product_id'].'" data-name = "'.$productArray['product_name'].'" data-image ="'.$productArray['product_image'].'" data-description="'.$productArray['product_description'].'" data-price ="'.$productArray['product_price'].'" data-sales-price="'.$productArray['product_sales_price'].'" data-quantity = "'.$details['details_quantity'].'" data-size = "'.$details['details_size'].'" data-weight = "'.$details['details_weight'].'" data-category = "'.$category['category_id'].'" data-age = "'.$age['age_id'].'" data-brand = "'.$brand['brand_id'].'" href="#frmEdit" class="btn frmEdit btn-default btn-sm header-btn">Modify</a><a data-toggle="modal" data-id="'.$productArray['product_id'].'"  href="#frmDelete" class="btn frmDelete btn-default btn-sm header-btn">Delete</a></td>
        </tr>';
 
        ++$no;
    }
?>
    </tbody>
</table>

    <script type="text/javascript">
        $(document).ready(function () {
    $('#example').DataTable({
        scrollX: true,
    });
});
    </script>
</div>
  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>  
    $(document).ready(function () {
    $('#example').DataTable();
});
    </script>  

     <!--MODAL EDIT START-->
    <script>
      $(document).ready(function() {
        $(document).on('click', '.frmEdit', function(e) {

           var id = $(this).attr("data-id");
           var name = $(this).attr("data-name");
           var image = $(this).attr("data-image");
           var description = $(this).attr("data-description");
           var price = $(this).attr("data-price");
           var sales_price = $(this).attr("data-sales-price");
           var quantity = $(this).attr("data-quantity");
           var weight = $(this).attr("data-weight");
           var size = $(this).attr("data-size");
           var category = $(this).attr("data-category");
           var brand = $(this).attr("data-brand");
           var age = $(this).attr("data-age");

           $('#edit_image').attr('src',image);

           $("#edit_name").val(name);
           $("#edit_id").val(id);
           $("#edit_description").val(description);
           $("#edit_price").val(price);
           $("#edit_sales_price").val(sales_price);
           $("#edit_quantity").val(quantity);
           $("#edit_weight").val(weight);
           $("#edit_size").val(size);
           $("#edit_category").val(category);
           $("#edit_brand").val(brand);
           $("#edit_age").val(age);
          
        });

      });
    </script>

          <div class="modal fade"  id="frmEdit" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Add New Product</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data">
                    <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Product Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="edit_name" id="edit_name" required>
                  </div>
                  <div class="form-group">
                    <label for="price">Price<span style="color: red;">*</span></label>
                    <input type="number" step="0.01" class="form-control" name="edit_price" id="edit_price" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Description<span style="color: red;">*</span></label>
                    <textarea class="form-control" id="edit_description" name="edit_description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="size">Size(cm x cm)<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="edit_size" id="edit_size" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity<span style="color: red;">*</span></label>
                    <input type="number" step="1" class="form-control" name="edit_quantity" id="edit_quantity" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Product Image</label><br>
                    <img name="edit_image" id="edit_image" width="100" height="100" />
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                <div class="form-group">
                    <label for="sales_price">Sales Price</label>
                    <input type="number" step="0.01" class="form-control" name="edit_sales_price" id="edit_sales_price">
                  </div>
                <div class="form-group">
                    <label for="weight">Weight(kg) <span style="color: red;">*</span></label>
                    <input type="number" step="0.001" class="form-control" name="edit_weight" id="edit_weight" required>
                </div>
                <div class="form-group">
                    <label for="category">Category<span style="color: red;">*</span></label>
                    <select class="form-control" name="edit_category" id="edit_category" required>
                    <?php 
                        $categoryQuery = mysqli_query($conn,"SELECT * FROM kidit_category WHERE category_status ='1' ORDER BY category_name ASC");
                        while ($categoryResult = mysqli_fetch_array($categoryQuery))
                        {
                            echo'<option value='.$categoryResult['category_id'].'>'.$categoryResult['category_name'].'</option>';
                        }
                    ?>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="age">Age<span style="color: red;">*</span></label>
                    <select class="form-control" name="edit_age" id="edit_age" required>
                    <?php 
                        $categoryQuery = mysqli_query($conn,"SELECT * FROM kidit_age WHERE age_status = '1'");
                        while ($categoryResult = mysqli_fetch_array($categoryQuery))
                        {
                            echo'<option value='.$categoryResult['age_id'].'>'.$categoryResult['age_range'].'</option>';
                        }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand<span style="color: red;">*</span></label>
                    <select class="form-control" name="edit_brand" id="edit_brand" required>
                    <?php 
                        $categoryQuery = mysqli_query($conn,"SELECT * FROM kidit_brand WHERE brand_status = '1' ORDER BY brand_name ASC");
                        while ($categoryResult = mysqli_fetch_array($categoryQuery))
                        {
                            echo'<option value='.$categoryResult['brand_id'].'>'.$categoryResult['brand_name'].'</option>';
                        }
                    ?>
                    </select>
                  </div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <input type="hidden" name="edit_id" id="edit_id"/>
          <button type="submit" name="update" class="btn btn-danger">Update</button>
      </form>
        </div>
      </div>
    </div>
  </div>

<!-- MODAL DELETE START -->
    <script>
      $(document).ready(function() {
        $(document).on('click', '.frmDelete', function(e) {

           var id = $(this).attr("data-id");
          
           $("#delete_id").val(id);
        
          
        });

      });
    </script>
    <div class="modal fade" id="frmDelete" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title">
            </h4>
          </div>
          <div class="modal-body no-padding">
            <form method="POST" autocomplete="off">
            <h5 class="text-center">Are you sure you want to delete this record ?</h5>
            <br><br>
            <footer class="text-center" style="margin-bottom:10px;">
              <input type="hidden" name="delete_id" id="delete_id">
              <input type="hidden" name="supplier_delete_rate" id="supplier_delete_rate">
              <button type="submit" id="delete" name="delete" class="btn btn-primary">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </footer>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- MODAL DELETE END -->

</body>  
</html>  