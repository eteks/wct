<?php require_once "common.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Wellocity</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/fav_icon.png"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/dateselector.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/combobox.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/jquery.date-dropdowns.js"></script>
    <script type="text/javascript" src="form-validator/jquery.form-validator.min.js"></script>
    <script src="js/custom_form_validate.js"></script>
    <script type="text/javascript" src="js/action.js"></script>
</head>
<body>
  <div class="navbar navbar-inverse header_bg">
      <div class="container header_content">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="logo_img" href="index.php"></a>
        </div><!--navbar-header-->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['login'])) { ?>
                <!-- <li class="register"><a href="#">REGISTER</a></li> -->
                <!-- <li><a href="#">LOGIN</a></li> -->
                <?php }else{ ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </div><!--collapse-->
      </div><!--header_content-->
  </div>
<?php if(isset($_SESSION['login'])) { ?>
    <div class="container-fluid menu_list">
      <ul class="nav nav-justified navbar-default nav_holder">
        <?php if($_SESSION['usertype']=='administrator') { ?>
        <li class="dropdown master-holder">
          <a href="#" data-target="#one">MASTER</a>
        </li>
        <?php } ?>
        <li class="dropdown transaction-holder">
          <a href="#" data-target="#two">TRANSACTION</a>
        </li>
        <li class="dropdown report-holder">
          <a href="reports.php">REPORTS</a>
        </li>
      </ul>
    </div><!--menu_list-->
    <div class="container-fluid menu_list">
      <div id="submenu">
        <ul class="nav nav-justified submenu-align">
          <li>
            <ul class="nav nav-justified submenu_list master-list" id="one">
                <li><a href="sports.php" id="">SPORTS</a></li>
                <li><a href="category.php" id="">CATEGORY</a></li>
                <li><a href="state.php" id="">STATE</a></li>
                <li><a href="district.php" id="">DISTRICT</a></li>
                <li><a href="#" id="" class="paramter_menu">PARAMETER</a>
                <div class="parameter-list">
                  <ul class="parameter-menu">
                    <li><a href="parameter_type.php">TYPE</a></li>
                    <li><a href="parameter_unit.php">UNIT</a></li>
                  </ul>
                </div><!--parameter-list--></li>
                <li><a href="test.php" id="">TEST</a></li>
                <li><a href="test_battery.php" id="">TEST BATTERY</a></li>
                <li><a href="range.php" id="">RANGE</a></li>
            </ul>
           </li>
           <li>
             <ul class="nav nav-justified submenu_list transaction-list" id="two">
                <li><a href="athletes.php" id="">ADD ATHLETES</a></li>
                <li><a href="create_schedule.php" id="">CREATE SCHEDULE</a></li>
                <li><a href="assign_schedule.php" id="">ASSIGN SCHEDULE</a></li>
                <li><a href="result.php" id="">RESULT</a></li>
              </ul>
            </li>
        </ul>
      </div>
    </div><!--menu_list-->
    <div class="popup_fade cancel_btn"></div> 
		 
		 	<div class="success_msg">
			 	<div class="success-alert">
			 		<span></span>
			 	</div><!--success-alert-->
			 	<input type="submit" class="btn btn-primary alert_btn" value="Ok">
		 	</div><!--success_msg-->
		

<?php } ?>
