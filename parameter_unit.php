<?php require_once "session.php";
	  require_once 'header.php';
	  require_once 'functions/parameter_unitfunction.php';
	  $parameterunitFunction = new parameterunitFunction();
?>
<div class="container">
	<div class="container left_align_parameter align_height">
		<span class="sports">PARAMETER UNIT</span>
	</div><!--end container-->
	<div class="container">
		<div class="col-xs-12 col-md-8">
			<!-- <div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-6 align_margin">
				<form id="parameter_unit" name="parameter_unit_add">
					<div class="form-group">
						  <label for="sel1">Select Parameter Type</label>
						  <select class="form-control adjust_width classic" id="sel1" name="parametertype"  data-validation-error-msg="Please Select the Type of the Parameter" data-validation="required">
							
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
						<input type="text" class="adjust_width" name="parameterunit"  data-validation-error-msg="Please Enter the Unit of the Parameter" data-validation="required">
					</div>		
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary clear parameter-submit" value="Submit">
					</div>
				</form>
			</div>
			<div class="container table-position">
			  <table class="table state_table">
			    <thead>
			      <tr class="row_color">
			        <th>Parameter Type</th>
					<th>Parameter Unit</th>
			        <th style="text-align:right">Action</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php
				  $data = $parameterunitFunction->parameterunitSelect();
				  $i=1;
				  foreach( $data as $eachrecord ) {
				   ?>
			      <tr class="delete_color">
			        <!-- <td><?php // echo $i;?></td> -->
			        <input value="<?php echo $eachrecord ['parameterunit_id']; ?>" type="hidden">
			        <td><?php echo $eachrecord ['parametertype_name'];?></td>
					<td><?php echo $eachrecord ['parameterunit'];?></td>
			        <td>
			        	<span class="edit_state edit_parameter_unit" data-value="<?php echo $eachrecord ['parameterunit_id'];?>"><i class="fa fa-pencil-square-o"></i></span>
		        		<span class="delete_state" data-value="<?php echo $eachrecord ['parameterunit_id'];?>"><i class="fa fa-trash-o"></i></span>
			       
						<div class="paramter_div edit_parameterunit_div popup_hidden">
			          		<code class="close_btn cancel_btn"> </code>
			          		<div class="edit_title">
			                	<span class="del_txt">EDIT</span>
			              	</div><!--edit_title-->
			          			<div class="container state-content col-md-12">
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
									<input type="text" class="adjust_width adjust_popup_width edit_param_unit" name="parameter_unit" data-validation-error-msg="Please Enter the Unit of the Parameter" data-validation="required">
								</div>

								<div class="col-md-12 schedule_btn">
									<input type="submit" class="btn btn-primary align_right clear" value="Submit">
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
		</div>
	</div><!-- end  container-->
</div><!-- end  container-->

<!-- <div class="popup_fade cancel_btn"></div> --><!--popup_fade-->
		<!--<div class="container">
            
		</div> --><!--container-->
<?php require_once "footer.php" ?>
