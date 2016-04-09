<?php
require_once "session.php";
require_once "functions/category_function.php";
require_once "functions/create_schedule_function.php";
require_once "functions/assign_schedule_function.php";
require_once "header.php";
require_once "functions/athletes_functions.php";


$category = new categoryfunction();
$createschedule = new createscheduleFunction();
$assignschedule = new assignschedulefunction();
$athlete = new athletesFunction();
?>
<?php
$url = $_SERVER['PHP_SELF'];
if(isset($_GET['update_success'])){
	echo "<script>
	$(document).ready(function () {
		success_align();
		$('.success_msg span').html('Schedule edited successfully!');
       	$('.success_msg').show();
      	$('.popup_fade').show();
      	document.body.style.overflow = 'hidden';
    	});
	//alert('Schedule edited successfully!');
	var url ='".$url."'; window.location = url ;</script>";
}
?>
<style>
	#ui-id-1{
    	width: 204px !important;
	}
	thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
	}
	.table > tbody tr:last-child{
		border: 0 none !important;
	}
	.table > thead{
		border-bottom: 0 none !important;
	}
	tbody tr {
    border-left: 0 none !important;
    border-right: 0 none !important;
	}
	.paging-nav {
    display: none;
	}
	.table > tbody td{
		height: 12px;
	}
