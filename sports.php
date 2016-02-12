<?php
require_once "session.php";
require_once "functions/sports_function.php";
require_once "header.php";
$obj = new sportsfunction();
?>
<div class="container align_center align_height">
	<span class="sports">SPORTS</span>
</div><!--end container-->
<div class="container">
	<div class="col-md-8">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<form  id="sports_form" name="sport_form" role="form">
				<div class="align_margin">
					<label>Enter the name of the Sports</label><br>
					<input type="text" class="sportsname" name="sports_name" data-validation-error-msg="Please Enter the name of the Sports" data-validation="required">				
					<input type="hidden" name="sports_add" value="1">
				</div>
				<button type="button" id="submmit" class="btn btn-primary align_right clear sports_submit_act">Submit</button>
			</form>
		</div>
	</div>
</div><!-- end  container-->
<div class="container">
	<table class="table state_table" id="sports_table">
	<thead>
		<tr class="row_color">
			<th class="align_center">SLNO</th>
			<th class="align_center">Sport Name</th>
			<th class="align_center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$data = $obj->sportsselectfunction();
		foreach( $data as $eachrecord ) {
		 ?>
	  <tr class="align_center delete_color">
	    <td class="sports_id"><?php echo $eachrecord ['sports_id']; ?></td>
	    <td class="sports_name"><?php echo $eachrecord ['sports_name']; ?></td>
	    <td>
	    	<span class="edit_state">Edit</span>
	    	<span class="delete_state" data-value="<?php echo $eachrecord ['sports_id']; ?>">Delete</span>
	    </td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
</div>
<div class="popup_fade cancel_btn"></div><!--popup_fade-->
<div class="container">
	<div class="state_div">
		<code class="close_btn cancel_btn"> </code>
			<div class="container state-content col-md-12">
			<form name="sports_form" id="sports_update_form">
				<div class="align_margin">
					<label>Enter the name of the Sports</label><br>
					<input type="text" class="sportsname sports_update_name" name="sports_name">
					<input type="hidden" class="sports_update_id" name="sports_id">
					<input type="hidden" name="sportd_update" value="1">
				</div><!--align_margin-->
				<button type="button" class="btn btn-primary align_right clear sports_update_act">Submit</button>
			</form>
		</div><!--tate-content-->
	</div><!--state_div-->
</div><!--container-->
<?php require_once "footer.php" ?>
