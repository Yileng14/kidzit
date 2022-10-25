<?php
    session_start();
    include('../conn.php');
?>
<html lang = "en">  
   <head>  
      <meta charset = "utf-8">  
      <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
  <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<style>  
body {  
    position: relative;  
    overflow-x: hidden;  
    background-color: #CFD8DC;  
}  
body,  
html { height: 100%;}  
.nav .open > a,   
.nav .open > a:hover,   
.nav .open > a:focus {background-color: transparent;}  
#wrapper {  
    padding-left: 0;  
    -webkit-transition: all 0.5s ease;  
    -moz-transition: all 0.5s ease;  
    -o-transition: all 0.5s ease;  
    transition: all 0.5s ease;  
}  
  
#wrapper.toggled {  
    padding-left: 220px;  
}  
  
#sidebar-wrapper {  
    z-index: 1000;  
    left: 220px;  
    width: 0;  
    height: 100%;  
    margin-left: -220px;  
    overflow-y: auto;  
    overflow-x: hidden;  
    background: #ff1616;  
    -webkit-transition: all 0.5s ease;  
    -moz-transition: all 0.5s ease;  
    -o-transition: all 0.5s ease;  
    transition: all 0.5s ease;  
}  
  
#sidebar-wrapper::-webkit-scrollbar {  
  display: none;  
}  
  
#wrapper.toggled #sidebar-wrapper {  
    width: 220px;  
}  
  
#page-content-wrapper {  
    width: 100%;  
    padding-top: 70px;  
}  
  
#wrapper.toggled #page-content-wrapper {  
    position: absolute;  
    margin-right: -220px;  
}  
.navbar {  
  padding: 0;  
}  
  
.sidebar-nav {  
    position: absolute;  
    top: 0;  
    width: 220px;  
    margin: 0;  
    padding: 0;  
    list-style: none;  
}  
  
.sidebar-nav li {  
    position: relative;   
    line-height: 20px;  
    display: inline-block;  
    width: 100%;  
}  
  
.sidebar-nav li:before {  
    content: '';  
    position: absolute;  
    top: 0;  
    left: 0;  
    z-index: -1;  
    height: 100%;  
    width: 3px;  
    background-color: #1c1c1c;  
    -webkit-transition: width .2s ease-in;  
      -moz-transition:  width .2s ease-in;  
       -ms-transition:  width .2s ease-in;  
            transition: width .2s ease-in;  
  
}  
.sidebar-nav li:first-child a {  
    color: #fff;  
    background-color: #1a1a1a;  
}  
.sidebar-nav li:nth-child(5n+1):before {  
    background-color: #ec1b5a;     
}  
.sidebar-nav li:nth-child(5n+2):before {  
    background-color: #79aefe;     
}  
.sidebar-nav li:nth-child(5n+3):before {  
    background-color: #314190;     
}  
.sidebar-nav li:nth-child(5n+4):before {  
    background-color: #279636;     
}  
.sidebar-nav li:nth-child(5n+5):before {  
    background-color: #7d5d81;     
}  
  
.sidebar-nav li:hover:before,  
.sidebar-nav li.open:hover:before {  
    width: 100%;  
    -webkit-transition: width .2s ease-in;  
      -moz-transition:  width .2s ease-in;  
       -ms-transition:  width .2s ease-in;  
            transition: width .2s ease-in;  
  
}  
.sidebar-nav li a {  
    display: block;  
    color: #ddd;  
    text-decoration: none;  
    padding: 10px 15px 10px 30px;      
}  
.sidebar-nav li a:hover,  
.sidebar-nav li a:active,  
.sidebar-nav li a:focus,  
.sidebar-nav li.open a:hover,  
.sidebar-nav li.open a:active,  
.sidebar-nav li.open a:focus{  
    color: #fff;  
    text-decoration: none;  
    background-color: transparent;  
}  
.sidebar-header {  
    text-align: center;  
    width: 100%;  
    display: inline-block;  
}  
.sidebar-brand {  
    height: 112; 
    position: relative;  
    background:#ffffff; 
   padding-top: 1em;  
}  
.sidebar-brand a {  
    color: #ddd;  
}  
.sidebar-brand a:hover {  
    color: #fff;  
    text-decoration: none;  
}  
.dropdown-header {  
    text-align: center;  
    background:#212531;  
    background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);  
}  
.sidebar-nav .dropdown-menu {  
    position: relative;  
    width: 100%;  
    padding: 0;  
    margin: 0;  
    border-radius: 0;  
    border: none;  
    background-color: #222;  
    box-shadow: none;  
}  