</style>
<div class="container">
	<div class="container left_align_parameter align_height">
		<span class="sports">ASSIGN SCHEDULE</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-12">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-12 align_margin">
				<form method="post" id="assignschedule_form">
					<div class="form-group">
						  <label for="sel1">Select Schedule</label>
						  <select class="form-control adjust_width classic assignsche_create" id="sel1" name="Schedule" data-validation-error-msg="Please select Schedule" data-validation="required">
							 <option value="">Select Schedule</option>
							 <?php
		   						 $data = $createschedule->createscheduleselectfunction();
		   						 foreach( $data as $eachrecord ) {
		   						  ?>
		   						  <option value="<?php echo $eachrecord ['createschedule_id']; ?>"><?php echo $eachrecord ['createschedule_name']; ?></option>
		   					   <?php } ?>
						  </select>
						  <div class="clear_both"></div>
					</div>
					<div class="form-group">
						  <label for="sel1">Select Category</label>
							<select class="form-control adjust_width classic assignsche_cate" id="sel1" name="category" data-validation-error-msg="Please select Category" data-validation="required">
							<option value="">Select Category</option>
						  </select>
					</div>
					<label for="athlete">Add Athletes</label><br>
					<div class="assign_content_holder col-md-12">
						<div class="assign_clone_content col-md-12">
							<input type="hidden" class="assign_athelete_count_add" value="1" />
							<div class="form-group col-md-6 padding_zero">
								<div class="col-md-6 form-group combo--align" style="position: relative; top: 10px;">
									<select class="form-control name_align  athlete_name athlete_name1" placeholder="Name" name="athlete_name1" id="combobox" data-validation-error-msg="Please Enter Athlete Name" data-validation="required">
										<option value="">Athletes</option>
										<?php
											$data = $athlete->athleteSelect1();
											foreach( $data as $eachrecord ) {
									 	?>
											<option value="<?php echo $eachrecord ['athlete_id']; ?>"><?php echo $eachrecord ['athlete_name']; ?></option>
										<?php } ?>
									</select>
									<span class="hided">Please Select Athlete</span><br>
								</div>
						      	<!-- <input type="text" class="form-control name_align fl athlete_name" id="name" placeholder="Name" name="athlete_name1" required> -->
						      	<div class="form-group col-md-5">
						      		<input type="text" class="form-control date_assign dob" id="dob" placeholder="Date" name="athlete_date1" disabled>
						   		</div>
						    </div>
						    <div class="form-group col-md-6 padding_zero">
						    	<div class="form-group col-md-6">
						      		<input type="text" class="form-control name_align athlete_mobile mobile" id="mobile" placeholder="Mobile no" name="athlete_mobile1" disabled>
						      	</div>
						      	<div class="form-group col-md-5">
						      		<input type="text" class="form-control date_assign athlete_bib" id="bib" placeholder="BIB NO" name="athlete_bib1" >
						      		 <span class="hided">Please Enter Bib No</span><br>
								</div>
						    </div>
						</div>
					</div>
					<div class="form-group assign-add-button col-md-2">
						<!-- <input type="submit" class="btn btn-primary align_right adds_btn add_athelete" value="Add"> -->
						<!-- <i class="fa fa-plus add_align"></i> -->
						<button class="plus_align add_athelete"><i class="fa fa-plus">
							<div class="tooltip_parameter">Add</div>
							<div class="tip_triangle"></div>
						</i></button>
						<button class="plus_align assign_remove"><i class="fa fa-minus">
							<div class="tooltip_remove">Remove</div>
							<div class="tip_triangle"></div>
						</i></button>
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary test-submit clear assignschedule_submit" value="Save">
						<input type="reset" class="btn btn-primary clear reset_form_assign_schedule" value="Cancel">
					</div>
				</form>
			</div>
			<div class="col-md-12">
			<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Schedule Name</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box assign_schedule_search" placeholder="Search Name">
								<i class="fa fa-search font-search"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
									$data = $assignschedule->assignschedulenamefunction();
									foreach( $data as $eachrecord ) {
									 ?>
									<span class="test-name assign-test_name">
										<input type="checkbox" name="test" value="test" class="check_test check_list assign_schedule_name_hover" id="check-select" data-id ="<?php echo $eachrecord ['createschedule_id'];?>" >
										<input type="text" name="test" value="<?php echo $eachrecord ['createschedule_name']; ?>" class="list_edit input_wrap assing_name_hover">
										<span class="test-alter ">
											<i class="fa fa-floppy-o save_item save_assign_schdule_name"></i>
											<i class="fa fa-pencil-square-o edit_item"></i>
											<i class="fa fa-trash-o delete_item"></i>
										</span><!--test-alter-->
									</span><!--test-name-->
									<div class="delete_div delete_search">
							            <!-- <code class="close_btn cancel_btn"> </code>  -->
							              <div class="del_title">
							                <span class="del_txt">DELETE</span>
							              </div>
							              <div class="del_content">
							                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete="assign_schedule_name" data-id ="<?php echo $eachrecord ['createschedule_id']; ?>">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
      								<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
				</div>
			<div class="container table-position col-md-9 align_bottom" style="padding: 0px;">
			  <table class="table state_table" id="assign_schedule_table">
			    <thead>
			      <tr class="row_color">
			        <!-- <th>Schedule Name</th> -->
			        <th>Category Name</th>
			        <!--th class="align_center">Athletes Name</th>
			        <th class="align_center">BIB NO</th> -->
			        <th class="action_align">Action</th>
			      </tr>
			    </thead>
			    <tbody style="display:block;height:260px;overflow:auto;">
					<?php
					$data = $assignschedule->assignscheduleSelect();
					$i=1;
					foreach( $data as $eachrecord ) {
					 ?>
			      <tr class="delete_color assignschedule_popup_open assignschedule_category_table" data-id = "<?php echo $eachrecord ['createschedule_id']; ?>">
			      	<input value="<?php echo $eachrecord ['assignschedule_id']; ?>" type="hidden">
					<td><?php echo $eachrecord ['categories_name']; ?></td>
			        <td class="popup-edit">
			        	<?php
			        	$chek = mysql_query("select * from wc_assignschedule inner join wc_result on wc_result.resultcreateschedule_id = assigncreateschedule_id where wc_assignschedule.assigncreateschedule_id = '".$eachrecord['createschedule_id']."'");
						if(!mysql_num_rows($chek)){
			        	?>
			        	<span class="edit_state edit_assign_schedule" data-schedule="<?php echo $eachrecord ['createschedule_id']; ?>" data-category="<?php echo $eachrecord ['assigncategory_id']; ?>"><i class="fa fa-pencil-square-o"></i></span>
		        		<span class="delete_state" data-value="<?php echo $eachrecord ['assignschedule_id']; ?>"><i class="fa fa-trash-o"></i></span>
		        		<?php }else{?>
				    		<span class="restrict">
				    			<i class="fa fa-pencil-square-o">
					    			<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>
								</i>
							</span>
					    	<span class="restrict_del"><i class="fa fa-trash-o"><div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div></i></span>
					    	<?php } ?>
						<div class="assign-schedule-popup popup_hidden">
			          		<code class="close_btn cancel_btn"> </code>
			          		<div class="edit_title">
			                	<span class="del_txt">Edit Schedule Details</span>
			              	</div><!--edit_title-->
			          			<div class="container state-content col-md-12 assign-scroll nm">
				          			<div class="col-xs-12 col-md-12 align_margin">
							<form id="edit_assign_schedule_form" action="functions/assign_schedule_function.php" method="post">
								<div class="form-group">
									  <input type="hidden" class="schedule_update_id" value="" />
									  <input type="hidden" class="create_schedule_update_id" name="create_schedule_update_id" value="" />
								</div>
								<div class="form-group">
									  <label for="sel1" class="popup_label">Category Name</label>
									  <input type="hidden" class="category_update1" name="category" value="" />
									  <select class="form-control adjust_width classic category_update box-width" id="sel1" data-validation-error-msg="Please Select Category of the Schedule" data-validation="required" disabled="">
										<option value="">Select Category Name</option>
										<?php
			   							 $data = $category->categoryselectfunction();
			   							 foreach( $data as $eachrecord1 ) {
			   						   ?>
			   							 <option value="<?php echo $eachrecord1 ['categories_id']; ?>"><?php echo $eachrecord1 ['categories_name']; ?></option>
			   						   <?php } ?>
									  </select>
									  <div class="clear_both"></div>
								</div>
								<label for="athlete" class="email_txt popup_label">Add Athletes</label><br>
								<div class=" clone_schedule_update_content assign_clone_content_edit_holder col-md-12">
									<div class="assign_clone_content_edit clone_schedule_update">
										
											<input type="hidden" class="assign_athelete_count_edit" value="1" />
											<div class="form-group col-md-6"  style="padding: 0px;">
												<div class="col-md-7 combo--align--popup align_atheletes_schedules">
															<select class="form-control name_align_popup fl  athlete_name athlete_name_update athlete_name1" id="athlete_sel" placeholder="Name" name="athlete_name[]" ><!--id="combobox1"-->
														<option value="">Athletes</option>
														<?php
															$data = $athlete->athleteSelect1();
															foreach( $data as $eachrecord2 ) {
														?>
															<option value="<?php echo $eachrecord2 ['athlete_id']; ?>"><?php echo $eachrecord2 ['athlete_name']; ?></option>
														<?php } ?>
													</select>
													<span class="hided">Please Select Athlete</span><br>
												</div>
												<div class="col-md-5" style="position: relative; top: 20px;">
										      		
										      		<input type="text" class="form-control bib_popup fl dob_update dob"  placeholder="Date" value="" disabled>
										    	</div>
										    </div>
										    <div class="form-group col-md-6">
										    	<div class="col-md-4">
										      		<input type="text" class="form-control schedule-name fl mobile_update mobile" placeholder="Mobile no" value="" disabled>
										      	</div>
										      	<div class="col-md-8">
										      		<input type="text" class="form-control bib_popup athlete_bib popup_bib fl bib_update"  placeholder="BIB NO" name="athlete_bib[]" autocomplete="off" id="bibo">
										      		<span class="hided">Please Enter BIBO number</span><br>
												</div>
												
												
										    </div>
										    <div class="assign-delete col-md-12">
												<span class="edit_assign_schedule_delete"><i class="fa fa-trash-o"></i>Delete</span>
											</div>
										</div>
									
								</div>
								<div class="form-group assign-add-button popup-add-assign col-md-4">
									<div class="add-assign">
										<span class="edit_assign_schedule_add_btn">Add<i class="fa fa-plus plus_align_assign"></i></span>
									</div><!--add-assign-->
								</div>
								<input type="hidden" name="assing_schedule_update" value="1" />

								<div class="col-md-9 align_right schedule_btn">
						
			  					<input type="submit" value="Save" class="btn btn-primary test-submit schedule_submit clear">
			  					<input type="reset" class="btn btn-primary clear reset_form_edit_schedule" value="Cancel">
								</div>
							</form>
						</div>
								</div><!--state-content-->
						</div><!--range_div-->
						<div class="delete_div delete_catagory_div delete-assign">
				         
				              <div class="del_title">
				                <span class="del_txt">DELETE</span>
				              </div>
				              <div class="del_content">
				                <span class="del_content_txt">Are you sure you want to delete this record?</span>
				                <input type="button" class="btn btn-primary align_right no_btn" value="No">
				                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes" data-delete = 'assign_schedule_attribute' data-schedule="<?php echo $eachrecord ['createschedule_id']; ?>" data-category="<?php echo $eachrecord ['assigncategory_id']; ?>">
				                <input type="hidden" name="delete_id" value="" id="delete_id"/>
				              </div><!--del_content-->
						</div><!--delete_div-->
				   </td>
			      </tr>
				   <?php $i++;} ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->
</div><!--col-md-12-->
<!--<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<!--<div class="container">

		</div><!--container-->
		<script type="text/javascript">
		$(document).ready(function() {
			$("#combobox").combobox({
        		select: function (event, ui) {
            		var ath_id = $(this).val();
					$.ajax({
			           type: "POST",
			           url: "functions/athletes_functions.php?get_ath=true",
			           data: {'ath_id':ath_id},
			           cache: false,
					   dataType:'json',
			           success: function(html) {
						   var res = html.athlete_dob.split('-');
						   var new_date = res[2]+'/'+res[1]+'/'+res[0];
							$('.assign_content_holder .assign_clone_content:first').find('.dob').val(new_date).attr('disabled', 'disabled');
							$('.assign_content_holder .assign_clone_content:first').find('.mobile').val(html.athlete_mobile).attr('disabled', 'disabled');
							 $('.assign_clone_content:last').children().find('#combobox').next().next().removeClass('custom_error');
			           }
			       });
        		}
    		});
			$("#combobox1").combobox({
        		select: function (event, ui) {
            		var ath_id = $(this).val();
					$.ajax({
			           type: "POST",
			           url: "functions/athletes_functions.php?get_ath=true",
			           data: {'ath_id':ath_id},
			           cache: false,
					   dataType:'json',
			           success: function(html) {
						   var res = html.athlete_dob.split('-');
						   var new_date = res[2]+'/'+res[1]+'/'+res[0];
							$('.clone_schedule_update_content .clone_schedule_update:first').find('.dob').val(new_date);
							$('.clone_schedule_update_content .clone_schedule_update:first').find('.mobile').val(html.athlete_mobile);
			           }
			       });
        		}
    		});
    		
    		$("body").mouseup(function(e){
        		var subject = $(".assign-schedule-popup"); 
				var delete_pop = $(".delete_div");
        		if(e.target.id != subject.attr('class') && !subject.has(e.target).length)
		        {
		            subject.hide();
		        }
		        if(e.target.id != delete_pop.attr('class') && !delete_pop.has(e.target).length)
		        {
		            
		            delete_pop.hide();
		        }
    		});
		});

		</script>
<?php require_once "footer.php" ?>
