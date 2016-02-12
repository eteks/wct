<?php
require_once "session.php";
require_once "header.php";
require_once "functions/category_function.php";
$obj = new categoryfunction();
?>
	<div class="container">
		<div class="container align_center align_height">
			<span class="sports">CATEGORY</span>
		</div><!--end container-->
		<div class="container align_margin">
			<div class="col-md-8">
				<div class="col-md-6"></div>
				<div class="col-md-6 align_margin">
					<form id="category_form">
						<div class="align_margin">
							<label>Enter the Category Name</label><br>
							<input type="text" class="sportsname" name="category_name">
							<input type="hidden" name="category_add" value="1">
						</div>
						<button type="button" class="btn btn-primary align_right clear category_submit_act">Submit</button>
					</form>
				</div>
				<div class="container">
				  <table class="table state_table" id="category_table">
				    <thead>
				      <tr class="row_color">
				        <th class="align_center">SLNO</th>
				        <th class="align_center">Category Name</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>
						<?php
							$data = $obj->categoryselectfunction();
							foreach( $data as $eachrecord ) {
						 ?>
				    	<tr class="align_center delete_color">
					        <td class="category_id"><?php echo $eachrecord ['categories_id']; ?></td>
					        <td class="category_name"><?php echo $eachrecord ['categories_name']; ?></td>
					         <td>
					        	<span class="edit_state">Edit</span>
					        	<span class="delete_state" data-value="<?php echo $eachrecord ['categories_id']; ?>">Delete</span>
					        </td>
				      	</tr>
						<?php } ?>
				    </tbody>
				  </table>
				</div>
			</div>
		</div><!-- end  container-->
	</div>
	<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="state_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
      			<div class="container state-content col-md-12">
					<form name="category_update" id="category_update_form">
						<div class="align_margin">
							<label>Enter the Category Name</label><br>
							<input type="text" class="sportsname category_update_name" name="category_name">
							<input type="hidden" class="category_update_id" name="category_id">
							<input type="hidden" name="category_update" value="1">
						</div><!--align_margin-->
						<button type="button" class="btn btn-primary align_right clear category_update_act">Submit</button>
					</form>
				</div><!--tate-content-->
			</div><!--state_div-->
		</div><!--container-->

<?php require_once "footer.php" ?>