.nav.sidebar-nav li a::before {  
    font-family: fontawesome;  
    content: "\f12e";  
    vertical-align: baseline;  
    display: inline-block;  
    padding-right: 5px;  
}  
a[href*="#home"]::before {  
  content: "\f015" !important;  
}  
a[href*="#about"]::before {  
  content: "\f129" !important;  
}  
a[href*="#events"]::before {  
  content: "\f073" !important;  
}  
a[href*="#events"]::before {  
  content: "\f073" !important;  
}  
a[href*="#team"]::before {  
  content: "\f0c0" !important;  
}  
a[href*="#works"]::before {  
  content: "\f0b1" !important;  
}  
a[href*="#pictures"]::before {  
  content: "\f03e" !important;  
}  
a[href*="#videos"]::before {  
  content: "\f03d" !important;  
}  
a[href*="#books"]::before {  
  content: "\f02d" !important;  
}  
a[href*="#art"]::before {  
  content: "\f1fc" !important;  
}  
a[href*="#awards"]::before {  
  content: "\f02e" !important;  
}  
a[href*="#services"]::before {  
  content: "\f013" !important;  
}  
a[href*="#contact"]::before {  
  content: "\f086" !important;  
}  
a[href*="#followme"]::before {  
  content: "\f099" !important;  
  color: #0084b4;  
}  
.hamburger {  
  position: fixed;  
  top: 20px;    
  z-index: 999;  
  display: block;  
  width: 32px;  
  height: 32px;  
  margin-left: 15px;  
  background: transparent;  
  border: none;  
}  
.hamburger:hover,  
.hamburger:focus,  
.hamburger:active {  
  outline: none;  
}  
.hamburger.is-closed:before {  
  content: '';  
  display: block;  
  width: 100px;  
  font-size: 14px;  
  color: #fff;  
  line-height: 32px;  
  text-align: center;  
  opacity: 0;  
  -webkit-transform: translate3d(0,0,0);  
  -webkit-transition: all .35s ease-in-out;  
}  
.hamburger.is-closed:hover:before {  
  opacity: 1;  
  display: block;  
  -webkit-transform: translate3d(-100px,0,0);  
  -webkit-transition: all .35s ease-in-out;  
}  
  
.hamburger.is-closed .hamb-top,  
.hamburger.is-closed .hamb-middle,  
.hamburger.is-closed .hamb-bottom,  
.hamburger.is-open .hamb-top,  
.hamburger.is-open .hamb-middle,  
.hamburger.is-open .hamb-bottom {  
  position: absolute;  
  left: 0;  
  height: 4px;  
  width: 100%;  
}  
.hamburger.is-closed .hamb-top,  
.hamburger.is-closed .hamb-middle,  
.hamburger.is-closed .hamb-bottom {  
  background-color: #1a1a1a;  
}  
.hamburger.is-closed .hamb-top {   
  top: 5px;   
  -webkit-transition: all .35s ease-in-out;  
}  
.hamburger.is-closed .hamb-middle {  
  top: 50%;  
  margin-top: -2px;  
}  
.hamburger.is-closed .hamb-bottom {  
  bottom: 5px;    
  -webkit-transition: all .35s ease-in-out;  
}  
  
.hamburger.is-closed:hover .hamb-top {  
  top: 0;  
  -webkit-transition: all .35s ease-in-out;  
}  
.hamburger.is-closed:hover .hamb-bottom {  
  bottom: 0;  
  -webkit-transition: all .35s ease-in-out;  
}  
.hamburger.is-open .hamb-top,  
.hamburger.is-open .hamb-middle,  
.hamburger.is-open .hamb-bottom {  
  background-color: #1a1a1a;  
}  
.hamburger.is-open .hamb-top,  
.hamburger.is-open .hamb-bottom {  
  top: 50%;  
  margin-top: -2px;    
}  
.hamburger.is-open .hamb-top {   
  -webkit-transform: rotate(45deg);  
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);  
}  
.hamburger.is-open .hamb-middle { display: none; }  
.hamburger.is-open .hamb-bottom {  
  -webkit-transform: rotate(-45deg);  
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);  
}  
.hamburger.is-open:before {  
  content: '';  
  display: block;  
  width: 100px;  
  font-size: 14px;  
  color: #fff;  
  line-height: 32px;  
  text-align: center;  
  opacity: 0;  
  -webkit-transform: translate3d(0,0,0);  
  -webkit-transition: all .35s ease-in-out;  
}  
.hamburger.is-open:hover:before {  
  opacity: 1;  
  display: block;  
  -webkit-transform: translate3d(-100px,0,0);  
  -webkit-transition: all .35s ease-in-out;  
}  
.overlay {  
    position: fixed;  
    display: none;  
    width: 100%;  
    height: 100%;  
    top: 0;  
    left: 0;  
    right: 0;  
    bottom: 0;   
    z-index: 1;  
}  
</style>  

