<?php require_once "common.php";
  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title>Velocity</title>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 
 <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
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
            <li><a href="#">REGISTER</a></li>
            <li><a href="#">LOGIN</a></li>
          </ul>
        </div><!--collapse-->
      </div><!--header_content-->
  </nav>
<?php if ((strpos($url,'index.php') == false) && ($_SESSION['admin'])){ ?>
  <div class="container-fluid">
    <ul class="nav nav-justified navbar-default">
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
</div>
<div class="container-fluid">
  <nav id="submenu">
    <ul class="nav nav-justified">
      <li>
        <ul class="nav nav-justified collapse" id="one">
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
         <ul class="nav nav-justified collapse" id="two">
            <li><a href="#" id="">ADD ATHLETES</a></li>
            <li><a href="#" id="">CREATE SCHEDULE</a></li>
            <li><a href="#" id="">ASSIGN SCHEDULE</a></li>
            <li><a href="#" id="">RESULT</a></li>
          </ul>
       </li>
    </ul>
  </nav>
</div>
<?php }?>
</body>
</html>