<?php
require_once "session.php";
require_once "functions/sports_function.php";
require_once "header.php";
$obj = new sportsfunction();
?>
<div class="container align_center left_align align_height">
	<span class="sports">SPORTS</span>
</div><!--end container-->
<div class="container">
	<div class="col-md-8">
		<!-- <div class="col-md-6"></div> -->
		<div class="col-md-6 align_margin_sports">
			<form  id="sports_form" name="sport_form" role="form">
				<div class="align_margin">
					<label>Enter the name of the Sports</label><br>
					<input type="text" class="sportsname" name="sports_name" data-validation-error-msg="Please Enter the name of the Sports" data-validation="required">
					<input type="hidden" name="sports_add" value="1">
				</div>
				<!-- <button type="button" id="submmit" class="btn btn-primary align_right clear sports_submit_act">Submit</button> -->
				<input type="submit" id="submmit" class="btn btn-primary clear sports_submit_act" value="Submit">
			</form>
		</div>
	</div>
</div><!-- end  container-->
<div class="container table-position">
	<table class="table sports_table" id="sports_table">
	<thead>
		<tr class="row_color">
			<th>Sports Name</th>
			<th style="text-align:right">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$data = $obj->sportsselectfunction();
		$i = 1;
		foreach( $data as $eachrecord ) {
		 ?>
	  <tr class="delete_color">
	   <!-- <td><?php //echo $i; ?></td> -->
		<input class="sports_id" value="<?php echo $eachrecord ['sports_id']; ?>" type="hidden"/>
	    <td class="sports_name"><?php echo $eachrecord ['sports_name']; ?></td>
	    <td>
	    	<span class="edit_state"><i class="fa fa-pencil-square-o"></i></span>
	    	<span class="delete_state" data-value="<?php echo $eachrecord ['sports_id']; ?>"><i class="fa fa-trash-o"></i></span>
			<div class="state_div edit_sports_div popup_hidden">
			<code class="close_btn cancel_btn"> </code>
			<div class="container state-content col-md-12">
			<form name="sports_form" id="sports_update_form">
				<div class="align_margin">
					<label>Enter the name of the Sports</label><br>
					<input type="text" class="sportsname sports_update_name" name="sports_name" data-validation-error-msg="Please Enter the name of the Sports" data-validation="required">
					<input type="hidden" class="sports_update_id" name="sports_id">
					<input type="hidden" name="sportd_update" value="1">
				</div><!--align_margin-->
				<!-- <button type="button" class="btn btn-primary align_right clear sports_update_act">Submit</button> -->
				<input type="submit" class="btn btn-primary align_right clear sports_update_act" value="Submit">
			</form>
		</div><!--tate-content-->
	</div><!--state_div-->
		<div class="delete_div delete_sports_div">
          <!--  <code class="close_btn cancel_btn"> </code> -->
              <div class="del_title">
                <span class="del_txt">DELETE</span>
              </div>
              <div class="del_content">
                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
                <input type="button" class="btn btn-primary align_right no_btn" value="No">
                <input type="hidden" name="delete_id" value="" id="delete_id"/>
              </div><!--del_content-->
		</div><!--delete_div-->
		</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
	</table>
</div>
<!--<div class="popup_fade cancel_btn"></div> --> <!--popup_fade-->
<!--<div class="container">

</div>  -->   <!--container-->
<?php require_once "footer.php" ?>
