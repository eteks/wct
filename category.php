<?php
require_once "session.php";
require_once "header.php";
require_once "functions/category_function.php";
$obj = new categoryfunction();
?>
	<div class="container">
		<div class="align_center left_align_category align_height">
			<span class="sports">CATEGORY</span>
		</div><!--end container-->
		<div class="container align_margin align_bottom">
				<!-- <div class="col-md-6"></div> -->
				<div class="col-md-4 align_margin">
					<form id="category_form" name="categories_form" role="form">
						<div class="align_margin">
							<label>Enter name of the Category</label><br>
							<input type="text" class="sportsname" name="category_name" autocomplete="off" data-validation-error-msg="Please enter name of Category" data-validation="required">
							<input type="hidden" name="category_add" value="1">
						</div><!--align_margin-->
						<!-- <button type="button" class="btn btn-primary align_right clear category_submit_act">Submit</button> -->
						<input type="submit" class="btn btn-primary clear category_submit_act" value="Save">
						<input type="reset" value="Cancel" class="btn btn-primary clear">
					</form>
				</div>
				<div class="container table-position col-md-12">
				  <table class="table" id="category_table">
				    <thead>
				      <tr class="row_color">
				        <th>Category Name</th>
				        <th class="action_align">Action</th>
				      </tr>
				    </thead>
				    <tbody>
						<?php
							$data = $obj->categoryselectfunction();
							$i=1;
							foreach( $data as $eachrecord ) {
						 ?>
				    	<tr class="delete_color">
					       <!-- <td><?php //echo $i; ?></td> -->
							<input class="category_id" value="<?php echo $eachrecord ['categories_id']; ?>" type="hidden">
					        <td class="category_name"><?php echo $eachrecord ['categories_name']; ?></td>
					        <td class="popup-edit">
					        	<?php 
							    	$query = mysql_query("select * from wc_testbattery_category_attribute where testbattery_category_id ='".$eachrecord ['categories_id']."'");
									$query1 = mysql_query("select * from wc_assignschedule where assigncategory_id = '".$eachrecord ['categories_id']."'");
									if(!mysql_num_rows($query) && !mysql_num_rows($query1)){
	    						?>
					        	<span class="edit_state"><i class="fa fa-pencil-square-o"></i></span>
					        	<span class="delete_state" data-value="<?php echo $eachrecord ['categories_id']; ?>"><i class="fa fa-trash-o"></i></span>
					        	<?php } else { ?>
					        		<span class="restrict">
    			<i class="fa fa-pencil-square-o">
	    			<div class="restrict_tooltip">Mapping has been done. Edit or Delete is not Possible.</div>
				</i>
			</span>
	    	<span class="restrict_del"><i class="fa fa-trash-o"><div class="restrict_tooltip">Mapping has been done. Edit or Delete is not Possible.</div></i></span>
					        	<?php }?>
					        	<div class="state_div edit_category_div popup_hidden">
					          		<code class="close_btn cancel_btn"> </code>
					          		<div class="edit_title">
					                	<span class="del_txt">Edit Category</span>
					              	</div><!--edit_title-->
					      			<div class="container state-content col-md-12">
										<form name="category_update" class="category_update_form">
											<div class="align_margin">
												<label>Enter name of the Category</label><br>
												<input type="text" class="sportsname category_update_name" name="category_name" autocomplete="off" data-validation-error-msg="Please enter name of Category" data-validation="required">
												<input type="hidden" class="category_update_id" name="category_id">
												<input type="hidden" name="category_update" value="1">
											</div><!--align_margin-->
											<!-- <button type="button" class="btn btn-primary align_right clear category_update_act">Submit</button> -->
											<input type="submit" class="btn btn-primary clear category_update_act center_align" value="Save">
											<input type="reset" value="Cancel" class="btn btn-primary clear center_align">
										</form>
									</div><!--state-content-->
								</div><!--state_div-->
								<div class="delete_div delete_catagory_div">
						          <!--  <code class="close_btn cancel_btn"> </code> -->
						              <div class="del_title">
						                <span class="del_txt">DELETE</span>
						              </div>
						              <div class="del_content">
						                <span class="del_content_txt">Are you sure you want to delete this record?</span>
						                <input type="button" class="btn btn-primary align_right no_btn" value="No">
						                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
						                <input type="hidden" name="delete_id" value="" id="delete_id"/>
						              </div><!--del_content-->
								</div><!--delete_div-->
							</td>
				      	</tr>
						<?php $i++; } ?>
				    </tbody>
				  </table>
				</div><!--table-position-->
		</div><!-- end  container-->
	</div>
	
<?php require_once "footer.php" ?>
