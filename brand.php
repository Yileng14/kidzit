<?php
include 'header.php';

?>

<style>
      h1
      {
        font-size: var(--h1-font-size);
      }

      img
      {
        max-width: 100%;
        height: auto;
      }

      header {
        padding: 20px;
      }

      .page-details
      {
          position: relative;
          float: left;
      }

.page-details-label {
    color: red;
    position: relative;
    padding: 14px 0px 14px 25px;
    text-transform: uppercase;
    font-weight: 900;
    font-family: sans-serif;
    font-size: 12px;
    letter-spacing: .2px;
    float: left;
}

.page-details-label a{
    color: red;
    font-weight: 900;
    font-size: 12px;
}


.dropDown-wrapper{
    position: relative;
    height: 42px;
    width: 110px;
    float: right;
}

/* the style for the label */
.dropDown-toggle-label {
    position: relative;
    padding: 14px 30px 14px 25px;
    background-color: #474e5d;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: 900;
    border-radius: 3px;
    font-family: sans-serif;
    font-size: 12px;
    transition: opacity .2s ease;
    letter-spacing: .2px;
    /* force parent to wrap around the label tag */
    float: left;
}

.dropDown-toggle-label:active {
    transform: scale(.98);
}

/* arrow indicator on the button */
.dropDown-wrapper select option{
    content: "";
    display: inline-block;
    width: 6px;
    height: 6px;
    /* this makes the square appear as a white triangle */
    background: linear-gradient(45deg, #fff 50%, transparent 0);
    position: absolute;
    right: 15px;
    top: 35%;
    transform: rotate(-45deg);
}

/* hide all input fields since the labels are connected to them by the id */
.dropDown-wrapper input{display: none;}

/* rotate the button arrow upwards */
.dropDown-wrapper > input:checked + label:after{
    top: 45%;
    transform: rotate(135deg);
}

/* this will show dropDown when input is checked */
.dropDown-wrapper > input:checked + label + .dropDown{
    display: inline-block;
}

/* the drop-down style*/
.dropDown{
    position: absolute;
    right: 18px;
    top: calc(100% + 10px);
    padding: 10px 0;
    box-shadow: 0 0 20px rgba(0,0,0,.1);
    border-radius: 4px 0 4px 4px;
    min-width: 150px;
    display: none;
    background-color: white;
    z-index: 1;
}

/* the drop-down options style*/
.dropDown-wrapper select {
          padding: 14px 30px 14px 25px;
    background-color: #474e5d;
    /* color: #fff; */
    /* cursor: pointer; */
    /* text-transform: uppercase; */
    font-weight: 900;
    border-radius: 3px;
    font-family: sans-serif;
    font-size: 12px;
    transition: opacity .2s ease;
    /* letter-spacing: .2px; */
    /* display: block; */
    /* padding-top: 14px; */
    /* padding-right: 30px; */
    /* padding-bottom: 14px; */
    /* padding-left: 25px; */
    font-family: sans-serif;
    font-size: 14px;
    cursor: pointer;
    color: white;
    opacity: .8;
    float: right;
    transition: border .3s ease, padding-left .3s ease, background-color .3s ease;
}

/* option item on hover */
.dropDown-wrapper select:hover{
    background-color: rgba(180,180,180,.1);
    opacity: .9;
    color: black;
}

      div.card__img img
      {
        max-width: 150px;
    max-height: 150px;
    display: block;
    margin-left: auto;
    margin-right: auto;
      }

/* this shows that the list item was selected */
      .bd-grid
      {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        max-width: 1200px;
        margin-left: 2.5rem;
        margin-right: 2.5rem;
        align-items: center;
        gap: 2rem;
      }

      /*-- PAGES --*/
      .title-shop
      {
        position: relative;
        margin: 0 2.5rem;
      }

      .title-shop::after
      {
        content: '';
        position: absolute;
        top: 50%;
        width: 72px;
        height: 2px;
        background-color: var(--dark-color);
        margin-left: .25rem;
      }

      article 
      {
        background: #fff;
      }

      .card
      {

        width: 240px;
    height: 330px;

        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.5rem 2rem;
        border-radius: 1rem;
        overflow: hidden;
        cursor: pointer;
      }

      .card__img
      {
        width: 180px;
        height: auto;
        padding: 1rem 0;
        transition: .5s;
      }

      .card__precis
      {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        transition: .5s;
        text-align: center;
      }

      .card__preci
      {
        display: block;
        text-align: center;
      }

      .card__preci--name
      {
        font-size: var(--h3-font-size);
        margin-bottom: .45rem;
        font-weight: bold;
      }

      .card__preci--before
      {
        font-size: var(--smaller-font-size);
        text-decoration: line-through;
        padding: 0px 5px;
      }

      .card__preci--now
      {
        font-size: var(--h3-font-size);
        color: var(--accent-color);
        font-weight: bold;
        margin-bottom: .25rem;
      }

      .card__preci--button a
      {
        text-decoration: none;
      }

      .card__preci--button 
      {
        background: #f1c40f;
        color: #fff;
        border: none;
        outline: none;
        box-shadow: none;
        cursor: pointer;
        font-size: var(--normal-font-size);
        border-radius: 30px;
        text-decoration: none;
        padding: 5px 50px;
         font-weight: bold;
      }

      .card__preci--button:hover 
      {
        transform: scale(0.9);
      }

      .card:hover
      {
        box-shadow: 0 .5rem 1rem #D1D9E6;
      }
@media (max-width: 600px) {
  .bd-grid { grid-template-columns: repeat(2, 1fr);gap: 1rem;
} 
.card__preci--name {
    font-size: 0.8rem;
}

 div.card__img img
      {
        max-width: 100px;
    max-height: 100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    object-fit: cover;
      }
.card
{
    width:100%;
    height: auto;
}
}
  .card {padding: 1rem 1rem;;}
  .card__preci--button{padding: 0px 0px;}
        .card__img
      {
        width: 100%;
        height: 100%;
        padding: 1rem 0;
        transition: .5s;
      }      



}
      @media screen and (min-width: 1200px)
      {
        .title-shop
        {
          margin: 0 5rem;
        }

        .bd-grid
        {
          margin-left: auto;
          margin-right: auto;
        }
      }

      .brmedium 
      {
        display: block;
        margin-bottom: 0.5em;
      }

