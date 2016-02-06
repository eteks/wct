<?php require_once "common.php";?>
<!DOCTYPE html>
<html>
<head>
 <title>Velocity</title>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

 <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script type="text/javascript" src="js/action.js"></script>

</head>
<body>
  <nav class="navbar navbar-inverse header_bg">
      <div class="container header_content">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="logo_img" href="#"></a>
        </div><!--navbar-header-->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['login'])) { ?>
                <li><a href="#">REGISTER</a></li>
                <!-- <li><a href="#">LOGIN</a></li> -->
                <?php }else{ ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </div><!--collapse-->
      </div><!--header_content-->
  </nav>
<?php if(isset($_SESSION['login'])) { ?>
    <div class="container-fluid menu_list">
      <ul class="nav nav-justified navbar-default nav_holder">
        <li class="dropdown">
          <a href="#" data-toggle="collapse" data-target="#one">MASTER</a>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="collapse" data-target="#two">TRANSACTION</a>
        </li>
        <li class="dropdown">
          <a href="#">REPORTS</a>
        </li>
      </ul>
    </div><!--menu_list-->
    <div class="container-fluid menu_list">
      <nav id="submenu">
        <ul class="nav nav-justified submenu-align">
          <li>
            <ul class="nav nav-justified submenu_list collapse" id="one">
                <li><a href="#" id="">SPORTS</a></li>
                <li><a href="#" id="">CATEGORY</a></li>
                <li><a href="#" id="">STATE</a></li>
                <li><a href="#" id="">DISTRICT</a></li>
                <li><a href="#" id="">TEST</a></li>
                <li><a href="#" id="">TEST BATTERY</a></li>
                <li><a href="#" id="">RANGE</a></li>
            </ul>
           </li>
           <li>
             <ul class="nav nav-justified submenu_list collapse" id="two">
                <li><a href="#" id="">ADD ATHLETES</a></li>
                <li><a href="#" id="">CREATE SCHEDULE</a></li>
                <li><a href="#" id="">ASSIGN SCHEDULE</a></li>
                <li><a href="#" id="">RESULT</a></li>
              </ul>
            </li>
        </ul>
      </nav>
    </div><!--menu_list-->

    <div class="popup_fade cancel_btn"></div><!--popup_fade-->
      <div class="container">
          <div class="delete_div">
            <code class="close_btn cancel_btn"> </code>
              <div class="del_title">
                <span class="del_txt">DELETE</span>
              </div><!--del_title-->
              <div class="del_content">
                <span class="del_content_txt">Are you sure want to delete this record?</span>
                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
                <input type="button" class="btn btn-primary align_right no_btn" value="No">
              </div><!--del_content-->
          </div><!--delete_div-->
      </div><!--container-->
<?php }?>
