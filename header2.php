<?php
    session_start();
    //include('conn.php');
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
.bs-example {
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    padding: 0 10px;
    background: #fff;
}

.collapse {
    padding: 0 0 0 50px;
}

.nav-item , .nav-link
{
  margin-right: 13px;
}

@media (max-width: 980px)
{
  .navbar-brand {
    flex: 2;
    text-align: center;
    padding: 0 34px 0 0;
  }

  .nav-item , .nav-link {
    margin-right: 0px;
  }

  .collapse {
    padding: 0px;
  }
}

body {
  background-color: yellow;
}
</style>
</head>
<body>

<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">Brand</a>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">Home</a>
                <a href="#" class="nav-item nav-link">Shop</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Inbox</a>
                        <a href="#" class="dropdown-item">Sent</a>
                        <a href="#" class="dropdown-item">Drafts</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Age</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Inbox</a>
                        <a href="#" class="dropdown-item">Sent</a>
                        <a href="#" class="dropdown-item">Drafts</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Brand</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Inbox</a>
                        <a href="#" class="dropdown-item">Sent</a>
                        <a href="#" class="dropdown-item">Drafts</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link">Sales</a>
            </div>
        </div>
                    <form class="form-inline">
                <div class="input-group">                    
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link">Login</a>
            </div>

    </nav>
</div>

</body>
</html>
