<?php require_once "common.php";?>
<!DOCTYPE html>
<html>
<head>
 <title>Velocity</title>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
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
                <li class="register"><a href="#">REGISTER</a></li>
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
          <a href="reports.php">REPORTS</a>
        </li>
      </ul>
    </div><!--menu_list-->
    <div class="container-fluid menu_list">
      <nav id="submenu">
        <ul class="nav nav-justified submenu-align">
          <li>
            <ul class="nav nav-justified submenu_list collapse" id="one">
                <li><a href="sports.php" id="">SPORTS</a></li>
                <li><a href="category.php" id="">CATEGORY</a></li>
                <li><a href="state.php" id="">STATE</a></li>
                <li><a href="district.php" id="">DISTRICT</a></li>
                <li><a href="test.php" id="">TEST</a></li>
                <li><a href="test_battery.php" id="">TEST BATTERY</a></li>
                <li><a href="range.php" id="">RANGE</a></li>
                <li><a href="#" id="" class="paramter_menu">PARAMETER</a></li>
                <div class="parameter-list">
                  <ul>
                    <li><a href="parameter_type.php">TYPE</a></li>
                    <li><a href="parameter_unit.php">UNIT</a></li>
                  </ul>
                </div><!--parameter-list-->
            </ul>
           </li>
           <li>
             <ul class="nav nav-justified submenu_list collapse" id="two">
                <li><a href="athletes.php" id="">ADD ATHLETES</a></li>
                <li><a href="create_schedule.php" id="">CREATE SCHEDULE</a></li>
                <li><a href="assign_schedule.php" id="">ASSIGN SCHEDULE</a></li>
                <li><a href="result.php" id="">RESULT</a></li>
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
                <input type="hidden" name="delete_id" value="" id="delete_id"/>
              </div><!--del_content-->
          </div><!--delete_div-->
      </div><!--container-->
      <div class="popup_fade cancel_btn"></div><!--popup_fade-->
      <div class="container">
          <div class="register_div">
            <code class="close_btn cancel_btn"> </code>
              <div class="login_title">
                <span class="login_txt">REGISTER</span>
              </div><!--login_title-->
              <div class="login_content">
                <div class="login_form col-md-12 col-xs-9">
                  <form action="" method="post" name="login" role="form">
                      <div class="form-group">
                        <label for="email" class="email_txt">Enter Your Full Name</label>
                        <input type="email" class="form-control" id="name" placeholder="Enter Your Full Name" name="email" required>
                        <span class="info_reg fr">5,or more characters,letters and Numbers.</span>
                      </div>
                      <div class="form-group">
                        <label for="email" class="email_txt">Enter Your User Name</label>
                        <input type="email" class="form-control" id="name" placeholder="Enter Your User Name" name="email" required>
                        <span class="info_reg fr">5,or more characters,letters and Numbers.</span>
                      </div>
                      <div class="form-group">
                        <label for="pwd" class="pwd_txt">Enter Your Password</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Your Password" name="password" required>
                        <span class="info_reg fr">5,or more characters,letters and Numbers,<br>must contain atleast one number.</span>
                      </div>
                      <div class="form-group">
                        <label for="pwd" class="pwd_txt">Confirm Password</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Confirm Password" name="password" required>
                      </div>
                      <div class="form-group">
                        <label for="email" class="email_txt">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
                        <span class="info_reg fr">10,or more characters,letters and Numbers.</span>
                      </div>
                      <div class="checkbox">
                        <label class="remember_txt"><input type="checkbox">I have read and agree to the <mark class="reg_check">Team and Services</mark></label>
                      </div>
                        <input type="submit" class="btn btn-default login_btn fr" value="Register"  name="login"/>

                  </form>
                </div><!--login_form-->
              </div><!--login_content-->
          </div><!--register_div-->
      </div><!--container-->
<?php } ?>
