<?php
    include('header.php');
?>


<?php
      /* add new sub age */
      if(isset($_POST['add']))
      {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $date = date("Y-m-d");
        $sixRandomNumber = rand(100000,999999);
        $hashPassword = password_hash($sixRandomNumber, PASSWORD_DEFAULT);

        $checkDuplication = mysqli_num_rows(mysqli_query($conn,"SELECT user_email FROM kidit_user WHERE user_email = '".$email."'"));

        if($checkDuplication == 0)
        {
          $insertSubAge = mysqli_query($conn,"INSERT INTO `kidit_user`(`user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_status`, `user_join_date`, `user_role`) VALUES ('".$fname."','".$lname."','".$email."','".$hashPassword."','1','".$date."','".$role."')");

          if($insertSubAge)
          {
            $to = $email;
            $from = "Kitz-It";//optional
            $fromName = "no reply message";
            $subject = "Temporary Password"; 
            $image = "image/logo.png";

            $htmlContent ='
<html>

<head>
  <style type="text/css">
    a:hover {
      text-decoration: underline !important;
    }
  </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #fcedeb;" leftmargin="0">
  <!--100% body table-->
  <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#fcedeb" >
    <tr>
      <td>
        <table style="background-color: #fcedeb; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td style="height:20px;">&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
                          <tr>
            <td style="text-align:center;">
              <a href="http://localhost/onlineShopping/header.php" title="logo" target="_blank">
                <img width="120" src="'.$image.'" title="logo" alt="logo">
              </a>
            </td>
          </tr>
                <tr>
                  <td style="padding:0 35px;">
                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;">
                      Hello '.$fname.', your account have been created.</h1>
                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                     This is your temporary password
                    </p><br>
                    <div><h2 style="color: blue;">"'.$sixRandomNumber.'"</h2></div>
                    <a href="http://localhost/onlineShopping/index.php#modalLogin" style="background: #ff1616;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login Now</a>
                  </td>
                </tr>
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
              </table>
            </td>
          <tr>
            <td style="height:20px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align:center;">
              <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                &copy; <strong>Kidz-It</strong></p>
            </td>
          </tr>
          <tr>
            <td style="height:80px;">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--/100% body table-->
</body>

</html>';
            //set content - type heeader for sending html email
            $header="MIME-Version:1.0"."\r\n";
            $header.="Content-type:text/html;charset=UTF-8"."\r\n";


            if(mail($to,$subject,$htmlContent,$header))
            {
              $message= "Success: New staff / admin has been added";
              echo "<script>alert('".$message."')</script>";
              echo "<script>alert('Email Send!');</script>";
              echo "<meta http-equiv='refresh'>";
            }
            else
            {
              echo "<script>alert('Email sending failed!');</script>";
            }

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
        $fname = $_POST['edit_fname'];
        $lname = $_POST['edit_lname'];
        $email = $_POST['edit_email'];
        $role = $_POST['edit_role'];

        $updateInfo = "UPDATE `kidit_user` SET `user_firstName`='".$fname."',`user_lastName`='".$lname."',`user_email`='".$email."',`user_role`='".$role."' WHERE user_id = '".$id."'";
        
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

        if ($_SESSION['user_id'] = $id )
        {
          echo"Can't delete yourself";
        }
        else
        {
            $deleteInfo = "DELETE FROM `kidit_user` WHERE user_id = '".$id."'";

          if (mysqli_query($conn, $deleteInfo)) {
            echo "Record delete successfully";
          } else {
            echo "Error delete record: " . mysqli_error($conn);
          }
        }

      }
?>
<br>
            <div class="container-fluid">
        <div class="col-md-12 text-right" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Staff / Admin</button>
        </div>
  
        <br>
        <br>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Joined Date</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $runQuery = mysqli_query($conn,"SELECT * FROM kidit_user WHERE user_role !='customer'");
    $no = 1;
    while ($userArray = mysqli_fetch_array($runQuery)) {

        if($userArray['user_status'] == 1)
        {
            $status = '<input type="checkbox" name="status" value="status" checked>';
        }
        else
        {
            $status = '<input type="checkbox" name="status" value="status">';
        }

        echo'<tr>
            <td>'.$no.'</td>
            <td>'.$userArray['user_firstName'].' '.$userArray['user_lastName'].'</td>
            <td>'.$userArray['user_email'].'</td>
            <td>'.$userArray['user_role'].'</td>
            <td>'.$userArray['user_join_date'].'</td>
            <td style="text-align:center;">'.$status.'</td>
            <td style="text-align:center"><a data-toggle="modal" data-id="'.$userArray['user_id'].'" data-fname = "'.$userArray['user_firstName'].'" data-lname = "'.$userArray['user_lastName'].'" data-email = "'.$userArray['user_email'].'" data-role = "'.$userArray['user_role'].'" href="#frmEdit" class="btn frmEdit btn-default btn-sm header-btn">Modify</a><a data-toggle="modal" data-id="'.$userArray['user_id'].'"  href="#frmDelete" class="btn frmDelete btn-default btn-sm header-btn">Delete</a></td>
        </tr>';

        ++$no;
    }
?>
    </tbody>
</table>
         <!-- The Modal -->
 <!-- The Modal -->
        <div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Add New Staff / Admin</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data">
                    <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="fname">First Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="fname" id="fname" required>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="lname">Last Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="lname" id="lname" required>
                  </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
              <label for="email">Email address<span style="color: red;">*</span></label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="role">Role<span style="color: red;">*</span></label>
              <select class="form-control" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
            </div>
          </div>
        </div>
          <br>
          <br>
          <button type="submit" name="add" class="btn btn-danger" style="float:right;">Add</button>
      </form>
        </div>
      </div>
    </div>
  </div>
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
              <button type="submit" id="delete" name="delete" class="btn btn-primary">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </footer>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- MODAL DELETE END -->
     <!--MODAL EDIT START-->
    <script>
      $(document).ready(function() {
        $(document).on('click', '.frmEdit', function(e) {

           var id = $(this).attr("data-id");
           var fname = $(this).attr("data-fname");
           var lname = $(this).attr("data-lname");
           var email = $(this).attr("data-email");
           var role = $(this).attr("data-role");
           
           $("#edit_lname").val(lname);
           $("#edit_fname").val(fname);
           $("#edit_id").val(id);
           $("#edit_email").val(email);
           $("#edit_role").val(role);
          
        });

      });
    </script>

         <!-- The Modal -->
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
                    <label for="fname">First Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="edit_fname" id="edit_fname" required>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="lname">Last Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="edit_lname" id="edit_lname" required>
                  </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="edit_email" name="edit_email" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="role">Role<span style="color: red;">*</span></label>
              <select class="form-control" id="edit_role" name="edit_role" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
            </div>
          </div>
        </div>
          <br>
          <br>
          <input type="hidden" name="edit_id" id="edit_id"/>
          <button type="submit" name="update" class="btn btn-danger" style="float:right;">Update</button>
      </form>
        </div>
      </div>
    </div>
  </div>

</body>  
</html>  