<?php require_once "session.php";
	  require_once 'header.php';
	  require_once 'functions/states_function.php';
	  $statesFunction = new statesFunction();
?>
		<div class="container align_center left_align align_height">
			<span class="sports">STATE</span>
		</div><!--end container-->
		<div class="container align_margin align_bottom" style="width: 85%;">

				<!-- <div class="col-md-6"></div> -->
				<div class="col-md-4 align_margin">
					<form name="states_form" id="state_form">
						<div class="align_margin">
							<label>Enter name of the State</label><br>
							<input type="text" class="statesname" name="states_name" data-validation-error-msg="Please enter name of State" data-validation="required" autocomplete="off">
							<span class="add_states_error"></span>
						</div>
						<!-- <button type="button" class="btn btn-primary align_right clear add_states_act" name="states">Submit</button>																							 -->
						<input type="submit" class="btn btn-primary clear add_states_act" name="states" value="Save">
						<input type="reset" value="Cancel" class="btn btn-primary clear">
					</form>
				</div><!--align_margin-->
				<div class="container table-position col-md-12">
				  <table class="table state_table">
				    <thead>
				      <tr class="row_color">
				        <!-- <th class="align_center">SLNO</th> -->
				        <th>State Name</th>
				        <th class="action_align">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php
                        $query = $statesFunction->statesSelect();
                        $i=1;
                        while ($row = mysql_fetch_array($query)) {
                            ?>
                            <tr class="delete_color">
                            <input type="hidden" name="states_id" class="t_states_id" value="<?php echo $row['states_id']; ?>">
						        <!-- <td class="t_s_id"><?php //echo  $i;?></td> -->
						        <td class="t_states_name"><?php echo $row['states_name']; ?></td>
						        <td class="popup-edit">
						        <?php
						        $check_in_district = mysql_query("SELECT * FROM wc_district WHERE districtstates_id='".$row['states_id']."'")or die(mysql_error());
                            	$check_in_athlete = mysql_query("SELECT * FROM wc_athlete WHERE athletestates_id='".$row['states_id']."'")or die(mysql_error());
                            	if((mysql_num_rows($check_in_district)>0 || mysql_num_rows($check_in_athlete)>0)){ ?>
                            		<span class="restrict">
							        	<i class="fa fa-pencil-square-o">
							        	<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>	
							        	</i>
						        	</span>
						        	<span class="restrict_del">
							        	<i class="fa fa-trash-o">
							        	<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>	
							        	</i>
						        	</span>
					        	<?php }else{?>
						        	<span class="edit_state" onclick="editfunction(<?php echo $row['states_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
						        	<span class="delete_state" data-value="<?php echo $row['states_id'] ?>"><i class="fa fa-trash-o"></i></span>
					        	<?php } ?>
									<div class="state_div edit_state_div popup_hidden">
						          		<code class="close_btn cancel_btn"> </code>
						          		<div class="edit_title">
						                	<span class="del_txt">Edit State</span>
						              	</div><!--edit_title-->
						          			<div class="container state-content col-md-12">
							          			<form name="edit_states_form" class="edit_state_form">
													<div class="align_margin">
														<label>Enter name of the State</label><br>
														<input type="hidden" class="statesid" name="edit_states_id">
														<input type="text" class="edit_states_name" name="edit_states_name" data-validation-error-msg="Please Enter the State" data-validation="required" autocomplete="off">
														<span class="edit_states_error"></span>
													</div>
													<!-- <button type="button" class="btn btn-primary align_right clear edit_states_act" name="edit_states">Submit</button> -->
													<input type="submit" class="btn btn-primary center_align clear edit_states_act" value="Save">
													<input type="reset" value="Cancel" class="btn btn-primary clear center_align">
												</form>
											</div><!--state-content-->
									</div><!--state_div-->
									<div class="delete_div delete_state_div">
							            <!-- <code class="close_btn cancel_btn"> </code>  -->
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
								</div><!--container-->
						        </td>
					        </tr>
                     <?php $i++;  } ?>
				    </tbody>
				  </table>
				</div>
				<div class="states_list">
					<ul>
						<?php foreach ($STATES as $key => $value) { ?>
						    <li><?php echo $value; ?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="edit_states_list">
					<ul>
						<?php foreach ($STATES as $key => $value) { ?>
						    <li><?php echo $value; ?></li>
						<?php } ?>
					</ul>
				</div>

		</div><!-- end  container-->
		<!-- <div class="container align_center">
		  	<ul class="pagination">
		  		<li><a href="#" class="align_left_icon"><i class="fa fa-angle-double-left"></i></a></li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li><a href="#" class="align_right_icon"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</div> --><!-- end  container-->
	</div>
		<!-- <div class="popup_fade cancel_btn"></div> -->

<?php require_once "footer.php" ?>
