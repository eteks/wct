<?php require_once "session.php";
	  require_once 'header.php';
	  require_once 'functions/states_function.php';
	  $statesFunction = new statesFunction();
?>		
		<div class="container align_center align_height">
			<span class="sports">STATE</span>
		</div><!--end container-->		
		<div class="container align_margin">
			<div class="col-md-8">
				<div class="col-md-6"></div>
				<div class="col-md-6 align_margin">
					<form name="states_form" id="state_form">
						<div class="align_margin">					
							<label>Enter the State</label><br>
							<input type="text" class="statesname" name="states_name" data-validation-error-msg="Please Enter the State" data-validation="required">
							<span class="add_states_error"></span>
						</div>	
						<!-- <button type="button" class="btn btn-primary align_right clear add_states_act" name="states">Submit</button>																							 -->
						<input type="submit" class="btn btn-primary align_right clear add_states_act" name="states" value="Submit">
					</form>
				</div>
				<div class="container  table-position">           
				  <table class="table state_table">
				    <thead>
				      <tr class="row_color">
				        <th class="align_center">SLNO</th>
				        <th class="align_center">State Name</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				     <?php
                        $query = $statesFunction->statesSelect();
                        while ($row = mysql_fetch_array($query)) {
                            ?>
                            <tr class="align_center delete_color">
                            <input type="hidden" name="states_id" value="<?php echo $row['states_id']; ?>">
						        <td class="t_states_id"><?php echo $row['states_id']; ?></td>
						        <td class="t_states_name"><?php echo $row['states_name']; ?></td>
						        <td>
						        	<span class="edit_state" onclick="editfunction(<?php echo $row['states_id'] ?>)">Edit</span>	        	
						        	<span class="delete_state" data-value="<?php echo $row['states_id'] ?>">Delete</span>
						        </td> 				    
					        </tr>                         
                     <?php } ?>		   
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
		<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="state_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">		
	          			<form name="edit_states_form" id="edit_state_form">
							<div class="align_margin">					
								<label>Enter the State</label><br>
								<input type="hidden" class="statesid" name="edit_states_id">
								<input type="text" class="edit_states_name" name="edit_states_name" data-validation-error-msg="Please Enter the State" data-validation="required">
								<span class="edit_states_error"></span>
							</div>		
							<!-- <button type="button" class="btn btn-primary align_right clear edit_states_act" name="edit_states">Submit</button> -->
							<input type="submit" class="btn btn-primary align_right clear edit_states_act" value="Submit">

						</form>
					</div><!--tate-content-->
			</div><!--state_div-->
				<div class="edit_states_list">
					<ul>
						<?php foreach ($STATES as $key => $value) { ?>
						    <li><?php echo $value; ?></li>
						<?php } ?>
					</ul>
				</div>
		</div><!--container-->
<?php require_once "footer.php" ?>