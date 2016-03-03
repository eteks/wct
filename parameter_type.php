<?php require_once "session.php";
	  require_once 'header.php';
	  require_once 'functions/parameter_typefunction.php';
	  $parametertypeFunction = new parametertypeFunction();
?>
<div class="container">
	<div class="container left_align_parameter align_height">
		<span class="sports">PARAMETER TYPE</span>
	</div><!--end container-->
	<div class="container">
		
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-5 align_margin">
				<form id="parameter_type_form" name="parameter_type_form">
					<div class="form-group">
						  <label for="sel1">Select Parameter Type</label>
						  <input type="text" class="form-control adjust_width classic" id="sel1" value='' name="parameter_type" data-validation-error-msg="Please Enter Parameter type" data-validation="required">
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary parameter-submit clear add_parameter_act" value="Submit">
					</div>
				</form>
			</div>
			<div class="container table-position">
			  <table class="table state_table parameter_type_table">
			    <thead>
			      <tr class="row_color">
			        <th>Parameter Type</th>
			        <th style="text-align:right">Action</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php
					   $query = $parametertypeFunction->parametertypeSelect();
					   $i=1;
					   while ($row = mysql_fetch_array($query)) {
					?>
		      	<tr class="delete_color">
					  <input type="hidden" name="states_id" value="<?php echo $row['parametertype_id']; ?>">
			      <!--  <td class="t_pararmeter_id"><?php // echo $i; ?></td> -->
			        <td class="t_pararmeter_name"><?php echo $row['parametertype_name']; ?></td>
			        <td class="popup-edit">
			        	<span class="edit_state" onclick="editfunction(<?php echo $row['parametertype_id'] ?>)"><i class="fa fa-pencil-square-o"></i></span>
		        		<span class="delete_state" data-value="<?php echo $row['parametertype_id'] ?>"><i class="fa fa-trash-o"></i></span>
			        
						<div class="state_div edit_parametertype_div popup_hidden">
			          		<code class="close_btn cancel_btn"> </code>
			          		<div class="edit_title">
			                	<span class="del_txt">EDIT</span>
			              	</div><!--edit_title-->
			          			<div class="container state-content col-md-12">
			          			<form id="edit_parameter_type" name="parameter_edit">
									<div class="form-group">
										  <label for="sel1">Enter Parameter Type</label>
										  <input type="hidden" name="edit_parameter_id" />
										  <input type="text" class="form-control adjust_width_parameter classic" id="sel1" name="edit_parameter_type" data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required">

									</div>
									<div class="col-md-12 schedule_btn">
											<input type="submit" class="btn btn-primary align_right clear" value="Submit">
									</div>
								</form>
								</div><!--tate-content-->
						</div><!--state_div-->
						<div class="delete_div delete_parametertype_div">
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
		</div><!-- end  container-->
	</div><!-- end  container-->

<!-- <div class="popup_fade cancel_btn"></div><!--popup_fade-->
		 <!-- <div class="container">
            <div class="state_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div> --><!--edit_title-->
          			<!--<div class="container state-content col-md-12">
          			<form id="edit_parameter_type" name="parameter_edit">
						<div class="form-group">
							  <label for="sel1">Enter Parameter Type</label>
							  <input type="hidden" name="edit_parameter_id" />
							  <input type="text" class="form-control adjust_width_parameter classic" id="sel1" name="edit_parameter_type" data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required">

						</div>
						<div class="col-md-12 schedule_btn">
								<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						</div>
					</form>
					</div> --><!--tate-content-->
			<!-- </div> --><!--state_div-->
		<!-- </div> --> <!--container-->
<?php require_once "footer.php" ?>
