<?php require_once 'header.php';
	  require_once 'functions/states_function.php';
	  $statesFunction = new statesFunction();
	  if(isset($_POST['states'])){
		$statesname = $_POST['states_name'];
		if (in_array($statesname, $STATES)) {
			$states = $statesFunction->isStatesExist($statesname);
			if(!$states){
				$statesinsert = $statesFunction->statesInsert($statesname);
				if($statesinsert){echo "<script>alert('State Inserted')</script>";}else{
					echo "<script>alert('State Not Inserted')</script>";}
			}
			else {echo "<script>alert('State Already Exist')</script>";}
		}
		else{echo "<script>alert('No State Present in that Name')</script>";}
	  }
?>		
		<div class="container align_center">
			<span class="sports">STATE</span>
		</div><!--end container-->

		<div class="align_margin"></div>
		<div class="container">
			<div class="col-md-8">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<form name="states_form" action="state.php" method="post">
						<div class="align_margin">					
							<label>Enter the State</label><br>
							<input type="text" class="statesname" name="states_name" required>
						</div>	
						<input type="submit" class="btn btn-primary align_right submit" name="states" value="Submit">																						
					</form>
				</div>
				<div class="container">           
				  <table class="table">
				    <thead>
				      <tr>
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
                            <tr class="align_center">
						        <td><?php echo $row['states_id']; ?></td>
						        <td><?php echo $row['states_name']; ?></td>
						        <td class="edit_state">Edit</td> 
				        		<td class="delete_state">Delete</td>
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
		<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="state_div">
          		<code class="close_btn cancel_btn"> </code>
          			<div class="container state-content col-md-12">		
	          			<form>
							<div class="align_margin">	
								<label>Enter the State</label><br>
								<input type="text" class="sportsname">
							</div><!--align_margin-->
							<button type="button" class="btn btn-primary align_right submit">Submit</button>			
						</form>
					</div><!--tate-content-->
			</div><!--state_div-->
		</div><!--container-->

<?php require_once "footer.php" ?>