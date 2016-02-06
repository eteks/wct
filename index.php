<?php require_once 'header.php'; 
	  require_once 'functions/usermanagement_function.php';
	  $usermanagementFunction = new usermanagementFunction();
	  if($_POST['login']){
		$emailid = $_POST['email'];
		$password = $_POST['password'];
		$user = $usermanagementFunction->Login($emailid, $password);
		if ($user) {
			// Login Success
		   header("location:sports.php");
		} else {
			// Login Failed
			echo "<script>alert('Emailid / Password Not Match')</script>";
		}
	}
?>

	<div class="select_user_content">
		<div class="container">
			<div class="user_txt">
	  			<span>SELECT USER TYPE</span>
  			</div><!--user_txt-->
  			<div class="user_type  col-md-12">
			  <form role="form">
			    <div class="radio-inline admin col-md-3">
			      <label><input type="radio" name="optradio" value="administrator">ADMINISTRATOR</label>
			    </div>
			    <div class="radio-inline admin col-md-3">
			      <label><input type="radio" name="optradio" value="admin">ADMIN</label>
			    </div>
			  </form>
		  	</div><!--user_type-->
		</div><!--container-->
		<div class="login_form">
			<div class="container">
				<div class="user-content col-md-4 col-xs-9">
				 	<form action="" method="post" name="login" role="form">
					    <div class="form-group">
					      <label for="email" class="email_txt">Email Address</label>
					      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					    </div>
					    <div class="form-group">
					      <label for="pwd" class="pwd_txt">Password</label>
					      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
					    </div>
					    <div class="checkbox">
					      <label class="remember_txt"><input type="checkbox"> Remember me</label>
					    </div>
					    <!-- <button type="submit" class="btn btn-default login_btn" name="login">Login</button> -->
					    <input type="submit" class="btn btn-default login_btn" value="Login"  name="login"/> 
					    <span class="forget_txt">Forget Password?</span>
				  	</form>
			  	</div><!--user-content-->
		  	</div><!--login_form-->
		</div><!--container-->
	</div><!--select_user_content-->

<?php require_once 'footer.php';?>