.col-md-3 img {max-width: 200px;max-height: 200px;display: block;margin-left: auto;margin-right: auto;}
.product-grid2{font-family:'Open Sans',sans-serif;position:relative}
.product-grid2 .product-image2{overflow:hidden;position:relative;background-color: white;}
.product-grid2 .product-image2 button,.product-grid2 .social li a{display:block}
.product-grid2 .product-image2 img{width:100%;height:auto}
.product-grid2 .product-new-label2{color:#fff;background-color: #FF4E00;font-size:12px;text-transform:uppercase;padding:2px 7px;display:block;position:absolute;top:10px;left:0}

.product-image2 .pic-1{opacity:1;transition:all .5s}
.product-grid2 .social{padding:0;margin:0;position:absolute;bottom:50px;right:25px;z-index:1}
.product-grid2 .social li{margin:0 0 10px;display:block;transform:translateX(100px);transition:all .5s}
.product-grid2:hover .social li{transform:translateX(0)}
.product-grid2:hover .social li:nth-child(2){transition-delay:.15s}
.product-grid2:hover .social li:nth-child(3){transition-delay:.25s}
.product-grid2 .social li button,.product-grid2 .social li a{border: 1px solid black; color:#505050;background-color:#fcedeb;font-size:17px;line-height:45px;text-align:center;height:45px;width:45px;border-radius:50%;display:block;transition:all .3s ease 0s}
.product-grid2 .social li button:hover.product-grid2 .social li a:hover{color:#fff;background-color:#3498db;box-shadow:0 0 10px rgba(0,0,0,.5)}
.product-grid2 .social li button:after,.product-grid2 .social li a:after,.product-grid2 .social li button:before,.product-grid2 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:22px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
.product-grid2 .social li button:after,.product-grid2 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
.product-grid2 .social li button:hover:after,.product-grid2 .social li a:hover:after,.product-grid2 .social li button:hover:before,.product-grid2 .social li a:hover:before{opacity:1}
.product-grid2 .add-to-cart{color:#fff;background-color:#404040;font-size:15px;text-align:center;width:100%;padding:10px 0;display:block;position:absolute;left:0;bottom:-100%;transition:all .3s}
.product-grid2 .add-to-cart:hover{background-color:#3498db;text-decoration:none}
.product-grid2:hover .add-to-cart{bottom:0}
.product-grid2 .product-new-label{background-color:#3498db;color:#fff;font-size:17px;padding:5px 10px;position:absolute;right:0;top:0;transition:all .3s}
.product-grid2:hover .product-new-label{opacity:0}
.product-grid2 .product-content{padding:20px 10px;text-align:center;background-color: #ffaaaa;height: 120px;}
.product-grid2 .title{font-size:18px;margin:0 0 7px; font-weight: bold;}
.product-grid2 .title button, .product-grid2 .title a{color:#303030}
.product-grid2 .title button:hover, .product-grid2 .title a:hover{color:#3498db}
.product-grid2 .price{color:#303030;font-size:17px}
.product-grid2 .old_price{color:#303030;font-size:17px;text-decoration: line-through;}
.product-grid2 .sales_price{color:red;font-size:18px;font-weight: bold;}
.col-sm-6 {margin-bottom: 20px; }
@media screen and (max-width:990px){
    .product-grid2{margin-bottom:30px;}
.col-md-3 img {max-width: 150px;max-height: 150px;display: block;margin-left: auto;margin-right: auto;}
.product-grid2 .title {
    font-size: 14px;
    margin: 0 0 7px;
    font-weight: bold;
}.product-grid2 .sales_price {
    color: red;
    font-size: 14px;
    font-weight: bold;
}.product-grid2 .price {
    color: #303030;
    font-size: 17px;
}.product-grid2 .product-content {

    height: 102px;
}.col-sm-6 {
    margin-bottom: -8px;
}
}
@media screen (max-width: 768px)
{
.col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 50%;
    max-width: 50%;
}
}
span.text{
    position: relative;
    color: red;
    padding: 14px 0px 14px 25px;
    text-transform: uppercase;
    font-weight: 900;
    font-family: sans-serif;
    font-size: 12px;
    letter-spacing: .2px;
    float: left;
    
}
</style>
<?php
// Program to display complete URL
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
      $link = "https";
  else $link = "http";
  
  // Here append the common URL
  // characters.
  $link .= "://";
  
  // Append the host(domain name,
  // ip) to the URL.
  $link .= $_SERVER['HTTP_HOST'];
  
  // Append the requested resource
  // location to the URL
  $link .= $_SERVER['PHP_SELF'];
  
        $sort = "";
        

       $url= "http://localhost/onlineShopping/brand.php?brand=".$_GET['brand']."";

        if($_GET['brand'] != "")
        {
            $_SESSION['brand'] = $_GET['brand'];
        }

        $queryCheck = mysqli_query($conn, "SELECT brand_name FROM kidit_brand WHERE brand_id=".$_SESSION['brand']."");
        $getBrandName = mysqli_fetch_assoc($queryCheck);
?>

    <header>
      <div >
        <span class=text style="color: red;padding: 14px 0px 14px 25px;"><a href="index.php" style="color:red;">Home</a> / <a href="shop.php" style="color:red;">Shop</a> / <a href="brand.php?brand=<?php echo $_GET['brand']; ?>" style="color:red">Brand - <?php echo $getBrandName['brand_name']; ?></a></span>
         <p class="message"></p>

      </div>
      <div class="dropDown-wrapper">

        <?php 
        $strSort = "";
        if ($_GET['sort'] != "") 
        {
          if ($_GET['sort'] == "ALL") {
            $_SESSION['sort'] = "";

          } 
          else 
          {
            $_SESSION['sort'] = $_GET['sort'];
          }
        }

        if($_SESSION['sort'] == 1)
        {
          $sort = "ORDER BY product_name ASC";
        }
        else
        if($_SESSION['sort'] == 2)
        {
          $sort = "ORDER BY product_name DESC";
        }
        else
        if($_SESSION['sort'] == 3)
        {
          $sort = "ORDER BY product_price ASC";
        }
        else 
        if($_SESSION['sort'] == 4)
        {
          $sort = "ORDER BY product_price DESC";
        }

        if ($_SESSION['brand'])
        {
            $brandSelected = "brand_id = ".$_SESSION['brand']." AND";
            $sort = " ";
        }

        if($_SESSION['sort'] && $_SESSION['brand'])
        {
            if($_SESSION['sort'] == 1)
            {
              $sort = "ORDER BY product_name ASC";
            }
            else
            if($_SESSION['sort'] == 2)
            {
              $sort = "ORDER BY product_name DESC";
            }
            else
            if($_SESSION['sort'] == 3)
            {
              $sort = "ORDER BY product_price ASC";
            }
            else 
            if($_SESSION['sort'] == 4)
            {
              $sort = "ORDER BY product_price DESC";
            }
            $brandSelected = "brand_id = ".$_SESSION['brand']." AND";
        }

        $strSort .= "<option value=\"1\">A-Z</option>
                     <option value=\"2\">Z-A</option>
                     <option value=\"3\">Price-Low to High</option>
                     <option value=\"4\">Price-High to Low</option>";

        echo '<div style = "margin-top:3px;">
                <select class="btn btn-lg pull-right header-btn " style="margin-top:3px;max-width:320px;margin-right:10px;height:37px; padding:6px 6px;" onchange="window.location=\''.$url .'&sort=\'+this.value">
                    <option value="ALL"> - Default - </option>
                     ' . str_replace("value=\"" . $_SESSION['sort'] . "\">", "value=\"" . $_SESSION['sort'] . "\" SELECTED>", $strSort) . '
                </select>
              </div>';

        ?>
      </div>
    
    </header>
    <br>    <br>
   <div class="container">
    <div class="row">
                <?php
                    $qryProduct = mysqli_query($conn, "SELECT * FROM kidit_product WHERE $brandSelected product_status = 1 $sort");

                    while($showProduct = mysqli_fetch_array($qryProduct))
                    {
                            echo'
                                <div class="col-md-3 col-sm-6">
                    <div class="product-grid2">
                        <div class="product-image2">
                                <img class="pic-1" src="admin/'.$showProduct['product_image'].'" >
                            <ul class="social">
                            <form method="POST" action="product.php">
                                <input type="hidden" name="product_id" id="product_id" value="'.$showProduct['product_id'].'">
                                <li><button data-tip="Quick View"><i class="fa fa-eye"></i></button></li>
                            </form>';

                if(isset($_SESSION['user_id']) == null)
                {
                    echo'<li><a data-toggle="modal" data-target="#modalLogin" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>';
                }
                else
                {
                    echo'<form class="form-submit">
                                    <input type="hidden" class="pid" name="pid" id="pid" value="'.$showProduct['product_id'].'">
                                    <input type="hidden" name="uid" id="uid" value="'.$_SESSION['user_id'].'">   
                                    <li><button class="addItemBtn" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button></li>
                                </form>
                            </ul>';
                }
                            

                if($showProduct['product_sales_price'] > 0)
                {
                    echo'
                        <span class="product-new-label2">Sale</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title">'.$showProduct['product_name'].'</h3>
                            <span class="old_price">RM '.$showProduct['product_price'].'</span>
                    <span class="sales_price">RM '.$showProduct['product_sales_price'].'</span>';
                }
                else
                {
                    echo'
                        </div>
                        <div class="product-content">
                            <h3 class="title">'.$showProduct['product_name'].'</h3>
                            <span class="price">RM '.$showProduct['product_price'].'</span>';
                }
                            
                       echo' </div>
                    </div>
                </div>';
            }
        ?>
    </div>
</div>
 <!-- JavaScript file -->
    <script src="script.js"></script>
 
    <!-- jQuery Ajax CDN -->
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

<script type="text/javascript">


    $(document).ready(function(){
        $(".addItemBtn").click(function(e){

            e.preventDefault();
            //var pid= $("input[name='pid']").val();   
                var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();


        $.ajax({
        method:"POST",
        url: "action.php",
        data:{
          pid:pid
        },
            success: function(response){
        //alert( "Data Saved: " + msg );
        $("#message").html(response);
                        window.scrollTo(0,0); //click add to cart, it will auto scroll to the top
                        load_cart_item_number();

          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert("some error");
          }
          });
            });
            
            load_cart_item_number();
            
            function load_cart_item_number(){
                $.ajax({
                    url:'action.php',
                    method: 'get',
                    data: {cartItem:"cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
        });
</script>
<?php
include 'footer.php';
?>