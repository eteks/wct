<?php
require_once "session.php";
require_once "header.php";
require_once "functions/sports_function.php";
?>
<div class="container align_center">
	<span class="sports">SPORTS</span>
</div><!--end container-->
<div class="align_margin"></div>
<div class="container">
	<div class="col-md-8">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<form name="sports_form" id="sports_form">
				<div class="align_margin">
					<label>Enter the name of the Sports</label><br>
					<input type="text" class="sportsname" name="sports_name">
				</div>
				<button type="button" class="btn btn-primary align_right submit sports_submit_act">Submit</button>
			</form>
		</div>
	</div>
</div><!-- end  container-->
<div class="align_margin"></div>
<div class="container">
  	<table class="table table_adjust" id="sports_table">
	    <thead>
			<tr>
				<th class="align_center">SLNO</th>
				<th class="align_center">Sport Name</th>
				<th class="align_center">Action</th>
			</tr>
	    </thead>
		<tbody>
			<tr class="align_center">
				<td>01</td>
				<td>Hockey</td>
				<td>Edit <span class="align_left1">Delete</span></td>
			</tr>
			<tr class="align_center">
				<td>02</td>
				<td>Foot Ball</td>
				<td>Edit <span class="align_left1">Delete</span></td>
			</tr>
			<tr class="align_center">
				<td>03</td>
				<td>Cricket</td>
				<td>Edit <span class="align_left1">Delete</span></td>
			</tr>

		</tbody>
  	</table>
</div>
<?php require_once "footer.php" ?>
