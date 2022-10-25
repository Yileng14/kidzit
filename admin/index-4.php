<?php
    session_start();
    include('../conn.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 10px;
  overflow: auto;
}

.sidenav a , .dropdown-btn{
      padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    transition: 0.3s;
    background-color: transparent;
    border: none;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
.fa-caret-down:before {
    padding: 10px 10px 10px;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Add an active class to the active dropdown button */
.active {
  color: red;
}
/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav" style="overflow: scroll;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a><img src="../image/logo.png"/ width="80" height="80"/></a>
  <a href="#">Home</a>
  <a href="#">Transaction</a>
  <a href="#">Product</a>
  <button class="dropdown-btn">Filter
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Category</a>
    <a href="#">Age</a>
    <a href="#">Brand</a>
  </div>
  <a href="#">Sales</a>
  <a href="#">Analytic</a>
  <a href="#">Reporting</a>
  <a href="#">Layout</a>
  <a href="#">User</a>
  <a href="#">Staff</a>  
</div>

<div class="header">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

</script>
   
</body>
</html> 
