
    <style>

      /* Footer */
      @import url(//fonts.googleapis.com/css?family=Lato:300:400);

      p {
        font-family: 'Lato', sans-serif;
        letter-spacing: 1px;
        font-size:14px;
        color: #333333;
      }

      .waves {
        position:relative;
        width: 100%;
        margin-bottom:-7px; 
        min-height:100px;
        max-height:150px;
      }

      .footerInfo {
        text-align:center;
        background-color: white;
      } 

 
    .footer-distributed{
      background-color: #fff;
      box-sizing: border-box;
      width: 100%;
      text-align: left;
      font: bold 16px sans-serif;
      padding: 50px 50px 60px 50px;
    }
     
    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
      display: inline-block;
      vertical-align: top;
    }
     
    /* Footer left */
     
    .footer-distributed .footer-left{
      width: 40%;
    }
     
    .footer-distributed h3{
      color:  #2c292f;
      font: normal 36px 'Cookie', cursive;
      margin: 0;
    }
     
    /* The company logo */
     
    .footer-distributed .footer-left img{
      width: 80%;
    }
     
    .footer-distributed h3 span{
      color:  #e0ac1c;
    }
     
    /* Footer links */
     
    .footer-distributed .footer-links{
      color:  #2c292f;
      margin: 20px 0 12px;
    }
     
    .footer-distributed .footer-links a{
      display:inline-block;
      line-height: 1.8;
      text-decoration: none;
      color:  inherit;
    }
     
    .footer-distributed .footer-company-name{
      color:  #8f9296;
      font-size: 12px;
      font-weight: normal;
      margin: 0;
    }
     
    /* Footer Center */
     
    .footer-distributed .footer-center{
      width: 35%;
    }
     
     
    .footer-distributed .footer-center i{
      background-color:  #33383b;
      color: #2c292f;
      font-size: 25px;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      text-align: center;
      line-height: 42px;
      margin: 10px 15px;
      vertical-align: middle;
    }
     
    .footer-distributed .footer-center i.fa-envelope{
      font-size: 17px;
      line-height: 38px;
    }
     
    .footer-distributed .footer-center p{
      display: inline-block;
      color: #2c292f;
      vertical-align: middle;
      margin:0;
    }
     
    .footer-distributed .footer-center p span{
      display:block;
      font-weight: normal;
      font-size:14px;
      line-height:2;
    }
     
    .footer-distributed .footer-center p a{
      color:  #e0ac1c;
      text-decoration: none;;
    }
     
     
    /* Footer Right */
     
    .footer-distributed .footer-right{
      width: 20%;
    }
     
    .footer-distributed .footer-company-about{
      line-height: 20px;
      color:  #92999f;
      font-size: 13px;
      font-weight: normal;
      margin: 0;
    }
     
    .footer-distributed .footer-company-about span{
      display: block;
      color:  #2c292f;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
    }
     
    .footer-distributed .footer-icons{
      margin-top: 25px;
    }
     
    .footer-distributed .footer-icons a{
      display: inline-block;
      width: 35px;
      height: 35px;
      cursor: pointer;
      background-color:  #33383b;

      border-radius: 10px;
      font-size: 20px;
      color: white;
      text-align: center;
      line-height: 35px;
     
      margin-right: 3px;
      margin-bottom: 5px;
    }
     
    @media (max-width: 880px) {
     
      .footer-distributed .footer-left,
      .footer-distributed .footer-center,
      .footer-distributed .footer-right{
        display: block;
        width: 100%;
        margin-bottom: 40px;
        text-align: center;
      }
     
      .footer-distributed .footer-center i{
        margin-left: 0;
        }
      }

      /* Animation */

      .parallax > use {
        animation: move-forever 25s cubic-bezier(.55,.5,.45,.5) infinite;
      }
      .parallax > use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 7s;
      }
      .parallax > use:nth-child(2) {
        animation-delay: -3s;
        animation-duration: 10s;
      }
      .parallax > use:nth-child(3) {
        animation-delay: -4s;
        animation-duration: 13s;
      }
      .parallax > use:nth-child(4) {
        animation-delay: -5s;
        animation-duration: 20s;
      }
      @keyframes move-forever {
        0% {
         transform: translate3d(-90px,0,0);
        }
        100% { 
          transform: translate3d(85px,0,0);
        }
      }
      @media (max-width: 768px) {
        .waves {
          height:120px;
          min-height:50px;
        }
        .content {
          height:9vh;
        }
        h1 {
          font-size:24px;
        }
      }

      @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap');

      /* color */
      :root
      {
          --first-color: #E3F8FF;
          --second-color: #DCFAFB;
          --third-color: #FFE8DF;
          --accent-color: #FF331B;
          --dark-color: #161616;
      }

      :root
      {
          --body-font: 'Open Sans';
          --h1-font-size: 1.5rem;
          --h3-font-size: 1rem;
          --normal-font-size: 0.938rem;
          --smaller-font-size: 0.75rem;
      }

      @media screen and (min-width: 768px)
      {
        :root{
            --h1-font-size: 2rem;
            --normal-font-size: 1rem;
            --smaller-font-size: 0.813rem;
        }
      }

      h1
      {
        font-size: var(--h1-font-size);
      }

      img
      {
        max-width: 100%;
        height: auto;
      }

      .page-details
      {
          position: relative;
          height: 42px;
          width: 110px;
          float: left;
      }

      .page-details-label {
          position: relative;
          padding: 14px 30px 14px 25px;
          color: #fff;
          text-transform: uppercase;
          font-weight: 900;
          font-family: sans-serif;
          font-size: 12px;
          letter-spacing: .2px;
          float: left;
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

       .footer-distributed .footer-center i
      {
        color: white;
      }
    </style>

    <br><br>

    <footer>
      <div class="footer" >
        <!--Waves Container-->
        <div>
          <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="parallax">
          <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
          <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
          </g>
          </svg>
        </div>
        <!--Waves end-->

        </div>

        <!--Content starts-->
            <div class="footer-distributed">
 
      <div class="footer-left">
        
        <img src="image/logo2.png"/>
 
        <p class="footer-company-about">
          <a>Kidz-It established in year 2022, a private limited company, incorporated in Malaysia under the Companies Act 1965. We are part of Kidz-It, the leading retailer of toys, games, leisure equipment and educational products, as well as baby essentials across Asia.</a>
        </p>

      </div>
 
      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
            <p>Georgetown,Penang,Malaysia</p>
        </div>
 
        <div>
          <i class="fa fa-phone"></i>
          <p>+60123456789</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="https://www.google.com/">kidzit.service@gmail.com</a></p>
        </div>
      </div>
      <div class="footer-right">
        <p class="footer-company-about">
          <span>Find Us On</span></p>
        <div class="footer-icons">
          <a href="https://www.facebook.com/Kidz-It" style="background-color:#3b5998;"><i class="fa fa-facebook"></i></a>
          <a href="https://www.twittwe.com/Kidz-It" style="background-color: #00acee;"><i class="fa fa-twitter"></i></a>
          <a href="https://www.instagram.com/Kidz-It" style="  background: #f09433; 
background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); "><i class="fa fa-instagram"></i></a>
        </div>
          <br>
        <p class="footer-company-name">© 2022 Yi Leng. All Rights Reserved</p>
      </div>
    </div>
    </footer>
</html>