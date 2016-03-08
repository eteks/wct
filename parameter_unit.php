<?php require_once "session.php";
	  require_once 'header.php';
	  require_once 'functions/parameter_unitfunction.php';
	  $parameterunitFunction = new parameterunitFunction();
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
	.table > tbody td{
		height: 12px;
	}
</style>
	<div class="container">
		<div class="container left_align_parameter align_height">
			<span class="sports">PARAMETER UNIT</span>
		</div><!--end container-->
		<div class="container">
			<!-- <div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-5 align_margin">
				<form id="parameter_unit" name="parameter_unit_add">
					<div class="form-group">
						  <label for="sel1">Select Parameter Type</label>
						  <select class="form-control adjust_width classic" id="sel1" name="parametertype"  data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required" autofocus="">

							<option value="">Select Parameter Type</option>
							  <?php
			  				$data = $parameterunitFunction->parametertypeSelect();
			  				foreach( $data as $eachrecord ) {
			  				 ?>
							 <option value="<?php echo $eachrecord ['parametertype_id']; ?>"><?php echo $eachrecord ['parametertype_name']; ?></option>
							 <?php } ?>
						  </select>
					</div>
					<div class="form-group">
						<label>Enter Parameter Unit</label><br>
						<input type="text" class="adjust_width" name="parameterunit"  data-validation-error-msg="Please Enter the Unit of the Parameter" data-validation="required" autocomplete="off">
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary clear parameter-submit" value="Submit">
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Parameter Type</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box parametertype_search" placeholder="Search Name">
								<i class="fa fa-search font-search"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
									$data = $parameterunitFunction->parametertypefunction();
									foreach( $data as $eachrecord ) {
									 ?>
									<span class="test-name">
										<input type="checkbox" name="test" value="test" class="check_test" id="check-select">
										<input type="text" name="test" data-id ="<?php echo $eachrecord ['parametertype_id']; ?>" value="<?php echo $eachrecord ['parametertype_name']; ?>" class="list_edit parametertype_name_hover input_wrap" disabled>
										<span class="test-alter">
											<i class="fa fa-floppy-o save_item paramsedit_save_button"></i>
											<i class="fa fa-pencil-square-o edit_item "></i>
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
							                <input type="button" class="btn btn-primary align_right yes_btn" data-id ="<?php echo $eachrecord ['parametertype_id']; ?>" value="Yes" data-delete='parametertype_name'>
							                <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
      								<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
				</div>

				<div class="container table-position col-md-9 align_bottom" style="padding: 0px;">
				  <table class="table state_table">
				    <thead>
				      <tr class="row_color">
				        <!-- <th>Parameter Type</th> -->
						<th>Parameter Unit</th>
				        <th style="text-align:right">Action</th>
				      </tr>
				    </thead>
				    <tbody style="display:block;height:260px;overflow:auto;">
						<?php
					  $data = $parameterunitFunction->parameterunitSelect();
					  $i=1;
					  foreach( $data as $eachrecord ) {
					   ?>
			      	<tr class="delete_color">
				        <!-- <td><?php // echo $i;?></td> -->
				        <input value="<?php echo $eachrecord ['parameterunit_id']; ?>" type="hidden">
				        <!-- <td><?php //echo $eachrecord ['parametertype_name'];?></td> -->
						<td><?php echo $eachrecord ['parameterunit'];?></td>
				        <td class="popup-edit">
				        	<span class="edit_state edit_parameter_unit" data-value="<?php echo $eachrecord ['parameterunit_id'];?>"><i class="fa fa-pencil-square-o"></i></span>
			        		<span class="delete_state" data-value="<?php echo $eachrecord ['parameterunit_id'];?>"><i class="fa fa-trash-o"></i></span>

							<div class="paramter_div edit_parameterunit_div popup_hidden">
				          		<code class="close_btn cancel_btn"> </code>
				          		<div class="edit_title">
				                	<span class="del_txt">Edit detail</span>
				              	</div><!--edit_title-->
			          			<div class="container state-content col-md-12" style="padding: 0px;">
				          			<div class="col-xs-12 col-md-12 align_margin">
										<form id="edit_parameter_unit" name="edit_parameter_unit_form">
											<div class="form-group">
												  <label for="sel1">Select Parameter Type</label>
												  <input type="hidden" class="edit_param_unit_id" name="edit_param_unit_id"  value=""/>
												  <select class="form-control adjust_width adjust_popup_width classic edit_param_type" id="sel1" name="parameter_type" data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required">
													<option value="">Select Parameter Type</option>  <?php
													$data = $parameterunitFunction->parametertypeSelect();
													foreach( $data as $eachrecord ) {
													 ?>
													 <option value="<?php echo $eachrecord ['parametertype_id']; ?>"><?php echo $eachrecord ['parametertype_name']; ?></option>
													 <?php } ?>
												  </select>
											</div>
											<div class="form-group">
												<label>Enter Parameter Unit</label><br>
												<input type="text" class="adjust_width adjust_popup_width edit_param_unit" name="parameter_unit" data-validation-error-msg="Please Enter the Unit of the Parameter" data-validation="required" autocomplete="off">
											</div>
											<div class="col-md-12 schedule_btn">
												<input type="submit" class="btn btn-primary align_right clear edit_parameter_unit_act" value="Submit">
											</div>
										</form>
									</div>
								</div>
							</div><!--paramter_div-->
							<div class="delete_div delete_parameterunit_div ">
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
						</td>
				      </tr>
					  <?php $i++; } ?>
				    </tbody>
				  </table>
				</div>
			</div><!--col-md-12-->

	</div><!-- end  container-->
</div><!-- end  container-->

<!-- <div class="popup_fade cancel_btn"></div> --><!--popup_fade-->
		<!--<div class="container">

		</div> --><!--container-->
<?php require_once "footer.php" ?>
