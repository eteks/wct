<?php require_once "header.php";
	  require_once 'functions/states_function.php';
	  require_once 'functions/district_function.php';
	  $statesFunction = new statesFunction();	
	  $districtFunction = new districtFunction();
	  if(isset($_POST['district'])){
	  	$stateid = $_POST['district_state'];
		$districtname = $_POST['district_name'];
		// if (in_array($statesname, $STATES)) {
			$district = $districtFunction->isDistrictExist($districtname);
			if(!$district){
				$districtinsert = $districtFunction->districtInsert($stateid,$districtname);
				if($districtinsert){echo "<script>alert('District Inserted')</script>";}else{
					echo "<script>alert('District Not Inserted')</script>";}
			}
			else {echo "<script>alert('District Already Exist')</script>";}
		// }
		// else{echo "<script>alert('No State Present in that Name')</script>";}
	  }
?>		
		<div class="container align_center align-height">
			<span class="sports">DISTRICT</span>
		</div><!--end container-->
		<div class="container">
			<div class="col-md-8">
				<div class="col-md-4"></div>
				<div class="col-md-8 col-xs-12 align_left">
					<form method="post" action="district.php" name="district_form">
						<div class="form-group">
						  <label for="sel1">Select the State</label>
						  <select class="form-control adjust_width classic choose_state" id="sel1" name="district_state">
						  <option value="0"></option>
						  <?php
	                        $query = $statesFunction->statesSelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['states_id']; ?>"><?php echo $row['states_name']; ?></option>	                                            
	                      <?php } ?>							   
						  </select>
						</div>
						<div class="align_margin">					
							<label>District/Taluka</label><br>
							<input type="text" class="districts" name="district_name">
						</div>

						<input type="submit" class="btn btn-primary align_right clear" name="district">		
					</form>
				</div>
				<div class="container">           
				  <table class="table state_table">
				    <thead>
				      <tr class="row_color">
				        <th class="align_center">SLNO</th>
				        <th class="align_center">District/Taluka</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>  
				      <?php
                        $query = $districtFunction->districtSelect();
                        while ($row = mysql_fetch_array($query)) {
                            ?>
                            <tr class="align_center delete_color">
						        <td><?php echo $row['district_id']; ?></td>
						        <td><?php echo $row['states_name']; ?></td>
						        <td><?php echo $row['district_name']; ?></td>
						        <td>
						        	<span class="edit_state">Edit</span>
						        	<span class="delete_state">Delete</span>
						        </td> 				    
					        </tr>                         
                     <?php } ?>	 
				    </tbody>
				  </table>
				</div>
			</div>
		</div><!-- end  container-->					
		<div class="container align_center">		          
		  	<ul class="pagination">
		  		<li><a href="#" class="align_left_icon"><i class="fa fa-angle-double-left"></i></a></li>    	
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li><a href="#" class="align_right_icon"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>		   
		</div><!-- end  container-->
		<div class="district_list">
			<ul>
			</ul>
		</div>
		<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="district_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">		
	          			<form>
						<div class="form-group">
						  <label for="sel1">Select the State</label>
						  <select class="form-control adjust_width classic choose_state" id="sel1" name="district_state">
						  	<option value="0"></option>
						  </select>
						</div>
						<div class="align_margin">					
							<label>District/Taluka</label><br>
							<input type="text" class="districts" name="district_name">
						</div>
						<input type="submit" class="btn btn-primary align_right clear" name="district">		
					</form>
					</div><!--tate-content-->
			</div><!--state_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>