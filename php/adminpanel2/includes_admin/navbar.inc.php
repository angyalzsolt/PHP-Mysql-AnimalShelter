<?php 
session_start();
include("includes_admin/dbh.inc.php");
include("includes_admin/output_verify_adopter.inc.php");
       $sql2 = "SELECT * FROM supporter
                LEFT JOIN cat ON supporter.fk_cat_id = cat.cat_id 
                LEFT JOIN dog ON supporter.fk_dog_id = dog.dog_id 
                WHERE verify = 2";
                      $result2 = mysqli_query($conn, $sql2);
                      $rows2 = $result2->fetch_all(MYSQLI_ASSOC);

       $sql3 = "SELECT * FROM eshop_customer
                WHERE status = 'waiting'";
                      $result3 = mysqli_query($conn, $sql3);
                      $rows3 = $result3->fetch_all(MYSQLI_ASSOC);
$nrows=  count($rows);
$nrows2=  count($rows2);
$nrows3=  count($rows3);

if (!isset($_SESSION['userUid']))
        { header ("Location:login.php") ; } else {
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Útulok Piešťany</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../../img/logo5.png" />
    <style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
    </style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="../../css/side.css">

        <!--===================
        Header
        =======================-->
        <header class="header">
          <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 ">

            <div  style="width:5vh;" ></div>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

             </div>
             <div class="lang-btn-group">
              <form method="post">
                <input class="lang-btn" type="submit" name="eng" value="ENG">
                 <span>|</span>
                 <input class="lang-btn" type="submit" name="ger" value="GER">
                 <span>|</span>
                 <input class="lang-btn" type="submit" name="slo" value="SLO">
                </form>
              <?php   include("includes_admin/admin_config.php");  ?>
             </div>
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
              <ul class="navbar-nav">
               <li class="nav-item dropdown notifications-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning bg-warning"><?php echo $nrows2+$nrows3+$nrows; ?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <ul class="dropdown-menu-over list-unstyled">
                    <li class="header-ul text-center"><?php echo $languages[$x]["you_have"] ?> <?php echo $nrows2+$nrows3+$nrows; ?> <?php echo $languages[$x]["notif"] ?></li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                        <ul class='menu list-unstyled'>
                      


       <?php if(!empty($rows)){ ?>
      
        <li>
          <a href='list_adopters.php'>
        <i class='fa fa-users text-aqua'></i><?php echo $languages[$x]["notification1"] ?> (<?php echo $nrows; ?>) 
        </a>
      </li>
      <?php } ;

       if(!empty($rows2)){ ?>
      <li>
          <a href='list_supporters.php'>      
        <i class='fa fa-users text-aqua'></i> <?php echo $languages[$x]["notification2"] ?> (<?php echo $nrows2; ?>)
        </a>
      </li>
      <?php } ;

       if(!empty($rows3)){ ?>
      <li>
          <a href='list_eshop.php'>
        <i class='fa fa-users text-aqua'></i> <?php echo $languages[$x]["notification3"] ?> (<?php echo $nrows3; ?>) 
        </a>
      </li>
      <?php } ;?>

                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item dropdown  user-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="../../img/logo4.png" width="160" class="user-image" alt="User Image" >
                  <span class="hidden-xs">Útulok Piešťany</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="admin_landing_page2.php">Start Admin Page</a>
                  <a class="dropdown-item" href="../index.php">Go to Main Page</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="main" >
        <aside>
          <div  style="height: 100vh; overflow: auto; " class="fixed-top sidebar left ">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="../../img/logoo.jpg" width="100" class="rounded-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>Admin Panel</p>
                <a href="admin_landing_page2.php"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['userUid']; ?></a>
              </div>
            </div>
            <ul class="list-sidebar bg-defoult">
              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> <?php echo $languages[$x]["dashboard"] ?> </span> <span class="fa fa-chevron-left pull-right"></span> </a>
              <ul class="sub-menu collapse" id="dashboard">
                <li class="active"><a href="admin_landing_page2.php"><?php echo $languages[$x]["dashboard1"] ?></a></li>
                <li class="active"><a href="../index.php"><?php echo $languages[$x]["dashboard2"] ?></a></li>
              </ul>
            </li>
            
            <li> <a href="#" data-toggle="collapse" data-target="#dogs" class="collapsed active" > <i class="fas fa-dog"></i> <span class="nav-label"><?php echo $languages[$x]["dogs"] ?></span> <span class="fa fa-chevron-left pull-right"></span> </a>
            <ul class="sub-menu collapse" id="dogs">
              <li><a href="upload_dog.php"><?php echo $languages[$x]["dogs1"] ?></a></li>
              <li><a href="edit_dogs.php"><?php echo $languages[$x]["dogs2"] ?></a></li>
              <li><a href="select_dog.php"><?php echo $languages[$x]["dogs3"] ?></a></li>
            </ul>
          </li>
            <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="fas fa-cat"></i> <span class="nav-label"><?php echo $languages[$x]["cats"] ?></span> <span class="fa fa-chevron-left pull-right"></span> </a>
            <ul class="sub-menu collapse" id="products">
              <li><a href="upload_cat.php"><?php echo $languages[$x]["cats1"] ?></a></li>
              <li><a href="edit_cats.php"><?php echo $languages[$x]["cats2"] ?></a></li>
              <li><a href="select_cat.php"><?php echo $languages[$x]["cats3"] ?></a></li>
            </ul>
          </li>
          <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fa fa-table"></i> <span class="nav-label"><?php echo $languages[$x]["edit"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="tables" >
            <li><a href="edit_support.php"><?php echo $languages[$x]["edit1"] ?></a></li>
            <li><a href="edit_adopt.php"><?php echo $languages[$x]["edit2"] ?></a></li>
            <li><a href="edit_mission.php"><?php echo $languages[$x]["edit3"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#info" class="collapsed active" ><i class="fas fa-info-circle"></i> <span class="nav-label"><?php echo $languages[$x]["info"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="info" >
            <li><a href="upload_info.php"><?php echo $languages[$x]["info1"] ?></a></li>
            <li><a href="edit_info.php"><?php echo $languages[$x]["info2"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#team" class="collapsed active" ><i class="fas fa-people-carry"></i> <span class="nav-label"><?php echo $languages[$x]["team"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="team" >
            <li><a href="upload_team.php"><?php echo $languages[$x]["team1"] ?></a></li>
            <li><a href="edit_team.php"><?php echo $languages[$x]["team2"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#sponsors" class="collapsed active" ><i class="fas fa-ad"></i> <span class="nav-label"><?php echo $languages[$x]["sponsor"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="sponsors" >
            <li><a href="upload_sponsors.php"><?php echo $languages[$x]["sponsor1"] ?></a></li>
            <li><a href="edit_sponsors.php"><?php echo $languages[$x]["sponsor2"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#reports" class="collapsed active" ><i class="fa fa-table"></i> <span class="nav-label"><?php echo $languages[$x]["reports"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="reports" >
            <li><a href="upload_report.php"><?php echo $languages[$x]["reports1"] ?></a></li>
            <li><a href="edit_report.php"><?php echo $languages[$x]["reports2"] ?></a></li>
            <li><a href="upload_report_image.php"><?php echo $languages[$x]["reports3"] ?></a></li>
            <li><a href="edit_report_image.php"><?php echo $languages[$x]["reports4"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#Shelter" class="collapsed active" ><i class="fas fa-warehouse"></i> <span class="nav-label"><?php echo $languages[$x]["shelter"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="Shelter" >
            <li><a href="upload_shelter.php"><?php echo $languages[$x]["shelter1"] ?></a></li>
            <li><a href="edit_shelter.php"><?php echo $languages[$x]["shelter2"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#users" class="collapsed active" ><i class="fas fa-user-alt"></i> <span class="nav-label"><?php echo $languages[$x]["user"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="users" >
            <li><a href="register.php"><?php echo $languages[$x]["user1"] ?></a></li>
            <li><a href="edit_users.php"><?php echo $languages[$x]["user2"] ?></a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#supporters" class="collapsed active" ><i class="fas fa-user-shield"></i> <span class="nav-label"><?php echo $languages[$x]["support"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="supporters" >
            <li><a href="list_supporters.php"><?php echo $languages[$x]["support1"] ?></a></li>
            <li><a href="verify_supporter.php"><?php echo $languages[$x]["support2"] ?></a></li>
            </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#adopters" class="collapsed active" ><i class="fas fa-user-tag"></i> <span class="nav-label"><?php echo $languages[$x]["adopt"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
          <ul  class="sub-menu collapse" id="adopters" >
            <li><a href="list_adopters.php"><?php echo $languages[$x]["adopt1"] ?></a></li>
            <li><a href="verify_adopter.php"><?php echo $languages[$x]["adopt2"] ?></a></li>
            </ul>
        </li>

        <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" ><i class="fa fa-shopping-cart"></i> <span class="nav-label"><?php echo $languages[$x]["selling"] ?></span><span class="fa fa-chevron-left pull-right"></span></a>
        <ul  class="sub-menu collapse" id="e-commerce" >
          <li><a href="list_eshop.php"><?php echo $languages[$x]["selling1"] ?></a></li>
          <li><a href="upload_eshop.php"><?php echo $languages[$x]["selling2"] ?></a></li>
          <li><a href="list_auctions2.php"><?php echo $languages[$x]["selling3"] ?></a></li>
          <li><a href="upload_auctions.php"><?php echo $languages[$x]["selling4"] ?></a></li>
        </ul>
      </li>
     <!-- <li> <a href="#" data-toggle="collapse" data-target="#video" class="collapsed active" ><i class="fab fa-youtube"></i> <span class="nav-label">Video</span><span class="fa fa-chevron-left pull-right"></span></a>
        <ul  class="sub-menu collapse" id="video" >
          <li><a  href="upload_video.php">Upload Video</a></li>
          <li><a  href="edit_video.php">Edit Video</a></li>
        </ul>
      </li>-->
      <li > <a class="pt-4" style="background-color: black;" href="includes_admin/logout.inc.php?logout"><i class="fas fa-sign-out-alt"></i> <span class="nav-label"><?php echo $languages[$x]["logout"] ?></span></a> </li>
    </ul>
    </div>
    </aside>
    </div>
<?php }?>
