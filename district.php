<?php require_once "header.php";
	  require_once 'functions/states_function.php';
	  $statesFunction = new statesFunction();	
	  
	//   if(isset($_GET['loaddistrict'])){
	//   		echo "<script>alert('start')</script>";
	//   	foreach ($STATES AS $key => $value) {
	//   		echo "<script>alert('key'+$key)</script>";
	//   		echo "<script>alert('value'+$value)</script>";
	//   		// echo "<script>alert('getvalue'+$_GET['loaddistrict'])</script>";
	//   		if (strcmp($key, $_GET['loaddistrict']) == 0) {
	//   			return $value;
	//   	}
	//   }
	// }
?>		
		<div class="container align_center">
			<span class="sports">DISTRICT</span>
		</div><!--end container-->
		<div class="align_margin"></div>
		<div class="container">
			<div class="col-md-8">
				<div class="col-md-4"></div>
				<div class="col-md-8 align_left">
					<form>
						<div class="form-group">
						  <label for="sel1">Select the State</label>
						  <select class="form-control adjust_width choose_state" id="sel1">
						  <option value="0">Select State</option>
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
							<input type="text" class="districts">
						</div>

						<button type="button" class="btn btn-primary align_right submit">Submit</button>			
					</form>
				</div>
				<div class="container">           
				  <table class="table table_adjust">
				    <thead>
				      <tr>
				        <th class="align_center">SLNO</th>
				        <th class="align_center">District/Taluka</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr class="align_center">
				        <td>01</td>
				        <td>Virudhunagar</td>
				        <td>Edit <span class="align_left1">Delete</span></td>
				      </tr>
				      <tr class="align_center">
				        <td>02</td>
				        <td>Vilupuram</td>
				       <td>Edit <span class="align_left1">Delete</span></td>
				      </tr>				   
				    </tbody>
				  </table>
				</div>
			</div>
		</div><!-- end  container-->
		<div class="align_margin"></div>				
		<div class="container align_center">              
		  <ul class="pagination">
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		  </ul>
		</div>	
		<div class="district_list">
			<ul>
			</ul>
		</div>
<?php require_once "footer.php" ?>