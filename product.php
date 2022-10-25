<?php
	include 'header.php';
?>
<link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
<style>
	.monospaced { font-family: 'Ubuntu Mono', monospaced ; }
.star-icon {
    color: #ccc;
    font-size: 24px;
    vertical-align: middle;
}

.star-icon.filled {
    color: #F7A115;
}

.reviews-text {
  color: #4a4a4a;
  font-size: 14px;
  font-weight: normal;
  text-decoration: underline;
  margin-left: 5px;
  vertical-align: middle;
}
.add-to-cart .btn-qty {
  width: 52px;
  height: 46px;
}

.add-to-cart .btn { border-radius: 0; }

li 
{
	margin: 3px;
}

li a 
{
    color: white;
    border-radius: 22px;
    background-color: blue;
    border-radius: 22px;
    padding: 6px 4px;
    text-decoration: none;
}


.nav-tabs {
        border-bottom: none;
    padding: 0px 0px 20px;
    margin: 10px 0;
}

.R-title{color: #00aeef; font-size: 22px;font-weight:700; margin-bottom: 10px; }
.comment-section .media-review{padding:20px 0px;border-top:1px solid #ccc;}

.comment-section .media .media-user{margin-right: 15px; border-radius: 50%;overflow: hidden; background: rgb(236, 236, 236); width: 77px;height: 77px;  }
.comment-section .media .media-user img{width:100%; height:100%; object-fit: cover;}
.comment-section .media .M-flex{display: flex;justify-content: space-between;}
.comment-section .media .M-flex .title{font-size: 12px; color: #1c1d36;  margin-bottom: 10px;font-weight:400;}
.comment-section .media .M-flex .title span{font-size: 20px;  display: block;font-weight:700;margin-bottom:5px;}
.comment-section .media .description{font-size: 14px;  color: #5b5b5b;margin-bottom: 20px;}
.rating-row ul{list-style:none;display:flex; padding:0 ; margin:0;}
.rating-row ul li{color:#ffc107;font-size:20px;margin:0px 3px;}

.review-btn button 
{
	width: 100%;
    text-align: center;
    border-radius: 22px;
    background-color: white;
    border: none;
    padding: 8px 8px;
    color: black;
}

.title
{
	font-weight: bold;
}

.rating-box {
  display: inline-block;
  }
.rating-container {
    direction: rtl !important;
}
    .rating-container label {
      display: inline-block;
      color: #d4d4d4;
      cursor: pointer;
      font-size: 25px;
      transition: color 0.2s;
    }
   .rating-container input {
      display: none;
          padding: 0px 10px;
    }
    .rating-container label:hover, label:hover ~ label, input:checked ~ label  {
      color: gold;
    }

    .social-menu ul {
    display: flex;
}
.social-menu ul li {
    list-style: none;
    margin: 0 10px;
}
.social-menu ul li .fa {
    color: #ffffff;
    font-size: 15px;
    line-height: 30px;
    transition: .5s;
}

.social-menu ul li a {
    position: relative;
    display: block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: white;
    text-align: center;
    transform: translate(0,0px);
    padding: 0px
}

</style>
<br><br>
<div class="container" id="product-section">
  <div class="row">
   <div class="col-md-6">
   	<div class="row">
  <div class="col-md-12">
    <img
  src="22.jpg"
  alt="Kodak Brownie Flash B Camera"
  class="image-responsive"
 />
</div>
</div>
 <br>
 <div class="row">
 <div class="social-menu">
  <ul>
    <li><a href="" style=" background-color: #3b5999;"><i class="fa fa-facebook"></i></a></li>
    <li><a href="" style="background-color: #55acee;"><i class="fa fa-twitter"></i></a></li>
    <li><a href="" style="background-color: #e4405f;"><i class="fa fa-instagram"></i></a></li>
  </ul>
</div>
</div>
</div>


<div class="col-md-6">
 <div class="row">
  <div class="col-md-12">
   <h1>Kodak 'Brownie' Flash B Camera</h1>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
  <span class="label label-primary">Vintage</span>
  <span class="monospaced">No. 1960140180</span>
 </div>
</div><!-- end row -->

<div class="row">
 <div class="col-md-12">
  <p class="description">
   Classic film camera. Uses 620 roll film.
   Has a 2&frac14; x 3&frac14; inch image size.
  </p>
 </div>
</div><!-- end row -->

<div class="row">
 <div class="col-md-12">
    <span class="star-icon filled">★</span>
	<span class="star-icon filled">★</span>
	<span class="star-icon filled">★</span>
	<span class="star-icon filled">★</span>
	<span class="star-icon">★</span>
	<a class="reviews-text" href="#reviews"
   aria-controls="reviews"
   role="tab"
   data-toggle="tab">
	  468 reviews
	</a>
 </div>
</div><!-- end row -->
<br>
<div class="row">
 <div class="col-md-12 bottom-rule">
  <h2 class="product-price">$129.00</h2>
 </div>
</div><!-- end row -->
<br><br>
<div class="row add-to-cart">
 <div class="col-md-12">
  <button class="btn btn-lg btn-brand btn-full-width" style="    text-align: center;
    background-color: white;
    border-radius: 22px;width: 100%;">
   Add to Cart
  </button>
 </div>
</div><!-- end row -->

<div class="row">
 <div class="col-md-12 bottom-rule top-10"></div>
</div><!-- end row -->


	</div>
  </div><!-- end row -->
 </div><!-- end container -->

 <hr>

<div class="container" id="info-section"> 

<div class="col-md-12">
	<ul class="nav nav-tabs" role="tablist">
 <li role="presentation" class="active">
  <a href="#description"
   aria-controls="description"
   role="tab"
   data-toggle="tab"
  >Product Description</a>
 </li>
 <li role="presentation">
  <a href="#reviews"
   aria-controls="reviews"
   role="tab"
   data-toggle="tab"
  >Reviews</a>
 </li>
 <li role="presentation">
  <a href="#shipping"
   aria-controls="shipping"
   role="tab"
   data-toggle="tab"
   >Shipping Information</a>
 </li>
 <li role="presentation">
  <a href="#return"
   aria-controls="return"
   role="tab"
   data-toggle="tab"
  >Refund & Return</a>
 </li>
</ul>
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="description">
 <p class="top-10">
  The 'Brownie' Flash A is a box camera taking 2&frac14; × 3&frac14;" frames on 620 film, made of sheet metal by Kodak Ltd. in England, 1958-60. 
  A more luxurious version of the Brownie Six-20 Model F, it has a two-speed shutter (1/80, 1/40 +B), a close-focus (5-10ft) lens, a yellow filter and flash sync. The Flash B is very similar to the Brownie Flash IV, adding a two-speed shutter but lacking a tripod bush.
 </p>
 <p>
  <small>
   (source <a href="http://camerapedia.wikia.com/wiki/Kodak_Brownie_Flash_B">http://camerapedia.wikia.com/wiki/Kodak_Brownie_Flash_B</a>)
  </small>
 </p>
</div>

<div role="tabpanel" class="tab-pane" id="reviews">
<div class="comment-section">
  <div class="container"> 
    <div class="review">
      <h2 class="R-title">Comments</h2>
      <div class="comment-section">

        <div class="media media-review">
          <div class="media-user"><img src="https://i.imgur.com/nUNhspp.jpg" alt=""></div>
          <div class="media-body">
            <div class="M-flex">
              <h2 class="title"><span> Robert Bye </span>DD-MM-YYYY</h2>
              <div class="rating-row">
                <ul>    
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star-o"></i></li>
                  <li class=""><i class="fa fa-star-o"></i></li>
                </ul>
              </div>
            </div>
            <div class ="title">
            	TTT
            </div>
            <div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
          </div>
        </div>
  <div class="media media-review">
          <div class="media-user"><img src="https://i.imgur.com/nUNhspp.jpg" alt=""></div>
          <div class="media-body">
            <div class="M-flex">
              <h2 class="title"><span> Robert Bye </span>DD-MM-YYYY</h2>
              <div class="rating-row">
                <ul>    
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star-o"></i></li>
                  <li class=""><i class="fa fa-star-o"></i></li>
                </ul>
              </div>
            </div>
            <div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
          </div>
        </div>
        <div class="media media-review">
          <div class="media-user"><img src="https://i.imgur.com/nUNhspp.jpg" alt=""></div>
          <div class="media-body">
            <div class="M-flex">
              <h2 class="title"><span> Robert Bye </span>DD-MM-YYYY</h2>
              <div class="rating-row">
                <ul>    
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star"></i></li>
                  <li class=""><i class="fa fa-star-o"></i></li>
                  <li class=""><i class="fa fa-star-o"></i></li>
                </ul>
              </div>
            </div>
            <div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
          </div>
        </div>
          <div class="review-btn">
          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal">Write the review for this product</button>
          </div>
      </div>

    </div>
  </div>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="shipping">
 <p class="top-10">
  The 'Brownie' Flash C is a box camera taking 2&frac14; × 3&frac14;" frames on 620 film, made of sheet metal by Kodak Ltd. in England, 1958-60. 
  A more luxurious version of the Brownie Six-20 Model F, it has a two-speed shutter (1/80, 1/40 +B), a close-focus (5-10ft) lens, a yellow filter and flash sync. The Flash B is very similar to the Brownie Flash IV, adding a two-speed shutter but lacking a tripod bush.
 </p>
 <p>
  <small>
   (source <a href="http://camerapedia.wikia.com/wiki/Kodak_Brownie_Flash_B">http://camerapedia.wikia.com/wiki/Kodak_Brownie_Flash_B</a>)
  </small>
 </p>
</div>
<div role="tabpanel" class="tab-pane" id="return">
 <p class="top-10">
  The 'Brownie' Flash D is a box camera taking 2&frac14; × 3&frac14;" frames on 620 film, made of sheet metal by Kodak Ltd. in England, 1958-60. 
  A more luxurious version of the Brownie Six-20 Model F, it has a two-speed shutter (1/80, 1/40 +B), a close-focus (5-10ft) lens, a yellow filter and flash sync. The Flash B is very similar to the Brownie Flash IV, adding a two-speed shutter but lacking a tripod bush.
 </p>
 <p>
  <small>
   (source <a href="http://camerapedia.wikia.com/wiki/Kodak_Brownie_Flash_B">http://camerapedia.wikia.com/wiki/Kodak_Brownie_Flash_B</a>)
  </small>
 </p>
</div>
</div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		 <label for="rating">Rating<span style="color:red">*</span></label>
      		 <br>
      		<div class="rating-box">
          <div class="rating-container">
          <input type="radio" name="rating" value="5" id="star-5"> <label for="star-5">&#9733;</label>
          
          <input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>
          
          <input type="radio" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>
          
          <input type="radio" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>
          
          <input type="radio" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
        </div>
        </div>
      	</div>
        <div class="form-group">
            <label for="title">Review Title<span style="color:red">*</span></label>
            <input type="text" class="form-control" id="text" placeholder="Maximum 50 word" required>
          </div>
          <div class="form-group">
            <label for="review">Review<span style="color:red">*</span></label>
            <textarea class="form-control" id="review" placeholder="" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<?php
	include 'footer.php';
?>