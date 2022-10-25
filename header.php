<?php
    session_start();
    include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

      @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
      *
      {
        margin: 0;
        padding: 0;
        outline: none;
        box-sizing: border-box;
        font-family: 'Times New Roman', serif;
      }

      body
      {
        background: #fcedeb;
      }

      /* Navigation Bar */
      nav
      {
        background: #FFFFFF;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        height: 70px;
        padding: 0 50px;
      }

      nav .nav-items
      {
        display: flex;
        flex: 1;
        padding: 0 0 0 40px;
      }
        
      nav .nav-items li
      {
        list-style: none;
        padding: 0 15px;
      }

      nav .nav-items li a , .dropdown .dropbtn
      {
        color:  #000000;
        font-size: 18px;
        font-weight: 500;
        text-decoration: none;
      }

      nav .nav-items li a:hover , .dropdown .dropbtn:hover
      {
        color: #ff3d00;
      }

      nav form
      {
        display: flex;
        height: 40px;
        padding: 2px;
        background: #1e232b;
        min-width: 18%!important;
        border-radius: 2px;
        border: 1px solid rgba(155,155,155,0.2);
      }

      nav form .search-data
      {
        width: 100%;
        height: 100%;
        padding: 0 10px;
        color: black;
        font-size: 17px;
        border: none;
        font-weight: 500;
        background: white;
        z-index: 3;
      }

      nav form button
      {
        padding: 0 15px;
        color: #fff;
        font-size: 17px;
        background: #ff8080;
        border: none;
        border-radius: 2px;
        cursor: pointer;
        z-index: 4;
      }

      .nav-link 
      {
          padding: 0;
      }

      nav form button:hover
      {
        background: #e63600;
      }

      nav .menu-icon,
      nav .cancel-icon,
      nav .search-icon,
      {
        width: 40px;
        text-align: center;
        margin: 0 50px;
        font-size: 18px;
        color: #000;
        cursor: pointer;
        display: none;
      }

      .cart
      {
        font-size:25px;
        padding: 12px;
        float: right;
      }

      .cart i {
        font-size: 25px; 
        color: black;
      }

      #lblCartCount 
      {
        font-size: 15px;
        background: red;
        color: #fff;
        padding: 0 5px;
        vertical-align: top;
        margin-left: -8px;
      }
      
      .badge 
      {
            padding-left: 7px;
    padding-right: 7px;
    padding-top: 10p;
    font-size: 10px;
        -webkit-border-radius: 9px;
        -moz-border-radius: 9px;
        border-radius: 9px;
        position: absolute;
    right: 56px;
      }

      .label-warning[href],
      .badge-warning[href]
      {
        background-color: #c67605;
      }

      nav .menu-icon span,
      nav .cancel-icon,
      nav .search-icon
      {
        display: none;
      }

      @media (max-width: 1245px) 
      {
        nav
        {
          padding: 0 50px;
        }
      }

      @media (max-width: 1140px)
      {
        nav
        {
          padding: 0px 30px;
        }

        nav .logo
        {
          flex: 2;
          text-align: center;
        }

        nav .nav-items
        {
          position: fixed;
          z-index: 5;
          top: 68px;
          width: 73%;
          left: -100%;
          height: 100%;
          padding: 10px 50px 0 50px;
          text-align: center;
          background: white;
          display: inline-block;
          transition: left 0.3s ease;
          overflow-y: scroll;
        }

        nav .nav-items.active
        {
          left: 0px;
        }

        nav .nav-items li
        {
          line-height: 40px;
          margin: 30px 0;
        }

        nav .nav-items li a , .dropdown .dropbtn
        {
          font-size: 20px;
        }

        nav form
        {
          position: absolute;
          top: 80px;
          right: 50px;
          opacity: 0;
          pointer-events: none;
          transition: top 0.3s ease, opacity 0.1s ease;
        }

        nav form.active
        {
          top: 95px;
          opacity: 1;
          pointer-events: auto;
        }

        nav form:before
        {
          position: absolute;
          content: "";
          top: -13px;
          right: 30px;
          width: 0;
          height: 0; 
          z-index: 2;
          border: 10px solid transparent;
          border-bottom-color: #1e232b;
          margin: -20px 0 0;
        }

        nav form:after
        {
          position: absolute;
          content: '';
          height: 60px;
          padding: 2px;
          background: #1e232b;
          border-radius: 2px;
          min-width: calc(100% + 20px);
          z-index: 2;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
        }

        nav .menu-icon
        {
          display: block;
        }

        nav .search-icon,
        nav .menu-icon span
        {
          display: block;
        }

        nav .menu-icon span.hide,
        nav .search-icon.hide
        {
          display: none;
        }

        nav .cancel-icon.show
        {
          display: block;
        }
      }

      .content
      {
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
      }

      .content header
      {
        font-size: 30px;
        font-weight: 700;
      }

      .content .text
      {
        font-size: 30px;
        font-weight: 700;
      }

      .space
      {
        margin: 10px 0;
      }

      nav .logo.space
      {
        color: red;
        padding: 0 5px 0 0;
      }

      @media (max-width: 980px)
      {
        nav .menu-icon,
        nav .cancel-icon,
        nav .search-icon
        {
          margin: 0 20px;
        }

        nav form
        {
          right: 30px;
        }
      }

        nav .menu-icon,
        nav .cancel-icon,
        nav .search-icon
        {
          margin: 0 10px;
          font-size: 16px;
          z-index: 2px;
        }

        nav
        {
          padding: 10px;
        }

        nav .logo 
        {
          text-align: left;
        }
      }

      .content
      {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .content header
      {
        font-size: 30px;
        font-weight: 700;
      }

      .content .text
      {
        font-size: 30px;
        font-weight: 700;
      }

      .content .space
      {
        margin: 10px 0;
      }

      .dropdown .dropbtn {
        border: none;
        background-color: inherit;
        font-family: inherit; 
        padding: 0px;
      }

      .dropdown2 
      {
        float: right;
        overflow: hidden;
      }

      .dropdown2 .dropbtn 
      {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        background-color: inherit;
        margin: 0; 
      }

      .dropdown2 .dropdown-content 
      {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 4;
      }

      .dropdown .dropdown-content 
      {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 4;
      }

      /* Links inside the dropdown */
      .dropdown .dropdown-content a:hover
      {
        color: black;
      }

      .dropdown-content a 
      {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
      }

      .dropdown-content a:hover
      {
        background-color: #ddd;
      }

      .dropdown:hover .dropdown-content, .dropdown2:hover .dropdown-content
      {
        display: block;
      }

      .dropbtn img 
      {
        border-radius: 50%;
        border: 2px solid #555;
      }
      
      .fa-caret-down 
      {
          color: black;
      }

      .modal-header {
border-bottom: none; 
   padding: 1rem 1rem;
  }


input {
  outline: none;
  border: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #adadad;}
input:-moz-placeholder { color: #adadad;}
input::-moz-placeholder { color: #adadad;}
input:-ms-input-placeholder { color: #adadad;}

textarea::-webkit-input-placeholder { color: #adadad;}
textarea:-moz-placeholder { color: #adadad;}
textarea::-moz-placeholder { color: #adadad;}
textarea:-ms-input-placeholder { color: #adadad;}

input[type=submit] {
  outline: none !important;
  border: none;
  background: transparent;
}

input[type=submit]:hover {
  cursor: pointer;
}

iframe {
  border: none !important;
}

.txt1 {
  font-family: Poppins-Regular;
  font-size: 13px;
  color: #666666;
  line-height: 1.5;
}

.txt2 {
  font-family: Poppins-Regular;
  font-size: 13px;
  color: #333333;
  line-height: 1.5;
}

.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
    width: 100%;
    max-height: 100vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 10px;
}

.wrap-login100 {
  width: 390px;
}

.login100-form {
  width: 100%;
}

.login100-form-title {
  display: block;
  font-family: Poppins-Bold;
  font-size: 30px;
  line-height: 1.2;
  text-align: center;
  color: grey;
}
.login100-form-title i {
  font-size: 60px;
}

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #adadad;
  margin-bottom: 15px;
}

.input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #555555;
  line-height: 1.2;
  
  display: block;
  width: 100%;
  height: 45px;
  background: transparent;
  padding: 0 5px;
}


.btn-show-pass {
  font-size: 15px;
  color: #999999;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  height: 100%;
  top: 0;
  right: 0;
  padding-right: 5px;
  cursor: pointer;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.btn-show-pass:hover {
  color: #6a7dfe;
  color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
  color: -o-linear-gradient(left, #21d4fd, #b721ff);
  color: -moz-linear-gradient(left, #21d4fd, #b721ff);
  color: linear-gradient(left, #21d4fd, #b721ff);
}

.btn-show-pass.active {
  color: #6a7dfe;
  color: -webkit-linear-gradient(left, #21d4fd, #b721ff);
  color: -o-linear-gradient(left, #21d4fd, #b721ff);
  color: -moz-linear-gradient(left, #21d4fd, #b721ff);
  color: linear-gradient(left, #21d4fd, #b721ff);
}

.container-login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 13px;
}

.container-login100 span .star
{
  color: red;
}

.wrap-login100-form-btn {
  width: 100%;
  display: block;
  position: relative;
  z-index: 1;
  border-radius: 25px;
  overflow: hidden;
  margin: 0 auto;
}

.login100-form-bgbtn {
  position: absolute;
  z-index: -1;
  width: 300%;
  height: 100%;
  background: #a64bf4;
  background: -webkit-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
  background: -o-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
  background: -moz-linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
  background: linear-gradient(right, #21d4fd, #b721ff, #21d4fd, #b721ff);
  top: 0;
  left: -100%;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn {
  font-family: Poppins-Medium;
  font-size: 15px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
}

.wrap-login100-form-btn:hover .login100-form-bgbtn {
  left: 0;
}


/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 576px) {
  .wrap-login100 {
    padding: 28px 15px 33px 15px;
  }
}

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 0px;
  pointer-events: none;

  font-family: Poppins-Regular;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  font-size: 16px;
  color: #c80000;

  display: block;
  position: absolute;
  background-color: #fff;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 5px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}

/*[ PADDING ]
///////////////////////////////////////////////////////////
*/

.p-t-115 {padding-top: 115px;}

.p-b-26 {padding-bottom: 26px;}

.p-b-48 {padding-bottom: 48px;}

.toggle {
  background: none;
  border: none;
  color: #337ab7;
  /*display: none;*/
  /*font-size: .9em;*/
  font-weight: 600;
  /*padding: .5em;*/
  position: absolute;
  right: .75em;
  top: 2.25em;
  z-index: 9;
}

#eyeIcon {
  font-size: 1rem;
}

.modal-dialog-slideout {  
  position:fixed;
  right: 0;
  margin: auto;
  width: 40%;
  height: 100%;
  -webkit-transform: translate3d(0%, 0, 0);
  -ms-transform: translate3d(0%, 0, 0);
  -o-transform: translate3d(0%, 0, 0);
  transform: translate3d(0%, 0, 0);
}


@media screen and (max-width: 1030px) {
  .dropdown {
    float: none;
    width: 100%;
  }
  .dropdown .dropdown-content {
    position: relative;
    display: none;
    text-align: center;
    right: none;
    width: 100%;
    box-shadow: none;
    
    background-color: #fff;
    z-index: none;
  }
.dropdown .dropbtn {
        display: block;
    width: 100%;

  }

    .dropdown .dropdown-content a{

    background-color: #fff;

        float: none;
    display: block;
    text-align: center;

  }

  .modal-body
  {padding: 0px;}

  .modal-dialog-slideout {  
  width: 80%;
}

}
.modal.fade .modal-dialog.modal-dialog-slideout {-webkit-transform: translate(100%,0)scale(1);transform: translate(100%,0)scale(1);}
.modal.fade.show .modal-dialog.modal-dialog-slideout {-webkit-transform: translate(0,0);transform: translate(0,0);display: flex;align-items: stretch;-webkit-box-align: stretch;height: 100%;}
.modal.fade.show .modal-dialog.modal-dialog-slideout .modal-body{overflow-y: auto;overflow-x: hidden;}
.modal-dialog-slideout .modal-content{border: 0;}
.modal-dialog-slideout .modal-header, .modal-dialog-slideout .modal-footer {height: 69px; display: block;} 
.modal-dialog-slideout .modal-header h5 {float:left;     font-weight: bolder;}
.modal-dialog-slideout .modal-header { 
box-shadow: 0 0 3px;}

/*cart */
.tableHead {
  display: table;
  width: 100%;
  font-family: $fontSans;
  font-size: .75em;
  }

  .tableHead li {
    display: table-cell;
    padding: 1em 0;
    text-align: center;
}
    .tableHead li .prodHeader {
      text-align: left;
    }

    .container-fixed {
      padding: 0px;
}
.item1 { grid-area: productImage; }
.item2 { grid-area: productName; }
.item3 { grid-area: productPrice; }
.item4 { grid-area: productQuantity; }
.item5 { grid-area: productRemove; }
.item6 { grid-area: blank; }

.grid-container {
  display: grid;
  grid-template-areas:
    'productImage productName blank'
    'productImage productPrice blank'
    'productImage productQuantity productRemove';
    padding: 0px 0px 20px;
}

.grid-container .item1{
  text-align: center;
  margin: auto;
}

.grid-container img{
  max-width: 100%;
  height: auto;
}

.grid-container .item2 {
    text-align: left;
    font-weight: bold;
    font-size: 15px;
}

.grid-container .item3 {
    text-align: left;
    font-size: 12px;
    letter-spacing: 1px;
}

.grid-container .item4 {
      font-weight: bold;
    align-items: center;
    font-size: 16px;
}

.qt,.qt-plus,.qt-minus {
      padding : 2px 12px
}

.qt-plus, .qt-minus {
  background: #fcfcfc;
  border: none;
  -webkit-transition: background .2s linear;
  -moz-transition: background .2s linear;
  -ms-transition: background .2s linear;
  -o-transition: background .2s linear;
  transition: background .2s linear;
  border: 1px solid black;
}

.qt-plus:hover, .qt-minus:hover {
  background: #53b5aa;
  color: #fff;
  cursor: pointer;
}

.grid-container .item5 {
      font-size: 18px;
    color: red;
    text-align: center;
}

.row .panel-1 {
  text-align: left;
}

.row .panel-3 {
  text-align: right;
}

    </style>

    <?php
      /* Login*/

      if(isset($_POST['login']))
      {
        $email = strtolower(trim($_POST['email']));
        $password = trim($_POST['password']);
 
        $queryCheckEmail = mysqli_query($conn,"SELECT * FROM kidit_user WHERE user_email='".$email."'");
        $checkEmail = mysqli_num_rows($queryCheckEmail);

        if($checkEmail == 1)
        {
            $getPassword = mysqli_fetch_assoc($queryCheckEmail);

            if(password_verify($password, $getPassword['user_password']))
            {
              $_SESSION['user_id'] = $getPassword['user_id'];

              if($getPassword['user_role'] == 'customer')
              {

                echo"<meta http-equiv='refresh' content='0;url= index.php'>";

              }
              else
              {
                 echo'<script> window.location="admin/index.php"; </script> ';
              }
            }
            else
            {
              echo "<script type='text/javascript'>alert('".$getPassword['user_password']."');</script>";
            }

        }
        else
        {
          echo "<script type='text/javascript'>alert('Invalid Email or Password');</script>";
        }
      
      }

      /* Register */
      if(isset($_POST['register']))
      {
        $first = trim($_POST['first']);
        $last = trim($_POST['last']);
        $password = trim($_POST['password']);

        //remove whitespace & lowercase
        $email = strtolower(trim($_POST['email']));

        $checkEmail = mysqli_num_rows(mysqli_query($conn,"SELECT user_email FROM kidit_user WHERE user_email = '".$email."'"));

        if($checkEmail == 0)
        {
          $hashPassword = password_hash($password, PASSWORD_DEFAULT);

          $insertUser = mysqli_query($conn,"INSERT INTO `kidit_user`(`user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_status`, `user_join_date`,`user_role`) VALUES ('".$first."','".$last."','".$email."','".$hashPassword."','1','".date("Y-m-d")."','customer')");

          if($insertUser)
          {
            $message= "Success: Account has been recorded";
            echo "<script>alert('".$message."')</script>";
            echo"<meta http-equiv='refresh' content='0;url= index.php'>";

          }
          else
          {
            echo "Error";
          }

        }
        else
        {
          $message= "The email have been used";
          echo "<script>alert('".$message."')</script>";
        }

      }

      /* Forget Password */
      if(isset($_POST['send']))
      {
        $email = strtolower(trim($_POST['email']));

        $queryCheckEmail = mysqli_query($conn,"SELECT * FROM kidit_user WHERE user_email = '".$email."'");
        $checkEmail = mysqli_num_rows($queryCheckEmail);

        if($checkEmail == '1')
        {
          $sixRandomNumber = rand(100000,999999);

          $hashPassword = password_hash($sixRandomNumber, PASSWORD_DEFAULT);

          $updateTempPassword = mysqli_query($conn,"UPDATE kidit_user SET user_password='".$hashPassword."' WHERE user_email ='".$email."'");
          $row = mysqli_fetch_assoc($queryCheckEmail);

          if($updateTempPassword)
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
                      You have
                      requested to reset your password</h1>
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
          $message= "The email are not valid";
          echo "<script>alert('".$message."')</script>";
        }

      }

    ?>

    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars" style="cursor: pointer;"></span>
        </div>
        <div class="logo"><img src="image/logo2.png" width="190px" height="50px"/></div>
        <div class="nav-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li>

<?php
 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    



?>
 <div class="dropdown">
    <button class="dropbtn">Category
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="myDropdown" class="dropdown-content">
    <?php 
      $qryCategory =  mysqli_query($conn,"SELECT * FROM kidit_category WHERE category_status != 0 ORDER BY category_name ASC");

      while ($infoCategory = mysqli_fetch_array($qryCategory)) {
          echo"<a href=category.php?category=" . $infoCategory['category_id'] ."&sort=ALL>" . $infoCategory['category_name']. "</a>";
        }
    ?>
    </div>
  </div> 
            </li>
            <li> <div class="dropdown">
    <button class="dropbtn">Age
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
          <?php 
      $qryAge =  mysqli_query($conn,"SELECT * FROM kidit_age WHERE age_status != 0");
      
      while ($infoAge = mysqli_fetch_array($qryAge)) {
          echo"<a href=age.php?age=" . $infoAge['age_id'] ."&sort=ALL>" . $infoAge['age_range']. "</a>";
        }
    ?>
    </div>
  </div> </li>
            <li> <div class="dropdown">
    <button class="dropbtn">Brand
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
          <?php 
      $qryBrand =  mysqli_query($conn,"SELECT * FROM kidit_brand WHERE brand_status != 0 ORDER BY brand_name ASC");
      
      while ($infoBrand = mysqli_fetch_array($qryBrand)) {
          echo"<a href=brand.php?brand=" . $infoBrand['brand_id'] ."&sort=ALL>" . $infoBrand['brand_name']. "</a>";
        }
    ?>
    </div>
  </div> </li>
            <li><a href="sales.php">Sales</a></li>
        </div>    
        <div class="search-icon">
            <span class="fas fa-search" style="cursor: pointer;"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times" style="cursor: pointer;"></span>
        </div>
        <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
        </form>


<?php if(isset($_SESSION['user_id']) == NULL)
      {
        echo'<div class="cart" style="cursor:pointer;">
          <a data-toggle="modal" data-target="#modalLogin" ><i class="fa">&#xf07a;</i></a> 
        </div>';

        echo'<div class="dropdown2">
            <button class="dropbtn">
                <img src="image/profile.png" width="30" height="30">
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a data-toggle="modal" data-target="#modalLogin">Login</a>
                <a data-toggle="modal" data-target="#modalSignUp">Create Account</a>
            </div>
        </div>';

      }
      else 
      {
         echo'<div class="cart" style="cursor:pointer;">
          <a data-toggle="modal" data-target="#modalCart" ><i class="fa">&#xf07a;</i></a> 
          <span class="badge badge-warning" id="cart-item"></span>
        </div>';
        echo'<div class="dropdown2">
            <button class="dropbtn">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30">
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="profile.php">Account</a>
                <a href="history.php">Purchase History</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>';

      }
    ?>
    <script>
            const menuBtn = document.querySelector(".menu-icon span");
            const searchBtn = document.querySelector(".search-icon");
            const cancelBtn = document.querySelector(".cancel-icon");
            const items = document.querySelector(".nav-items");
            const form = document.querySelector("form");
            menuBtn.onclick = ()=>{
              items.classList.add("active");
              menuBtn.classList.add("hide");
              searchBtn.classList.add("hide");
              cancelBtn.classList.add("show");
            }
            cancelBtn.onclick = ()=>{
              items.classList.remove("active");
              menuBtn.classList.remove("hide");
              searchBtn.classList.remove("hide");
              cancelBtn.classList.remove("show");
              form.classList.remove("active");
              cancelBtn.style.color = "#ff3d00";
            }
            searchBtn.onclick = ()=>{
              form.classList.add("active");
              searchBtn.classList.add("hide");
              cancelBtn.classList.add("show");
            }

        </script>  
    </nav>

       <!-- Modal Login-->
      <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST">
          <span class="login100-form-title p-b-26">
            Log in to my account
          </span>
          <span class="login100-form-title p-b-11">
          </span>

          <div class="wrap-input100 validate-input">
            <span>Email<span class="star">*</span></span>
            <input type="email" class="input100" type="text" name="email" value="<?php if (isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>" required>
          </div>

          <div class="wrap-input100 validate-input">
            <span>Password<span class="star">*</span></span>
            <input class="input100" id="txtPassword" type="password" name="password" value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>" required>
            <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></button>
          </div>
          <div class="text-right p-0">
            <a class="txt2"  style="cursor: pointer;" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalForgetPassword">
              Forget password
            </a>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <input type="submit" value="Login" name="login" class="login100-form-btn">
            </div>
          </div>

          <div class="text-center p-t-15">
            <span class="txt1">
              Don’t have an account?
            </span>

            <a class="txt2"  style="cursor: pointer;" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalSignUp">
              Sign Up
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
            </div>
          </div>
        </div>
      </div>

       <!-- Modal SignUp-->
<div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="modalSignUp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST">
          <span class="login100-form-title p-b-26">
            Register an account
          </span>
          <span class="login100-form-title p-b-11">
          </span>

          <div class="wrap-input100 validate-input">
            <span>First Name<span class="star">*</span></span>
            <input type="text" class="input100" type="text" name="first" required>
          </div>

          <div class="wrap-input100 validate-input">
            <span>Last Name<span class="star">*</span></span>
            <input type="text" class="input100" type="text" name="last" required>
          </div>

          <div class="wrap-input100 validate-input">
            <span>Email<span class="star">*</span></span>
            <input type="email" class="input100" type="text" name="email" required>
          </div>

          <div class="wrap-input100 validate-input">
            <span>Password<span class="star">*</span></span>
            <input class="input100" id="txtPassword2" type="password" name="password" required>
                    <button type="button" id="btnToggle2" class="toggle"><i id="eyeIcon2" class="fa fa-eye"></i></button>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <input type="submit" value="Register" name="register" class="login100-form-btn">
            </div>
          </div>

          <div class="text-center p-t-15">
            <span class="txt1">
              Have an account?
            </span>

            <a class="txt2" style="cursor: pointer;" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalLogin">
              Sign In
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
            </div>
          </div>
        </div>
      </div>

         <!-- Modal Forget Password-->
<div class="modal fade" id="modalForgetPassword" tabindex="-1" role="dialog" aria-labelledby="modalForgetPassword" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST">
          <span class="login100-form-title p-b-26">
            Forget Password
          </span>
          <span class="login100-form-title p-b-11">
          </span>

          <div class="wrap-input100 validate-input">
            <span>Email<span class="star">*</span></span>
            <input type="email" class="input100" type="text" name="email" required>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <input type="submit" value="Send" name="send" class="login100-form-btn">
            </div>
          </div>

          <div class="text-center p-t-15">
            <span class="txt1">
              Have an account?
            </span>

            <a class="txt2" style="cursor: pointer;" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalLogin">
              Sign In
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
            </div>
          </div>
        </div>
      </div>



     <script >
$(document).ready(function() {

  if(window.location.href.indexOf('#modalLogin') != -1) {
    $('#modalLogin').modal('show');
  }

});

$(document).ready(function () {

 $('.modal').on("hidden.bs.modal", function (e) { //fire on closing modal box
        if ($('.modal:visible').length) { // check whether parent modal is opend after child modal close
            $('body').addClass('modal-open'); // if open mean length is 1 then add a bootstrap css class to body of the page
        }
    });
});
       let passwordInput = document.getElementById('txtPassword'),
    toggle = document.getElementById('btnToggle'),
    icon =  document.getElementById('eyeIcon');
    let passwordInput2 = document.getElementById('txtPassword2'),
        toggle2 = document.getElementById('btnToggle2'),
    icon2 =  document.getElementById('eyeIcon2');

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = 'password';
    icon.classList.remove("fa-eye-slash");
  }

  if (passwordInput2.type === 'password') {
    passwordInput2.type = 'text';
    icon2.classList.add("fa-eye-slash");
    //toggle.innerHTML = 'hide';
  } else {
    passwordInput2.type = 'password';
    icon2.classList.remove("fa-eye-slash");
    //toggle.innerHTML = 'show';
  }
}

function checkInput() {
  if (passwordInput.value === '') {
   toggle.style.display = 'none';
   toggle.innerHTML = 'show';
    passwordInput.type = 'password';
  } else {
    toggle.style.display = 'block';
  }

    if (passwordInput2.value === '') {
   toggle2.style.display = 'none';
   toggle2.innerHTML = 'show';
    passwordInput2.type = 'password';
  } else {
    toggle2.style.display = 'block';
  }
}

toggle.addEventListener('click', togglePassword, false);
passwordInput.addEventListener('keyup', checkInput, false);
toggle2.addEventListener('click', togglePassword, false);
passwordInput2.addEventListener('keyup', checkInput, false);
     </script>


     <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="modalCart" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCart">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 0px; ">
 <div class="container-fixed">
<br>
<?php 
  $cartQuery = mysqli_query($conn,"SELECT * FROM kidit_cart WHERE user_id='".$_SESSION['user_id']."'");
  $getCartId = mysqli_fetch_assoc($cartQuery);

  $runCartItem = mysqli_query($conn,"SELECT * FROM kidit_cart_item WHERE cart_id='".$getCartId['cart_id']."'");

  $subTotal = 0;

  while ($getCartItem = mysqli_fetch_array($runCartItem))
  {
    $productQuery = mysqli_query($conn,"SELECT * FROM kidit_product WHERE product_id = '".$getCartItem['product_id']."'");
    $getProduct = mysqli_fetch_assoc($productQuery);

    echo'<div class="row">
              <div class="col-md-4" style="text-align: center;">
                <img src="admin/'.$getProduct['product_image'].'"  width="100" height="100" />
              </div>
              <div class = "col-md-6">
        '.$getProduct['product_name'].'';

    if($getProduct['product_sales_price'] != 0)
    {
        echo'<div><span style="text-decoration:line-through;">RM '.$getProduct['product_price'].'</span><span style="color:red;"> RM '.$getProduct['product_sales_price'].'</span></div>' ;
    }
    else
    {
      echo'<div><span>RM '.$getProduct['product_price'].'</span></div>';
    }

    echo'<div class="quantity">
    <input type="number" value="'.$getCartItem['item_quantity'].'" min="1" class="quantity-field">
   </div>
              </div>
              <div class = "col-md-2" >
        <div class="remove"><button style="color:red;">&#128465;</button></div>
        </div>
      </div><br>';

      $subTotal += $getCartItem['item_price'];
  }

?>
<input type="hidden" name="total" id="total" value="<?php echo $subTotal; ?>">
  </div></div>

      <div class="modal-footer" style="height: auto;">

 <div class="row">
        <form action="">
          <div class="col">
            <div class="panel panel-2"><input type="text"  id="promo-code" name="promo-code" class="form-control" placeholder="Promo Code" style="width: 170%;"></div>
          </div>
        </form>
          <div class="col">
            <div class="panel panel-3"><button class="promo-code-cta">Apply</button></div>
          </div>
        </div> 

  <div class="row">
          <div class="col">
            <div class="panel panel-1">Subtotal:</div>
          </div>
     
          <div class="col">
            <div class="panel panel-3">RM <?php echo number_format($subTotal,2); ?></div>
          </div>
        </div> 
          <div class="row">
          <div class="col">
            <div class="panel panel-1">Discount:</div>
          </div>
          <div class="col">
            <div class="panel panel-3">-RM xxx.xx</div>
          </div>
        </div> 
          <div class="row">
          <div class="col">
            <div class="panel panel-1" style="font-weight:bold;">Total:</div>
          </div>
          <div class="col">
            <div class="panel panel-3 total" name="overallTotal" id="overallTotal">RM xxx.xx</div>
          </div>
        </div> 
      </div>
              <div class="checkout">
        <button type="button" onClick="myFunction()" class="btn btn-secondary btn-lg btn-block" style=" width: 100%;
    border-radius: 0 !important;">Checkout</button>
        </div>
    </div>
  </div>
</div>

    <!-- JavaScript file -->
    <script src="script.js"></script>
 
    <!-- jQuery Ajax CDN -->
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

  <script type="text/javascript">
    /* Set values + misc */
var promoCode;
var promoPrice;
var fadeTime = 300;

/* Assign actions */
$(".quantity input").change(function () {
  updateQuantity(this);
});

$(".remove button").click(function () {
  removeItem(this);
});

$(document).ready(function () {
  updateSumItems();
});

$(".promo-code-cta").click(function (e) {
  e.preventDefault();
    total = $("#total").val();
    promoCode = $("#promo-code").val();
//alert(total);
    $.ajax({
    method:"POST",
    url: "action.php",
    data:{
      promoCode:promoCode,
      total:total
    },
        success: function(response){
          //alert( "Data Saved: " + msg );
          var infoS = response;
          $('#overallTotal').empty();
          $('#overallTotal').append("RM " + (parseFloat(infoS)).toFixed(2));
          //alert(infoS);

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert("some error");
      }
      });

  /*if (promoCode == "10off" || promoCode == "10OFF") {
    //If promoPrice has no value, set it as 10 for the 10OFF promocode
    if (!promoPrice) {
      promoPrice = 10;
    } else if (promoCode) {
      promoPrice = promoPrice * 1;
    }
  } else if (promoCode != "") {
    alert("Invalid Promo Code");
    promoPrice = 0;
  }
  //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
  if (promoPrice) {
    $(".summary-promo").removeClass("hide");
    $(".promo-value").text(promoPrice.toFixed(2));
    recalculateCart(true);
  }/*/
});

/* Recalculate cart */
function recalculateCart(onlyTotal) {
  var subtotal = 0;

  /* Sum up row totals */
  $(".basket-product").each(function () {
    subtotal += parseFloat($(this).children(".subtotal").text());
  });

  /* Calculate totals */
  var total = subtotal;

  //If there is a valid promoCode, and subtotal < 10 subtract from total
  var promoPrice = parseFloat($(".promo-value").text());
  if (promoPrice) {
    if (subtotal >= 10) {
      total -= promoPrice;
    } else {
      alert("Order must be more than £10 for Promo code to apply.");
      $(".summary-promo").addClass("hide");
    }
  }

  /*If switch for update only total, update only total display*/
  if (onlyTotal) {
    /* Update total display */
    $(".total-value").fadeOut(fadeTime, function () {
      $("#basket-total").html(total.toFixed(2));
      $(".total-value").fadeIn(fadeTime);
    });
  } else {
    /* Update summary display. */
    $(".final-value").fadeOut(fadeTime, function () {
      $("#basket-subtotal").html(subtotal.toFixed(2));
      $("#basket-total").html(total.toFixed(2));
      if (total == 0) {
        $(".checkout-cta").fadeOut(fadeTime);
      } else {
        $(".checkout-cta").fadeIn(fadeTime);
      }
      $(".final-value").fadeIn(fadeTime);
    });
  }
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children(".price").text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.children(".subtotal").each(function () {
    $(this).fadeOut(fadeTime, function () {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });

  productRow.find(".item-quantity").text(quantity);
  updateSumItems();
}

function updateSumItems() {
  var sumItems = 0;
  $(".quantity input").each(function () {
    sumItems += parseInt($(this).val());
  });
  $(".total-items").text(sumItems);
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function () {
    productRow.remove();
    recalculateCart();
    updateSumItems();
  });
}

  </script>
<script type="text/javascript">

     function myFunction() {
        window.location.href="cart.php";
      }

  var check = false;

function changeVal(el) {
  var qt = parseFloat(el.parent().children(".qt").html());
  var price = parseFloat(el.parent().children(".price").html());
  var eq = Math.round(price * qt * 100) / 100;
  
  el.parent().children(".full-price").html( eq + "€" );
  
  changeTotal();      
}

function changeTotal() {
  
  var price = 0;
  
  $(".full-price").each(function(index){
    price += parseFloat($(".full-price").eq(index).html());
  });
  
  price = Math.round(price * 100) / 100;
  var tax = Math.round(price * 0.05 * 100) / 100
  var shipping = parseFloat($(".shipping span").html());
  var fullPrice = Math.round((price + tax + shipping) *100) / 100;
  
  if(price == 0) {
    fullPrice = 0;
  }
  
  $(".subtotal span").html(price);
  $(".tax span").html(tax);
  $(".total span").html(fullPrice);
}

$(document).ready(function(){
  
  $(".remove").click(function(){
    var el = $(this);
    el.parent().parent().addClass("removed");
    window.setTimeout(
      function(){
        el.parent().parent().slideUp('fast', function() { 
          el.parent().parent().remove(); 
          if($(".product").length == 0) {
            if(check) {
              $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
            } else {
              $("#cart").html("<h1>No products!</h1>");
            }
          }
          changeTotal(); 
        });
      }, 200);
  });
  
  $(".qt-plus").click(function(){
    $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
    
    $(this).parent().children(".full-price").addClass("added");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
  });
  
  $(".qt-minus").click(function(){
    
    child = $(this).parent().children(".qt");
    
    if(parseInt(child.html()) > 1) {
      child.html(parseInt(child.html()) - 1);
    }
    
    $(this).parent().children(".full-price").addClass("minused");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
  });
  
  window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
  
  $(".btn").click(function(){
    check = true;
    $(".remove").click();
  });
});
</script>