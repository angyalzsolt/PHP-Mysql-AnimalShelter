<?php setcookie('taxcookie', 'true', time() + 60*60*24  , "/");?>
<?php   include("includes/front_config.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Útulok Piešťany</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
  <link href="../css/header.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/logo4.png" />
  <style>
#logoreplace {  
  position: absolute!important;
}
.space {
  width: 90px;
}
@media (max-width: 992px) {
#logoreplace {  
  width: 60px;
}
}
#element {
  position: fixed;
  bottom: 20px;
  right: 20px;
}  
#element a{
 text-decoration: none;
 color: white;
}
</style>

</head>
<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav"> 
    
      <img class="" id="logoreplace" src="../img/logo3.png" width="90" alt="">
     
      
        <?php 
      $tax = " <div>
                <button style='margin-right: 0;' type='button' id='element' data-placement='top'  class='btn btn-success' rel='popover'
                        data-content='<a href=\"tax.php\">Please donate your 2% of tax to our organisation.</a>'
                        data-original-title='Give your 2%!'
                        data-html='true'>2% TAX
                </button>
              </div>
              <script>
                $(function() { 
                   $('#element').popover('show');
                });
              </script>";

if(!isset($_COOKIE['taxcookie']) || $_COOKIE['taxcookie'] !== 'true') { 
  echo $tax;
  setcookie('taxcookie', 'true', time() + 60*60*24, "/");
 
} else {
  echo "<div>
                <button style='margin-right: 0;' type='button' id='element' data-placement='top'  class='btn btn-success' rel='popover'
                        data-content='<a href=\"tax.php\">Please donate your 2% of tax to our organisation.</a>'
                        data-original-title='Give your 2%!'
                        data-html='true'><a href='tax.php'>2% TAX</a>
                </button>
              </div>";
}
  ?>
     
    <div class="container">
      <div class="space"></div> <a class="navbar-brand js-scroll-trigger work" href="index.php"> 
Útulok Piešťany</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle js-scroll-trigger" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <?php echo $languages[$x]["ABOUT_US"] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="ourmission.php"><?php echo $languages[$x]["OUR_MISSION"] ?></a>
              <a class="dropdown-item" href="team_page.php"><?php echo $languages[$x]["OUR_TEAM"] ?></a>
              <a class="dropdown-item" href="info.php"><?php echo $languages[$x]["IMPORTANT_INFO"] ?></a>
              <a class="dropdown-item" href="sponsors.php"><?php echo $languages[$x]["SPONSORS"] ?></a>
              <a class="dropdown-item" href="gallary.php"><?php echo $languages[$x]["GALLERY"] ?></a>
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle js-scroll-trigger" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $languages[$x]["DOGS&CATS"] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="dogs.php"><?php echo $languages[$x]["DOGS"] ?></a>
              <a class="dropdown-item" href="cats.php"><?php echo $languages[$x]["CATS"] ?></a>
              <a class="dropdown-item" href="search.php"><?php echo $languages[$x]["SEARCH"] ?></a>
              <a class="dropdown-item" href="adoption.php"><?php echo $languages[$x]["ADOPT"] ?></a>
              <a class="dropdown-item" href="support.php"><?php echo $languages[$x]["SUPPORT"] ?></a>
              <a class="dropdown-item" href="adopted.php"><?php echo $languages[$x]["IN_HAPPY_HOME"] ?></a>
              <a class="dropdown-item" href="in_memoriam.php"><?php echo $languages[$x]["IN_MEMORIAM"] ?></a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="reports.php"><?php echo $languages[$x]["REPORTS"] ?></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle js-scroll-trigger" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $languages[$x]["OTHER"] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="eshop1.php"><?php echo $languages[$x]["E-SHOP"] ?></a>
              <a class="dropdown-item" href="auction.php"><?php echo $languages[$x]["AUCTION"] ?></a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php"><?php echo $languages[$x]["CONTACT"] ?></a>
          </li>
          <li >
            <form id="donate" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="9NW8L34KBXKNG">
              <input type="image" id="paypal_img" src="../img/PayPal.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            </form>
          </li>
          <li class="pl-4">
            <a class="social_footer_ul" href="https://www.facebook.com/UtulokPiestany/?__tn__=kC-R&eid=ARDWhgRFE-NwY2LeRbqTMe-kOY5qmdRphrxqbh_R8AdGuYq52nICSjDcogk391G1Yfpj60Jxuu1qp8GD&hc_ref=ARStVqqzpg7amV2ebSI-brM3EKv3LAdyAyG0AAx8nW0gOZIoJSQ3GIKcOr-18UGwkPY&fref=nf&__xts__[0]=68.ARDRZk2Kxcg9hHP-mtRJeg3XAXYtVtXOSkEb68MUWALnCgwcKQ232KUWJ5uaDmthUgJCV580fbbYPiQ6GxPZSyv1g-DKFeP8iLfc5Gzs_COu9qDP09nnXfW8PEE0Q1HnKf5gvtyis5ecccKRkK4WZYqCZ2jWE2jI9EiAUUVk8xyaMhT7cg3jVj6uzaO2cHpJBI0LXxN91vK53mMDd8nAWTbTNtifyIwtwVR7CXx7RassZYOC3p3nSQ2LqxSdZEZ6L-FSxwrlIZWnszLu2dXPPTd4RvMl7a8vPxlAKpMnWA6RrobLp8IUb3JOEyqZdnEvDu6m0L6OC--lOrqjbwT5"><i class="fab fa-facebook fa-2x"></i></a>
          </li>
          
          
        </ul>

       
      </div>

    </div>
       <div class="lang-btn-group">
          <form method="post">
            <input class="lang-btn" type="submit" name="eng" value="ENG">
            <span>|</span>
            <input class="lang-btn" type="submit" name="ger" value="GER">
            <span>|</span>
            <input class="lang-btn" type="submit" name="slo" value="SLO">
          </form>
          
        </div>
  </nav>
