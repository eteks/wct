
<?php

	  require_once 'header.php';
	  require_once 'functions/usermanagement_function.php';
	  $usermanagementFunction = new usermanagementFunction();
	  if(isset($_POST['login'])){
		$usertype = $_POST['optradio'];
		$emailid = $_POST['email'];
		$password = $_POST['password'];
		$user = $usermanagementFunction->Login($emailid, $password,$usertype);
		if ($user) {
			// Login Success
		   header("location:sports.php");
		} else {
			// Login Failed
			echo "<script>alert('Emailid / Password Not Match')</script>";
		}
	}

?>
<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['userid'] == '100'){
		header("location:athletes.php");
	}else{
		header("location:sports.php");
	}
}
?>
<form role="form" action="" method="post" name="login_form" id="login_form_id">
	<div class="select_user_content">
		<div class="container">
			<div class="user_txt">
	  			<span>SELECT USER TYPE</span>
			</div><!--user_txt-->
			<div class="user_type  col-md-12">
			    <div class="radio admin">
				  	<input id="radio-1" type="radio" name="optradio" value="administrator" checked />
				  	<label for="radio-1" class="admin_label">
				    ADMINISTRATOR
				  	</label>
				  	<input id="radio-2" type="radio" name="optradio" value="admin" />
				  	<label for="radio-2" class="admin_label">
				   	ADMIN
				  	</label>
				</div>
			</div><!--user_type-->
		</div><!--container-->
		<div class="login_form">
			<div class="container">
				<div class="user-content col-md-5 col-xs-9">
				    <div class="form-group">
						<label for="email" class="email_txt">Email Address</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" data-validation-error-msg="Please Enter your Email Address" data-validation="required" data-validation="email">
				    </div>
				    <div class="form-group">
						<label for="pwd" class="pwd_txt">Password</label>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" data-validation-error-msg="Please Enter your Password" data-validation="required" data-validation="valid">
				    </div>
				    <div class="checkbox">
				        <label class="remember_txt"><input type="checkbox"> Remember me</label>
				    </div>
				    <div class="form-group admin-login">
					    <input type="submit" class="btn btn-default login_btn" value="Login"  name="login"/>
					   <!--  <span class="forget_txt">Forget Password?</span> -->
				    </div>
			  	</div><!--user-content-->
		  	</div><!--login_form-->
		</div><!--container-->
	</div><!--select_user_content-->
</form>
<div class="popup_fade cancel_btn"></div><!--popup_fade-->
<div class="container">
    <div class="register_div">
      <code class="close_btn cancel_btn"> </code>
        <div class="login_title">
          <span class="login_txt">REGISTER</span>
        </div><!--login_title-->
        <div class="login_content">
          <div class="col-md-12 col-xs-9">
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
<?php require_once 'footer.php';?>
