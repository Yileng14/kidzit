<?php
    include('header.php');
?>


<?php
      /* add new sub brand */
      if(isset($_POST['add']))
      {
        
        $name = trim($_POST['name']);

        $checkDuplication = mysqli_num_rows(mysqli_query($conn,"SELECT brand_name FROM kidit_brand WHERE brand_name = '".$name."'"));

        if($checkDuplication == 0)
        {

          $insertSubBrand = mysqli_query($conn,"INSERT INTO `kidit_brand`(`brand_name`, `brand_status`) VALUES ('".$name."','1')");

          if($insertSubBrand)
          {
            $message= "Success: Sub Brand has been added";
            echo "<script>alert('".$message."')</script>";
            echo"<meta http-equiv='refresh' content='0;url= brand.php'>";

          }
          else
          {
            echo "Error";
          }

        }
        else
        {
          $message= "Duplicated";
          echo "<script>alert('".$message."')</script>";
        }

      }

      /* Update info */
      if(isset($_POST['update']))
      {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];

        $updateInfo = "UPDATE `kidit_brand` SET `brand_name`='".$name."' WHERE brand_id = '".$id."'";
        
        if (mysqli_query($conn, $updateInfo)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
      }

      /* Delete */
      if(isset($_POST['delete']))
      {
        $id = $_POST['delete_id'];

        $deleteInfo = "DELETE FROM `kidit_brand` WHERE brand_id = '".$id."'";

        if (mysqli_query($conn, $deleteInfo)) {
          echo "Record delete successfully";
        } else {
          echo "Error delete record: " . mysqli_error($conn);
        }

      }
?>
<br>
            <div class="container-fluid">
        <div class="col-md-12 text-right" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Sub-Brand</button>
        </div>
         <!-- The Modal -->
  <div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Sub-Brand</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form method="POST">
           <div class="form-group">
            <label for="name">Name<span style="color: red;">*</span></label>
            <input type="name" class="form-control" name="name" id="name" required>
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
            <th>No</th>
            <th>Name</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $runQuery = mysqli_query($conn,"SELECT * FROM kidit_brand ORDER BY brand_name ASC");
    $no = 1;
    while ($brandArray = mysqli_fetch_array($runQuery)) {

        if($brandArray['brand_status'] == 1)
        {
            $status = '<input type="checkbox" name="status" value="status" checked>';
        }
        else
        {
            $status = '<input type="checkbox" name="status" value="status">';
        }

        echo'<tr>
            <td>'.$no.'</td>
            <td>'.$brandArray['brand_name'].'</td>
            <td style="text-align:center;">'.$status.'</td>
            <td style="text-align:center"><a data-toggle="modal" data-id="'.$brandArray['brand_id'].'" data-name = "'.$brandArray['brand_name'].'" href="#frmEdit" class="btn frmEdit btn-default btn-sm header-btn">Modify</a><a data-toggle="modal" data-id="'.$brandArray['brand_id'].'"  href="#frmDelete" class="btn frmDelete btn-default btn-sm header-btn">Delete</a></td>
        </tr>';

        ++$no;
    }
?>
    </tbody>
</table>

    <script type="text/javascript">
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>
</div>
  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>  
    $(document).ready(function () {  
  var trigger = $('.hamburger'),  
      overlay = $('.overlay'),  
     isClosed = false;  
    trigger.click(function () {  
      hamburger_cross();        
    });  
    function hamburger_cross() {  
      if (isClosed == true) {            
        overlay.hide();  
        trigger.removeClass('is-open');  
        trigger.addClass('is-closed');  
        isClosed = false;  
      } else {     
        overlay.show();  
        trigger.removeClass('is-closed');  
        trigger.addClass('is-open');  
        isClosed = true;  
      }  
  }  
  $('[data-toggle="offcanvas"]').click(function () {  
        $('#wrapper').toggleClass('toggled');  
  });    
});  
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
           
           $("#edit_name").val(name);
           $("#edit_id").val(id);
          
        });

      });
    </script>

         <!-- The Modal -->
  <div class="modal fade"  id="frmEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form method="POST">
           <div class="form-group">
            <label for="name">Name<span style="color: red;">*</span></label>
            <input type="name" class="form-control" name="edit_name" id="edit_name" required>
          </div>
          <br>
          <br>
          <input type="hidden" value="" id="edit_id" name="edit_id" />
          <button type="submit" name="update" class="btn btn-danger">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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