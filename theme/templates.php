<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Statiofy</title><link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="custom-styles.css">-->

</head><!--/head-->

<?php
if (isset($_SESSION['gcCart'])){
  if (@count($_SESSION['gcCart'])>0) {
    $cart = '<span class="carttxtactive">('.@count($_SESSION['gcCart']) .')</span>';
  } 
 
} 
 ?>

<body style="background-color:white" onload="totalprice()" >

  <header id="header"><!--header-->
    <div class="header_top" style="background-color: #0B58FF;"><!--header_top-->
      <div class="container" >
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> +256 744 870 987</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> statiofy@gmail.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    
    <div class="header-middle" id="stickyHeader"><!--header-middle-->
      <div class="container">
        <div class="row" style="display: flex; flex-direction:row; alighn-items: center; justify-content: space-between;">
          <div class="col-md-4 clearfix">
              <div class="logo pull-left" style="margin-top: 10px;">
                  <!-- <a href="<?php echo web_root?>"><img src="images/home/logo.png" alt="" /></a> -->
                  <img src="<?php echo web_root; ?>images/home/logos/statiofy_logo1.jpg" alt="Image" height="20px" width="150px">
                </div> 
              </div>
              <div class="group" style="margin-right: 20px;" >
                <form action="<?php echo web_root?>index.php?q=product" method="POST" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; gap: 10px;">
                  <input placeholder="Search items & categories" type="search" class="input" style="min-width:300px; border: 1px;">
                  <button type="submit" class="my-search-btn" style="background-color: #FE980F; height: 40px; " >Search</button>
                    </form>
              </div>
              <div class="col-md-8 clearfix">
                <!-- From Uiverse.io by alexruix --> 

              <div class="shop-menu clearfix pull-right" style="right: 0; justify-content: flex-end;">
                  <ul class="nav navbar-nav">     
                    <li><a href="<?php echo web_root;?>index.php?q=cart"><i class="fa fa-shopping-cart"></i> <b>Cart</b></a></li>
                    <?php if (isset($_SESSION['CUSID'] )) { ?>  
                      <li><a href="<?php echo web_root?>index.php?q=profile"><i class="fa fa-user"></i><b> Account</b></a></li>     
                      <li><a   href="<?php echo web_root?>logout.php"><i class="fa fa-lock"></i> <b>Logout</b></a></li>
                    <?php }else{ ?> 
                    <li><a data-target="#smyModal" data-toggle="modal"  href=""><i class="fa fa-lock"></i><b> Login</b></a></li>
                  <?php } ?>
                  </ul>
              </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="<?php echo web_root;?>" class="active">Home</a></li>
                <li class="dropdown"><a href="#">Categories<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                       <?php 
                                            $mydb->setQuery("SELECT * FROM `tblcategory`");
                                            $cur = $mydb->loadResultList();
                                           foreach ($cur as $result) { 
                                       echo '<li><a href="index.php?q=product&category='.$result->CATEGORIES.'" >'.$result->CATEGORIES.'</a></li>';
                                        } ?> 
                                    </ul>
                                </li> 

         
                <li><a href="<?php web_root?>index.php?q=product">Products</a></li>
                <li><a href="<?php web_root?>index.php?q=contact">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <form action="<?php echo web_root?>index.php?q=product" method="POST" > 
              <div class="search_box pull-right">
                <input type="text" name="search" placeholder="Search"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->

  <?php 
  require_once $content; 
  ?> 

    <footer id="footer"><!--Footer-->
    <div class="footer-top" style="display: none;">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="companyinfo">
              <h2><span>Statiofy</span></h2>
              <p>Shop at anytime of your confort</p>
            </div>
          </div>
          <div class="col-sm-7">
            <div class="col-sm-6">
              <div class="video-gallery text-center">
                <a href="#"> 
                    <iframe class="iframe-img"  src="https://www.youtube.com/embed/d8N21Q_UN4w"   allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                </a> 
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="video-gallery text-center">
                <a href="#"> 
                   <iframe  class="iframe-img"  src="https://www.youtube.com/embed/aMDC3Da4KIA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                </a> 
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="address">
              <img src="images/home/map.png" alt="" />
              <p>Kampala - Uganda</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="footer-widget" style="display: none;">
      <div class="container">
        <p>Navigate quickly through the system</p>
        <div class="row">
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>Service</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Online Help</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Order Status</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>Quick Shop</h2>
              <ul class="nav nav-pills nav-stacked">
                 <?php 
                      $mydb->setQuery("SELECT * FROM `tblcategory` LIMIT 6");
                      $cur = $mydb->loadResultList();
                     foreach ($cur as $result) {
                      echo '<li><a href="index.php?q=product&category='.$result->CATEGORIES.'" >'.$result->CATEGORIES.'</a></li>';
                      }
                  ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>Policies</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privecy Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>About Shopper</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Company Information</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Store Location</a></li>
              </ul>
            </div>
          </div>
      
          
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
        <!-- WhatsApp Chat Button -->
        <a href="https://wa.me/256744870987" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp" rel="noopener noreferrer">
            <img src="<?php echo web_root; ?>images/home/whatsapp--v1.png" title="Chat with us on WhatsApp" alt="WhatsApp Chat Icon"/>
        </a>
      <div class="container">
        <div class="row">
          <p class="pull-left">&copy <span><?php echo date('Y')?> All Rights Reserved</span></p>
          <p class="pull-right">Designed by <span>Fred & Bryan</span></p>
        </div>
      </div>
    </div>
    
  </footer><!--/Footer-->

 <!-- modalorder -->
 <div class="modal fade" id="myOrdered">
 </div>


 <?php include "LogSignModal.php"; ?> 
