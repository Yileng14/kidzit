<?php
    session_start();
    include('../conn.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
  <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

</head>
<body>

     <div class="container-fluid">
        <div class="col-md-12 text-right" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Promo Code</button>
        </div>
         <!-- The Modal -->
  <div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Promo Code</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form method="POST">
          <div class="row">
            <div class="col-md-12"> 
            <div class="form-group">
            <label for="name">Promo Code Name<span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Promo Type<span style="color: red;">*</span></label>
              <select class="form-control" id="type" name="type" onchange="myFunction()" required>
                <option value="free">Free Shipping</option>
                <option value="rm">RM</option>
                <option value="percentage">%</option>
              </select>
            </div>
          </div>
          <div class="col-md-6" name="amountC" id="amountC" style="display:none;"> 
            <div class="form-group">
            <label for="amount">Amount<span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="amount" id="amount">
          </div>
          </div>
          <div class="col-md-12"> 
            <div class="form-group">
            <label for="spending">Minimum Spending (RM)<span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="spending" id="spending" required>
          </div>
          </div>
        </div>
          <br>
          <br>
          <button type="submit" name="add" class="btn btn-danger" style="float: right;">Add</button>
      </form>
        </div>
      </div>
    </div>
  </div>
  
  <script>
function myFunction() {
  var x = document.getElementById("type").value;

  if(x != "free")
  {
    document.getElementById("amountC").style.display = "block";
    document.getElementById("amount").required = true;
  }
  else
  {
    document.getElementById("amountC").style.display = "none";
    document.getElementById("amount").required = false; 
  }
}
</script>
        <br>
        <br>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Promo Code Name</th>
            <th>Amount</th>
            <th>Minimum Spending (RM)</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $runQuery = mysqli_query($conn,"SELECT * FROM kidit_promo_code ORDER BY code_name ASC");
    $no = 1;
    while ($codeArray = mysqli_fetch_array($runQuery)) {

        if($codeArray['code_status'] == 1)
        {
            $status = '<input type="checkbox" name="status" value="status" checked>';
        }
        else
        {
            $status = '<input type="checkbox" name="status" value="status">';
        }

        if($codeArray['code_discount_percentage'] != 0)
        {
            $amount = $codeArray['code_discount_percentage'] .'%';
        }
        else if($codeArray['code_discount_amount'] != 0)
        {
            $amount = 'RM' .$codeArray['code_discount_amount'];
        }
        else if($codeArray['code_free_shipping'] != 0)
        {
            $amount = 'Free Shipping';
        }

        echo'<tr>
            <td>'.$no.'</td>
            <td>'.$codeArray['code_name'].'</td>
            <td>'.$amount.'</td>
            <td>'.$codeArray['code_minimum_spending'].'</td>
            <td style="text-align:center;">'.$status.'</td>
            <td style="text-align:center"><a data-toggle="modal" data-id="'.$codeArray['code_id'].'" data-name = "'.$codeArray['code_name'].'" data-percentage = "'.$codeArray['code_discount_percentage'].'" data-amount = "'.$codeArray['code_discount_amount'].'" data-shipping = "'.$codeArray['code_free_shipping'].'" data-spending="'.$codeArray['code_minimum_spending'].'" href="#frmEdit" class="btn frmEdit btn-default btn-sm header-btn">Modify</a><a data-toggle="modal" data-id="'.$codeArray['code_id'].'"  href="#frmDelete" class="btn frmDelete btn-default btn-sm header-btn">Delete</a></td>
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
    $('#example').DataTable();
});
    </script>  

     <!--MODAL EDIT START-->
    <script>
      $(document).ready(function() {
        $(document).on('click', '.frmEdit', function(e) {

           var id = $(this).attr("data-id");
           var name = $(this).attr("data-name");
           var shipping = $(this).attr("data-shipping");
           var amount = $(this).attr("data-amount");
           var percentage = $(this).attr("data-percentage");
           var spending = $(this).attr("data-spending");

           var free = 'free';
           var rm = 'rm' ;
           var percentage2 = 'percentage' ; 
           
           $("#edit_name").val(name);
           $("#edit_id").val(id);
           $("#edit_spending").val(spending);

           if(shipping != 0)
           {
             $("#edit_type").val(free);
             document.getElementById("amountT").style.display = "none";
             document.getElementById("edit_amount").required = true;
           }
           else if (amount != 0)
           {
             $("#edit_type").val(rm);
             $("#edit_amount").val(amount);
             document.getElementById("amountT").style.display = "block";
             document.getElementById("edit_amount").required = true;
           }
           else if (percentage != 0)
           {
             $("#edit_type").val(percentage2);
             $("#edit_amount").val(percentage);
             document.getElementById("amountT").style.display = "block";
             document.getElementById("edit_amount").required = true;
           }
          
        });

      });

      function myFunction2() {
        var x = document.getElementById("edit_type").value;

        if(x != "free")
        {
          document.getElementById("amountT").style.display = "block";
          document.getElementById("edit_amount").required = true;
        }
        else
        {
          document.getElementById("amountT").style.display = "none";
          document.getElementById("edit_amount").required = false; 
        }
      }
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
          <div class="row">
            <div class="col-md-12"> 
            <div class="form-group">
            <label for="name">Promo Code Name<span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="edit_name" id="edit_name" required>
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Promo Type<span style="color: red;">*</span></label>
              <select class="form-control" id="edit_type" name="edit_type" onchange="myFunction2()" required>
                <option value="free">Free Shipping</option>
                <option value="rm">RM</option>
                <option value="percentage">%</option>
              </select>
            </div>
          </div>
          <div class="col-md-6" name="amountT" id="amountT" style="display:none;"> 
            <div class="form-group">
            <label for="edit_amount">Amount<span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="edit_amount" id="edit_amount">
          </div>
          </div>
          <div class="col-md-12"> 
            <div class="form-group">
            <label for="spending">Minimum Spending (RM)<span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="edit_spending" id="edit_spending" required>
          </div>
          </div>
        </div>
          <br>
          <br>
                    <input type="hidden" value="" id="edit_id" name="edit_id" />
          <button type="submit" name="update" style="float: right;" class="btn btn-danger">Update</button>
                <button type="button" style="float: right;" class="btn btn-default" data-dismiss="modal">Cancel</button>
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