<?php
      /* add new sub category */
      if(isset($_POST['add']))
      {
        
        $name = trim($_POST['name']);

        $checkDuplication = mysqli_num_rows(mysqli_query($conn,"SELECT category_name FROM kidit_category WHERE category_name = '".$name."'"));

        if($checkDuplication == 0)
        {

          $insertSubCategory = mysqli_query($conn,"INSERT INTO `kidit_category`(`category_name`, `category_category`,`category_status`) VALUES ('".$name."','".$category."','1')");

          if($insertSubCategory)
          {
            $message= "Success: Sub Category has been added";
            echo "<script>alert('".$message."')</script>";
            echo"<meta http-equiv='refresh' content='0;url= category.php'>";

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
?>
<body>  
<div id="wrapper">  
   <div class="overlay"></div>  
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">  
     <ul class="nav sidebar-nav">  
       <div class="sidebar-header">  
         <div class="sidebar-brand">  
           <img src="../image/logo.png"/ width="80" height="80"/>
         </div> 
       </div>  
       <li><a id="home">Home</a></li>  
       <li><a id="transaction">Transaction</a></li>  
       <li><a id="product">Product</a> </li>  
       <li><a id="category">Category</a></li>
       <li><a id="sales">Sales</a> </li>  
       <li><a id="analytic">Analytic</a></li>
       <li><a id="reporting">Reporting</a></li>
       <li><a id="layout">Layout</a></li>  
       <li><a id="admin">Admin</a></li>  
      </ul>  
  </nav>  
         
        <div id="page-content-wrapper">  
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">  
                <span class="hamb-top"></span>  
                <span class="hamb-middle"></span>  
                <span class="hamb-bottom"></span>  
            </button>  
            <div class="container-fluid">
        <div class="col-md-6 text-left" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Sub-Category</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Category
                </button>
                <div class="dropdown-menu" style="text-align: center;">
                  <a class="dropdown-item" href="#">General</a>
                  <a class="dropdown-item" href="#">Brand</a>
                  <a class="dropdown-item" href="#">Age</a>
                </div>
        </div>

                <div class="col-md-6 text-right" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Sub-Category</button>

                
        </div>
         <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Sub-Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form method="POST">
           <div class="form-group">
            <label for="name">Name</label>
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
<div class="table-responsive">

  <!--Table-->
  <table class="table table-hover">

    <!--Table head-->
    <thead>
      <tr class="table-primary">
        <th>#</th>
        <th class="th-sm">Name</th>
        <th class="th-sm" style="text-align:center">Status</th>
        <th class="th-sm" style="text-align:center">Action</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
<?php 
    $runQuery = mysqli_query($conn,"SELECT * FROM kidit_category ORDER BY category_name ASC");
    $no = 1;
    while ($categoryArray = mysqli_fetch_array($runQuery)) {

        if($categoryArray['category_status'] == 1)
        {
            $status = '<input type="checkbox" name="status" value="status" checked>';
        }
        else
        {
            $status = '<input type="checkbox" name="status" value="status">';
        }

        echo'
        <tr class="table-light">
        <th scope="row">'.$no.'</th>
        <td>'.$categoryArray['category_name'].'</td>
        <td style="text-align:center;">'.$status.'</td>
        <td style="text-align:center;"><button>Modify</button><button>Delete</button></td>
      </tr>';

        ++$no;
    }
?>
    
    </tbody>
    <!--Table body-->

  </table>
  <!--Table-->

</div>

</div>
        </div>    
    </div>  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"> </script>  


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
</body>  
</html>  