<!-- end -->
 
    <!-- jQuery -->
    <script src="<?php echo web_root; ?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript --> 
    <!-- DataTables JavaScript -->
    <script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/ekko-lightbox.js"></script> 
<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

   
<script src="<?php echo web_root; ?>js/jquery.scrollUp.min.js"></script>
<script src="<?php echo web_root; ?>js/price-range.js"></script>
<script src="<?php echo web_root; ?>js/jquery.prettyPhoto.js"></script>
<script src="<?php echo web_root; ?>js/main.js"></script> 

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
  <script src="js/contact.js"></script>

    <!-- Custom Theme JavaScript --> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/janobe.js"></script> 
 <script type="text/javascript">
  $(document).on("click", ".proid", function () {
    // var id = $(this).attr('id');
      var proid = $(this).data('id')
    // alert(proid)
       $(".modal-body #proid").val( proid )

      });

</script>
 <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>


      <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

<script type="text/javascript">


$('#date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });

 
 
 
function validatedate(){ 

    var todaysDate = new Date() ;

    var txtime =  document.getElementById('ftime').value
    // var myDate = new Date(dateme); 

    var tprice = document.getElementById('alltot').value 
    var BRGY = document.getElementById('BRGY').value
    var onum = document.getElementById('ORDERNUMBER').value

     
     var mytime = parseInt(txtime)  ;
     var todaytime =  todaysDate.getHours()  ;
       if (txtime==""){
     alert("You must set the time enable to submit the order.")
     }else 
     if (mytime<todaytime){ 
        alert("Selected time is invalid. Set another time.")
      }else{
        window.location = "index.php?page=7&price="+tprice+"&time="+txtime+"&BRGY="+BRGY+"&ordernumber="+onum; 
      }
  }
</script>  


    <script type="text/javascript">
  $('.form_curdate').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
  $('.form_bdatess').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
<script>
 


  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
  window.addEventListener('scroll', function() {
    const headerTop = document.querySelector('.header_top');
    const headerMiddle = document.getElementById('stickyHeader');
    const body = document.body;
    
    // Get the height of the top header
    const headerTopHeight = headerTop.offsetHeight;
    
    // Get current scroll position
    const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    
    // If scrolled past the top header, make middle header sticky
    if (scrollPosition > headerTopHeight) {
        headerMiddle.classList.add('sticky');
        body.classList.add('sticky-active');
    } else {
        headerMiddle.classList.remove('sticky');
        body.classList.remove('sticky-active');
    }
});

       
  </script>     

<style type="text/css">
  /* WhatsApp Floating Button */
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    background-color: #25D366;
    border-radius: 50%;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s;
}

.whatsapp-float img {
    width: 40px;
    height: 40px;
}

.whatsapp-float:hover {
    transform: scale(1.1);
}

</style>
</body>
</html>