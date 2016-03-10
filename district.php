<?php require_once "session.php";
	  require_once "header.php";
	  require_once 'functions/states_function.php';
	  require_once 'functions/district_function.php';
	  $statesFunction = new statesFunction();
	  $districtFunction = new districtFunction();
?>
<style type="text/css">
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
	/*#ui-id-1{
		width: 152px !important;
	}*/
</style>

		<div class="container align_center left_align align_height">
			<span class="sports">DISTRICT</span>
		</div><!--end container-->
		<div class="container">

				<!-- <div class="col-md-4"></div> -->
				<div class="col-md-7 col-xs-12 align_left_district">
					<form name="district_form" class="districts_form">
						<div class="form-group col-md-8 padding_zero">
						  <label for="sel1">Select the State</label>
						  <select class="form-control adjust_width classic choose_state" id="sel1" name="district_state" data-validation-error-msg="Please Select the name of the State" data-validation="required" autofocus>
						  <option value="">Select the state</option>
						  <?php
	                        $query = $statesFunction->statesSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['states_id']; ?>"><?php echo $row['states_name']; ?></option>
	                      <?php } ?>
						  </select>
						  <!-- <label class="category_text">Please Select the State</label><br> -->
						</div>
						<div class="col-md-4">

						</div>
						<div class="align_margin district_clone">
							<div class="district_clone_content form-group col-md-8 padding_zero">
								<label>District</label><br>
								<input type="text" class="districts district_select" name="district_name[]" data-validation-error-msg="Please Enter the name of the District" data-validation="required" autocomplete="off">
								<input type="hidden" class="district_add_for_clone" value="1"/>
								<span class="add_district_error"></span>
								<label class="category_text">Please Enter the District</label>
							</div>
						</div>
						<div class="form-group district-add col-md-4 padding_zero">
							<i class="fa fa-plus district_add">
								<div class="tooltip_parameter">Add District</div>
								<div class="tip_triangle"></div>
							</i>
							<i class="fa fa-minus district_remove">
								<div class="tooltip_remove">Remove District</div>
								<div class="tip_triangle"></div>
							</i>
						</div>
						<div class="form-group col-md-12 padding_zero">
							<input type="submit" class="btn btn-primary clear add_district_act" name="district" value="Submit">
						</div>
						<!-- <button type="button" class="btn btn-primary align_right clear add_district_act" name="district">Submit</button> -->
					</form>
				</div>
				<div class="col-md-12 align_bottom">
					<div class="col-md-3 search_part" style="padding: 0px;">
						<div class="test_title">
							<span>State</span>
						</div><!--test_title-->
						<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box search_text dt_search ui-district" placeholder="Search Name">
								<i class="fa fa-search font-search search_button"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
				                        $query = $districtFunction->districtsearchSelect();
				                        while ($row = mysql_fetch_array($query)) {
			                        ?>
									<span class="test-name dt_namelist">
										<input type="checkbox" name="test" value="test" class="check_test check_state check_list" id="check-select">
										<input type="hidden" class="check_stateid check_data" name="check_stateid" value="<?php echo $row['states_id']; ?>">
										<input type="text" name="check_statename" value="<?php echo $row['states_name']; ?>" class="list_edit check_statename input_wrap" autocomplete="off">
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item save_state"></i>
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
							                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
      							<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
					</div><!--search_part-->
					<div class="container col-md-9 align_bottom" style="padding: 0px;">
					  <table class="table district_table check_table" style="left: 0;">
					    <thead>
					      <tr class="row_color">
					        <!-- <th>State</th> -->
							<th>District</th>
					        <th style="text-align:right">Action</th>
					      </tr>
					    </thead>
					    <tbody style="display:block;height:260px;overflow:auto;">
					      <?php
	                        $query = $districtFunction->districtSelect();
	                        $i=1;
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <tr class="delete_color">
	                            <input type="hidden" class ="districtstates_id" name="districtstates_id" value="<?php echo $row['districtstates_id']; ?>">
	                            <input type="hidden" name="district_id" value="<?php echo $row['district_id']; ?>">
							       <!-- <td class="t_district_id"><?php // echo $i; ?></td> -->
							        <!-- <td class="t_states_name"><?php //echo $row['states_name']; ?></td> -->
							        <td class="t_district_name"><?php echo $row['district_name']; ?></td>
							        <td class="popup-edit popup-edit_district">
							        	<span class="edit_state" onclick="editfunction(<?php echo $row['district_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
							        	<span class="delete_state" data-value="<?php echo $row['district_id'] ?>"><i class="fa fa-trash-o"></i></span>
									<div class="district_div edit_district_div popup_hidden">
						          		<code class="close_btn cancel_btn"> </code>
						          		<div class="edit_title">
						                	<span class="del_txt">Edit detail</span>
						              	</div><!--edit_title-->
						          			<div class="container state-content col-md-12">
							          			<form name="edit_district_form" class="edit_district_form">
								          			<input type="hidden" class="statesid" name="edit_district_id">
													 <div class="form-group">
													  <label for="sel1">Select the State</label>
													  <select class="form-control adjust_width adjust_popup_width classic edit_choose_state" id="sel1" name="edit_district_state" data-validation-error-msg="Please Select the name of the State" data-validation="required">
													  	<option value="">Select the state</option>
														  	<?php
									                        $state_query = $statesFunction->statesSelect();
									                        while ($row = mysql_fetch_array($state_query)) {
									                            ?>
									                            <option value="<?php echo $row['states_id']; ?>"><?php echo $row['states_name']; ?></option>
									                      <?php } ?>
														  </select>
														</div>
														<div class="form-group">
															<label>District</label><br>
															<input type="text" class="districts adjust_popup_width" name="edit_district_name" data-validation-error-msg="Please Enter the name of the District" data-validation="required">
															<span class="edit_district_error"></span>
														</div>
														<!-- <button type="button" class="btn btn-primary align_right clear edit_district_act" name="district">Submit</button>	 -->
														<div class="col-md-12 form-group">
															<input type="submit" class="btn btn-primary align_right clear edit_district_act" name="district" value="Submit">
														</div>
												</form>
											</div><!--state-content-->
									</div><!--state_div-->
									<div class="delete_div delete_district_div">
							           <!-- <code class="close_btn cancel_btn"> </code> -->
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
				<div class="district_list">
					<ul></ul>
				</div>
				<div class="states_list">
					<ul>
						<?php foreach ($STATES as $key => $value) { ?>
						    <li><?php echo $value; ?></li>
						<?php } ?>
					</ul>
				</div>
			</div>
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
		<!-- <div class="district_list">
			<ul>
			</ul>
		</div>
		<div class="popup_fade cancel_btn"></div> --> <!--popup_fade-->
		<!--<div class="container">

		</div> --><!--container-->
<?php require_once "footer.php" ?>
